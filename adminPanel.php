<?php
session_start();
     $_SESSION["user"] = $_POST["enrollment"]; 
     header("Location: FillResult.php");
     exit();

?>
