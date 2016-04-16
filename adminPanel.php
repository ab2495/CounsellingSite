<!DOCTYPE html>
<?php

    require_once 'db_connect.php';
    $report = array();

    //Created a object to connect to database
    $obj = new DB_Connect();
    $conn = $obj->connect();
    if(!$conn)
        echo mysql_error();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Panel</title>

        <!-- Bootstrap core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!--<link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

        <!-- Custom styles for this template -->
        <link href="adminPanel.css" rel="stylesheet">

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
            Admin Panel
        </h1>

        <form method="post" action="adminPanelRedirect.php" onsubmit="return check()">
            <table align="center">

            <h3><p align="center">
            Enter Enrollment Number:
            </p>
            </h3>
                <tr>
            <td colspan="2">
                <input align="center" type="number" name="enrollment" id="enroll"/>
            </td></tr>

                <tr>
                    <td>
                        <button class="btn btn-lg btn-primary btn-block"  style ="margin-top: 20px" type="submit">Find</button>
                    </td>
                </tr>
         
             </table>
        </form>

        <br><br>

        <h3><p align="center"> Certificate Download</p><h3></h3>
        <form action="adminPanel.php" method="post">
            <table align="center">

            <tr>
            <td>
                <input align="center" type="number" placeholder="Enrollment Number" name="enrollmentForCerti" id="enroll"/>
            </td></tr>
            
             <tr>
            <td>
                <?php
                    if(isset($_POST["enrollmentForCerti"])){
                        $enroll = $_POST["enrollmentForCerti"];
                        $findAllCerti = "select * from activity where enrollment = $enroll and certificate != ''";
                        $cursor = mysql_query($findAllCerti);
                        if(($noOfResult = mysql_num_rows($cursor))!=0){
                            echo "<table  class='table table-bordered'>";
                            echo "<tr>";
                            echo "<th>Enrollment</th>
                                  <th>Sr No</th>
                                  <th>Title</th>
                                <th>Place</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Level</th>
                                <th>Certificate</th>
                                <th>Prize</th>
                                <th>Event</th>";
                            for($i=0;$i<$noOfResult;$i++){
                                $Result = mysql_fetch_array($cursor);
                                echo "<tr>";
                                echo "<td>$Result[0]</td>";
                                echo "<td>$Result[1]</td>";
                                echo "<td>$Result[2]</td>";
                                echo "<td>$Result[3]</td>";
                                echo "<td>$Result[4]</td>";
                                echo "<td>$Result[5]</td>";
                                echo "<td>$Result[6]</td>";
                                echo "'/candidate/$Result[0]/$Result[7]'";
                                echo "<td><a download href='certificates/$Result[0]/$Result[7]'>
                                        <img alt='Download Certificate' src='certificat/$Result[7]'></a></td>";
                                echo "<td>$Result[8]</td>";
                                echo "<td>$Result[9]</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else{
                            echo "No Certificate Uploaded!";
                        }
                    }
                ?>
            </td></tr>

                <tr>
                    <td>
                        <button class="btn btn-lg btn-primary btn-block"  style ="margin-top: 20px" type="submit">Find Certificates</button>
                    </td>
                </tr>
         
             </table>
        </form>
        
    </body>
    <script>
        function check() {
            var textbox = document.getElementById("enroll");
            if (textbox.value == "") {
                alert("Enter Enrollment Number");
                return false;
            }
            else if (textbox.value.length != 12) {
                alert("Enter Proper Enrollment Number");
                return false;
            }
            return true;
        }
    </script>
</html>