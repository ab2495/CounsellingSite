<?php

    require_once 'db_connect.php';
    $report = array();

    //Created a object to connect to database
    $obj = new DB_Connect();
    $conn = $obj->connect();
    if(!$conn)
        echo mysql_error();
    session_start();

   if(isset($_POST["pass"])){
        $user = $_SESSION["user"];
        $pass = $_POST["pass"];
        $pass = md5($pass);

        $qr="select * from user where enrollment = '$user'";
        $qrry = mysql_query($qr);

        if(mysql_num_rows($qrry)){
       
            $userDetail = mysql_fetch_assoc($qrry);

            if($pass==$userDetail["password"]){
                $newPass = md5($_POST["new_pass"]);
                $changePass = mysql_query("update user set password = '$newPass' where enrollment = '$user'");
                
                    header("Location: FillResult.php");
                    exit(); 
            }
            else{
                echo "<h4>Password Not Correct!</h4>";
                include("index.html");
            }            
        }
        else{
            echo "<h4>User Not Found!</h4>";
            include("index.html");
        }
    }

    mysql_close($conn);
?>