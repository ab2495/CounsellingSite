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
        for($i=1;$i<=$userDetail["last_result_sem"];$i++){
            $tableId = "Sem".$i;
            echo "<table id=$tableId border='2'>";
            echo "            <tr> ";
            echo "            <th rowspan='2'>Sr No</th> ";
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
    ?>

   

    <form action="Marksheet.html" method="get">
        <button class="btn btn-lg btn-primary btn-block" type="submit" >Add Result</button>
    </form>
    <div>
        
        <form>
            <hr>

            <p>
               <h2 align="center"> For Activity form ?
                <a href ="ActivityForm.html">Click Here.</a><br>
                </h2>
            </p>
            <br>

            <button  class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            <button class="btn btn-lg btn-primary btn-block" type="reset">Reset</button>
        </form>
    </div>


</body>

<script>
    function fillSemResult(semNo){
    alert("duf");
        <?php
            echo "Lets Start";
            $sem = semNo;
            echo $sem;
            $qr="select * from marksheet where enrollment = '$user' and semester = '$sem' ";
            $qrry = mysql_query($qr);

           if($noOfSubject = mysql_num_rows($qrry))
              $semMarksheet = mysql_fetch_assoc($qrry);
        ?>

           var resultTable = document.getElementById("Sem"+semNo);
           var noSubject = "<?php echo $noOfSubject?>"
           for(var i=1;i<= noSubject ;i++){
             var newRow = document.createElement("tr");

            var srnoCol = document.createElement("td");
            var srno = document.createTextNode(""+i);

            srnoCol.appendChild(srno);
            newRow.appendChild(srnoCol);

            for(var j=0;j<6;j++){
                var newCol = document.createElement("td");
                var inputTag;
            switch(j){
                case 0:
                    inputTag  = document.createTextNode(<?php $semMarksheet["subject_code"]?>);
                    break;
                case 1:
                    inputTag  = document.createTextNode(<?php $semMarksheet["subject_name"]?>);
                    break;
                case 2:
                    inputTag  = document.createTextNode(<?php $semMarksheet["grade"]?>);
                    break;
                case 3:
                    inputTag  = document.createTextNode(<?php $semMarksheet["backlog_m"]?>);
                    break;
                case 4:
                    inputTag  = document.createTextNode(<?php $semMarksheet["backlog_i"]?>);
                    break;
                case 5:
                    inputTag  = document.createTextNode(<?php $semMarksheet["backlog_e"]?>);
                    break;
                
            }
            newCol.appendChild(inputTag);
            newRow.appendChild(newCol);
        }
        resultTable.appendChild(newRow);
     }

    }
</script>
</html>