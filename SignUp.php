<?php
    
    require_once 'db_connect.php';
    $response = array();

    $obj = new DB_Connect();
    $conn = $obj->connect();

    if(!$conn){
        echo mysql_error();
    }

    if(isset($_POST["enroll"]) && isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["password"])){
        $user = $_POST["enroll"];
        $mail = $_POST["email"];
        $pass = md5($_POST["password"]);
        $name = $_POST["name"];

        $test = mysql_query("select * from user where enrollment = '$user'");

        if(mysql_num_rows($test)){
             $response["result"] = "User Exists";
             echo json_encode($response);
        }
        else{
            $qrry = mysql_query("insert into user(enrollment,name,password,email) values('$user','$name','$pass','$mail')");

            if(!$qrry){
                 $response["result"] = "Error";
                echo json_encode($response) , mysql_error();
            }
            else{
                mkdir("certificates/".$user);
                header("Location: index.html");
                exit();
            }
        }
    }
        
    
?>