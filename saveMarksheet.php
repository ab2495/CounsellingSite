<?php

    require_once 'db_connect.php';
    $report = array();

    //Created a object to connect to database
    $obj = new DB_Connect();
    $conn = $obj->connect();
    if(!$conn)
        echo mysql_error();

    session_start();

   if(isset($_POST["sem"])) {

        $sem = $_POST["sem"];
        $user = $_SESSION["user"];
        $noOfSubject = $_POST["subjectNo"];

        for($i=1;$i<$noOfSubject;$i++){
            $var1 = $i."-0";
            $var2 = $i."-1";
            $var3 = $i."-2";
            $var4 = $i."-3";
            $var5 = $i."-4";
            $var6 = $i."-5";

            $insertQr = "insert into marksheet values( 
                                $user,$sem,
                                $_POST[$var1],
                                $_POST[$var2],
                                $_POST[$var3],
                                $_POST[$var4],
                                $_POST[$var5],
                                $_POST[$var6])";
            
            $qrry = mysql_query($insertQr);
            if(!qrry){
                echo "Error";
            }
            else{
                echo "Done " , $i;
            }

        }

    }

    mysql_close($conn);
?>