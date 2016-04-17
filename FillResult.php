<!DOCTYPE html>
<?php
    session_start();

    require_once 'db_connect.php';
    $obj = new DB_Connect();
    $conn = $obj->connect();
    if(!$conn)
        echo mysql_error();

    $user = $_SESSION["user"];

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="FillResult.css" rel="stylesheet">

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
    <h1 align="center">
         BVM Counselling Site
    </h1>
    <form action="StudentProfile.php" method="post"><button type="submit">Profile</button></form>
    <form action="logout.php" method="post"><button type="submit">Log Out</button></form>
    <?php
        $qr="select * from user where enrollment = '$user'";
        $qrry = mysql_query($qr);

        if(mysql_num_rows($qrry)){
            $userDetail = mysql_fetch_assoc($qrry);

            echo "<h3 align='center'> Welcome, " , $userDetail["name"] , "<br>";
            echo $userDetail["enrollment"] , "<br></h3>";

        }

    ?>

    <h2 align="center"> Result </h2>
     <?php
        for($i=1;$i<=8;$i++){
            if($userDetail["Sem".$i]==1){
            $tableId = "Sem".$i;
            echo "<table id=$tableId border='2' class='table table-bordered text-center'>";
            echo "            <tr align='center' > ";
            echo "                <th rowspan='2'>Sr No</th> ";
            echo "                <th rowspan='2'>Subject Code</th>";
            echo "                <th rowspan='2'>Subject Name</th>";
            echo "                <th rowspan='2'>Grade</th>";
            echo "                <th colspan='3'>BackLog</th>";
            echo "            </tr>";
            echo "            <tr>";
            echo "                <td align='center'>M</td>";
            echo "                <td align='center'>I</td>";
            echo "                <td align='center'>E</td>";
            echo "            </tr>";

            $qr="select * from marksheet where enrollment = '$user' and semester = '$i' ";
            $qrry = mysql_query($qr);

            if($noOfSubject = mysql_num_rows($qrry)){

            echo "<h3>Sem ", $i, "</h3>";
              
            $srno=1;
            while($semMarksheet = mysql_fetch_array($qrry)){
                echo "<tr>";
                echo "<td>", $srno ,"</td>";
                for($column = 1; $column <= 6; $column++){
                    echo "<td>" , $semMarksheet[$column+1] ,"</td>";
                }
                echo "</tr>";
                $srno++;
            }
            }

            echo "</table>";
            }
        }
    ?>

   

    <form action="Marksheet.php" method="post" onsubmit="return getSem()">
        <input type="hidden" id="semNo" name="sem"/>
        <button class="btn btn-lg btn-primary btn-block" type="submit" >
            Add/Edit Result
        </button>
    </form>
    <div>
        
        <form>
            <hr>

            <p>
               <h2 align="center"> For Activity form ?
                <a href ="ActivityForm.php">Click Here.</a><br>
                </h2>
            </p>
            <br>
        </form>
    </div>


</body>

<?php
    function signout(){
        session_unset(); 
        session_destroy() ;
        header("Location: index.html");
        exit();
    }
?>

<script>
    function getSem() {
        var semField = document.getElementById("semNo");
        var no = prompt("Enter Sem No", 1);
        if (no != null) {
            if (no > 0 && no < 9) {
                semField.value = no;
                return true;
            }
            else {
                alert("Enter Valid Sem No");
                return false;
            }
        }
        else {
            alert("Please enter Sem No");
            return false;
        }
    }
</script>

</html>