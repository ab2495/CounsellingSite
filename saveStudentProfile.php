<?php
    
    require_once 'db_connect.php';
    $report = array();

    //Created a object to connect to database
    $obj = new DB_Connect();
    $conn = $obj->connect();
    if(!$conn)
        echo mysql_error();

    session_start();
    $user = $_SESSION["user"];

    $col1 = $_POST["name"];
    $col2 = $_POST["father_name"];
    $col3 = $_POST["mother_name"];
    $col4 = $_POST["father_no"];
    $col5 = $_POST["no"];
    $col6 = $_POST["blood"];
    $col7 = $_POST["gender"];
    $col8 = $_POST["address"];

    $insertQr = "insert into detail values( 
                                $user,
                                '$col1','$col2','$col3','$col4','$col5','$col6','$col7','$col8')
                                on duplicate key update 
                                name = '$col1' ,
                                father_name = '$col2' ,
                                mother_name = '$col3' ,
                                father_number = '$col4' ,
                                number = '$col5' ,
                                blood = '$col6',
                                gender = '$col7', 
                                address = '$col8'
                                ";
            
                    $qrry = mysql_query($insertQr);
                    echo mysql_error() , "<br>";

    header("Location: FillResult.php");
        exit();

?>

