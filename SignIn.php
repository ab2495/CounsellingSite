<?php

    require_once 'db_connect.php';
    $report = array();

    //Created a object to connect to database
    $obj = new DB_Connect();
    $conn = $obj->connect();
    if(!$conn)
        echo mysql_error();

   if(isset($_POST["user"]) && isset($_POST["pass"])){
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        $qr="select * from user where enrollment = '$user'";
        $qrry = mysql_query($qr);

        if(mysql_num_rows($qrry)){
       
            $ans = mysql_fetch_assoc($qrry);

            if($pass==$ans["password"]){
                session_start();
                $_SESSION["user"] = $user;
                header("Location: FillResult.php");
                exit();
            }
            else{
                $report["result"]="Not Correct Password";
                echo json_encode($report);
            }            
        }
        else{
            $report["result"]="User Not Found";
            echo json_encode($report);
        }
    }

    mysql_close($conn);
?>