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
        $pass = md5($pass);

        $qr="select * from user where enrollment = '$user'";
        $qrry = mysql_query($qr);

        if(mysql_num_rows($qrry)){
       
            $userDetail = mysql_fetch_assoc($qrry);

            if($pass==$userDetail["password"]){
                session_start();
                if($userDetail["admin"] == 1){
                    header("Location: adminPanel.php");
                    exit();                    
                }
                else{
                    $_SESSION["user"] = $user;
                    header("Location: FillResult.php");
                    exit();
                }
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