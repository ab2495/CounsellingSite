<!DOCTYPE html>
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

    $userDetail = mysql_query("select * from detail where enrollment = $user");
    $userDetail = mysql_fetch_assoc($userDetail);

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="ForgetPassword.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<h1 align="center">BVM Counselling Site</h1>
<form class="form-signin" action="saveStudentProfile.php" method="post" onsubmit="return check()">
    <h2 class="form-signin-heading">Enter Your Details</h2>
    <label  class="sr-only">Your Name</label>
    <input type="text" name="name" class="form-control" placeholder="Name" required autofocus value="<?php echo $userDetail["name"];?>">
    <label  class="sr-only">Father Name</label>
    <input type="text" name="father_name" class="form-control" placeholder="Father Name" required autofocus value="<?php echo $userDetail["father_name"];?>">
    <label  class="sr-only">Mother Name</label>
    <input type="text" name="mother_name" class="form-control" placeholder="Mother Name" required autofocus value="<?php echo $userDetail["mother_name"];?>">
    <label  class="sr-only"></label>
    <input type="number" name="father_no" class="form-control" placeholder="Father's Mobile Number" required autofocus value="<?php echo $userDetail["father_number"];?>">
    <label  class="sr-only"></label>
    <input type="number" name="no" class="form-control" placeholder="Your Mobile Number" required autofocus value="<?php echo $userDetail["number"];?>">
    <label  class="sr-only">Blood Group</label>
    <input type="text" name="blood"  class="form-control" placeholder="Blood Group" required autofocus value="<?php echo $userDetail["blood"];?>">
    <label class="sr-only">Gender</label>
    <h4>
        Gender:
    </h4>
    <?php
        if($userDetail["gender"] == 1){
            echo "<input type='radio' name='gender' value='1' checked> Male";
            echo "<input type='radio' name='gender' value='0'> Female";
        }
        else{
            echo "<input type='radio' name='gender' value='1' > Male";
            echo "<input type='radio' name='gender' value='0' checked> Female";
        }
    ?>
    
    <h4>
        Address:
    </h4>
    <textarea name="address"
            rows="4" cols="40" ><?php echo $userDetail["address"];?>
    </textarea>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
</form>
</body>
<script>
    function check() {
        var form = document.forms[0];
        var fno = form.father_no.value;
        var no = form.no.value;
        if (fno.length != 10) {
            alert("Enter Proper Father's Number");
            return false;
        }
        if (no.length != 10) {
            alert("Enter Proper Mobile Number");
            return false;
        }
        return true;
    }
</script>
</html>