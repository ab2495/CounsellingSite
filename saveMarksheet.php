<?php

    require_once 'db_connect.php';
    $report = array();

    //Created a object to connect to database
    $obj = new DB_Connect();
    $conn = $obj->connect();
    if(!$conn)
        echo mysql_error();

    session_start();

   if(isset($_POST["subjectNo"])) {

        $user = $_SESSION["user"];
        $noOfSubject = $_POST["subjectNo"];

        $qr="select * from user where enrollment = '$user'";
        $qrry = mysql_query($qr);

        if(mysql_num_rows($qrry)){
            $userDetail = mysql_fetch_assoc($qrry);
        }
        
        $sem = $_POST["sem"];
        $emptyRowCount = 0;

        for($i=1;$i<=$noOfSubject;$i++){
            $var1 = $_POST[$i."-0"];
            $var2 = $_POST[$i."-1"];
            $var3 = $_POST[$i."-2"];
            $var4 = $_POST[$i."-3"];
            $var5 = $_POST[$i."-4"];
            $var6 = $_POST[$i."-5"];

            if(!($var1 == "" || $var2 == "" || $var3 == "")){

                $insertQr = "insert into marksheet values('$user','$sem','$var1','$var2','$var3','$var4','$var5','$var6')
                                on duplicate key update 
                                subject_code='$var1',
                                subject_name='$var2',
                                grade='$var3',
                                backlog_m='$var4',
                                backlog_i='$var5',
                                backlog_e='$var6'
                                ";
            
                $qrry = mysql_query($insertQr);
                if(!$qrry){
                    echo mysql_error() , "error";
                }
            }
            else{
                $emptyRowCount++;
            }

        }

        if($emptyRowCount != $noOfSubject){
           $colName = "Sem".$sem;
           $updateLastSemInProfile = "update user set $colName = '1' where enrollment = '$user'";
            $qrry = mysql_query($updateLastSemInProfile);
            if(!$qrry){
                echo mysql_error() , "error";
            }
        }
    }

    mysql_close($conn);

    header("Location: FillResult.php");
    exit();
?>