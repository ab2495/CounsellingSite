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

    <title>Activity Form</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<h1 align="center"> Student Activity Form</h1>
<form id="ActivityForm" method="post" action="saveActivityForm.php" onsubmit=" return addCountersAndCheck()">
<table class="table table-bordered text-center">
    <tr>
        <th rowspan="2">Sr.No</th>
        <th rowspan="2">Activity</th>
        <th rowspan="2">Detail</th>
        <th colspan="4">Reorganization/Award received. Give Details of each</th>
    </tr>
    <tr>
        <th>
            Inter-Department
        </th>
        <th>
            Inter-Institution
        </th>
        <th>
            Inter-University
        </th>
        <th>
            Other
        </th>
    </tr>
    <?php 
        $seminarResult = array("","","","","","");
        $seminarQuery = mysql_query("select * from awards where event = 'Seminar' and enrollment = $user");
        if(mysql_num_rows($seminarQuery)){
            $seminarResult = mysql_fetch_array($seminarQuery);
        }
    ?>
    <tr>
        <td>1</td>
        <td>Seminar/Workshop<br>Have you enrolled?<br></td>
        <td>Title/Date</td>
        <td><input type="text" name="departmentSeminar" value="<?php echo $seminarResult[2] ?>"></td>
        <td><input type="text" name="instituteSeminar" value="<?php echo $seminarResult[3] ?>"></td>
        <td><input type="text" name="universitySeminar" value="<?php echo $seminarResult[4] ?>"></td>
        <td><input type="text" name="otherSeminar" value="<?php echo $seminarResult[5] ?>"></td>
    </tr>

    <?php 
        $isteResult = array("","","","","","");
        $isteQuery = mysql_query("select * from awards where event = 'ISTE' and enrollment = $user");
        if(mysql_num_rows($isteQuery)){
            $isteResult = mysql_fetch_array($isteQuery);
        }
    ?>

    <tr>
        <td>2</td>
        <td>ISTE Student Chapter<br>Have you enrolled?<br></td>
        <td>Activity</td>
        <td><input type="text" name="departmentISTE" value="<?php echo $isteResult[2] ?>"></td>
        <td><input type="text" name="instituteISTE" value="<?php echo $isteResult[3] ?>"></td>
        <td><input type="text" name="universityISTE" value="<?php echo $isteResult[4] ?>"></td>
        <td><input type="text" name="otherISTE" value="<?php echo $isteResult[5] ?>"></td>
    </tr>

     <?php 
        $ieResult = array("","","","","","");
        $ieQuery = mysql_query("select * from awards where event = 'IE' and enrollment = $user");
        if(mysql_num_rows($ieQuery)){
            $ieResult = mysql_fetch_array($ieQuery);
        }
    ?>

    <tr>
        <td>3</td>
        <td>IE/ISTE Convention<br>Have you enrolled?<br></td>
        <td>Activity</td>
        <td><input type="text" name="departmentIE" value="<?php echo $ieResult[2] ?>"></td>
        <td><input type="text" name="instituteIE" value="<?php echo $ieResult[3] ?>"></td>
        <td><input type="text" name="universityIE" value="<?php echo $ieResult[4] ?>"></td>
        <td><input type="text" name="otherIE" value="<?php echo $ieResult[5] ?>"></td>
    </tr>

     <?php 
        $sportResult = array("","","","","","");
        $sportQuery = mysql_query("select * from awards where event = 'Sport' and enrollment = $user");
        if(mysql_num_rows($sportQuery)){
            $sportResult = mysql_fetch_array($sportQuery);
        }
    ?>

    <tr>
        <td>4</td>
        <td>Sports<br>Have you enrolled?<br></td>
        <td>Name of the Sport/Position/Year</td>
        <td><input type="text" name="departmentSport" value="<?php echo $sportResult[2] ?>"></td>
        <td><input type="text" name="instituteSport" value="<?php echo  $sportResult[3] ?>"></td>
        <td><input type="text" name="universitySport" value="<?php echo $sportResult[4] ?>"></td>
        <td><input type="text" name="otherSport" value="<?php echo $sportResult[5] ?>"></td>
    </tr>

    <?php 
        $eventResult = array("","","","","","");
        $eventQuery = mysql_query("select * from awards where event = 'Event' and enrollment = $user");
        if(mysql_num_rows($eventQuery)){
            $eventResult = mysql_fetch_array($eventQuery);
        }
    ?>

    <tr>
        <td>5</td>
        <td>Youth/Cultural/Technical/Festival<br>Have you enrolled?<br></td>
        <td>Event name/Position/Year</td>
        <td><input type="text" name="departmentEvent" value="<?php echo $eventResult[2] ?>"></td>
        <td><input type="text" name="instituteEvent" value="<?php echo $eventResult[3] ?>"></td>
        <td><input type="text" name="universityEvent" value="<?php echo $eventResult[4] ?>"></td>
        <td><input type="text" name="otherEvent" value="<?php echo $eventResult[5] ?>"></td>
    </tr>
</table>
<br><br>

<div>
    <p>
        1).Have you published research paper in journal/conference?
        If Yes give details.
    </p>
    <table class="table table-bordered" id="journalTable">
        <tr>
            <th>Sr.No</th>
            <th>Title</th>
            <th>Journal/Conference</th>
            <th>Publishing date</th>
        </tr>
        <tr>
            <td>
                <button id="journalButton" onclick="addJournal()" type="button">New Row</button>
            </td>
        </tr>

         <?php 
        $journalResult = array("","","","","","");
        $noOfJournal = 1;
        $journalQuery = mysql_query("select * from research_paper where enrollment = $user order by sr_no");
        if(($noOfJournal = mysql_num_rows($journalQuery))!=0){
            $journalResult = mysql_fetch_array($journalQuery);
        }
        else{
            $noOfJournal=1;
        }
         ?>

        <tr>
            <td>1</td>
            <td><input type="text" name="journo-1-1" value="<?php echo $journalResult[2] ?>"></td>
            <td><input type="text" name="journo-1-2" value="<?php echo $journalResult[3] ?>"></td>
            <td><input type="date" name="journo-1-3" value="<?php echo $journalResult[4] ?>"></td>
        </tr>
        <?php
            for($otherJourno = 2; $otherJourno <= $noOfJournal ; $otherJourno++){
                $journalResult = mysql_fetch_array($journalQuery);
               echo "<tr>";
               echo "<td>", $journalResult[1] ,"</td>";
                echo "<td><input type='text' name='journo-",$otherJourno,"-1' value='", $journalResult[2] ,"'></td>";
                echo "<td><input type='text' name='journo-",$otherJourno,"-2' value='", $journalResult[3] ,"'></td>";
                echo "<td><input type='date' name='journo-",$otherJourno,"-3' value='", $journalResult[4] ,"'></td>";
                echo "</tr>";
            }
        ?>
        <script>jCount = (<?php echo $noOfJournal ?> + 1);</script>

    </table>
    <br>

    <p>
        2)Details of Competitive Exam<br>
    </p>
    <table class="table table-bordered" id="competitiveTable">

        <tr>
            <th>Sr.No</th>
            <th>Competitive Exam</th>
            <th>Score</th>
            <th>Year of Passing</th>
            <th>If you're intended to appear probable date of exam</th>
        </tr>

        <tr>
            <td>
                <button id="competitiveButton" onclick="addCompetitive()" type="button">New Row</button>
            </td>
        </tr>

         <?php 
        $competitiveResult = array("","","","","","");
        $noOfCompetitive = 1;
        $competitiveQuery = mysql_query("select * from competitive_exam where enrollment = $user order by sr_no");
        if(($noOfCompetitive = mysql_num_rows($competitiveQuery))!=0){
            $competitiveResult = mysql_fetch_array($competitiveQuery);
        }
        
        else{
            $noOfCompetitive=1;
        }
         ?>

        <tr>
            <td>1</td>
            <td><input type="text" name="comp-1-0" value="<?php echo $competitiveResult[2] ?>"></td>
            <td><input type="text" name="comp-1-1" value="<?php echo $competitiveResult[3] ?>"></td>
            <td><input type="text" name="comp-1-2" value="<?php echo $competitiveResult[4] ?>"></td>
            <td><input type="text" name="comp-1-3" value="<?php echo $competitiveResult[5] ?>"></td>
        </tr>
        <?php
            for($otherJourno = 2; $otherJourno <= $noOfCompetitive ; $otherJourno++){
                $competitiveResult = mysql_fetch_array($competitiveQuery);
               echo "<tr>";
               echo "<td>", $competitiveResult[1] ,"</td>";
                echo "<td><input type='text' name='comp-",$otherJourno,"-0' value='", $competitiveResult[2] ,"'></td>";
                echo "<td><input type='text' name='comp-",$otherJourno,"-1' value='", $competitiveResult[3] ,"'></td>";
                echo "<td><input type='text' name='comp-",$otherJourno,"-2' value='", $competitiveResult[4] ,"'></td>";
                echo "<td><input type='text' name='comp-",$otherJourno,"-4' value='", $competitiveResult[5] ,"'></td>";
                echo "</tr>";
            }
        ?>
        <script>cCount = (<?php echo $noOfCompetitive ?> + 1);</script>
    </table>
    <br>

    <p>
        3.Placement<br><br>
        a) Are you selected in campus interview?
        If Yes give the details
    </p>

    <table class="table table-bordered text-center " id="jobTable">
        <tr>
            <th>Sr No</th>
            <th>Company Name</th>
            <th>Annual average salary in lakhs</th>
            <th>Designation</th>
        </tr>

        <tr>
            <td>
                <button id="jobButton" onclick="addJob()" type="button">New Row</button>
            </td>
        </tr>

         <?php 
        $jobResult = array("","","","","","");
        $noOfJob = 1;
        $jobQuery = mysql_query("select * from placement where enrollment = $user order by sr_no");
        if(($noOfJob = mysql_num_rows($jobQuery))!=0){
            $jobResult = mysql_fetch_array($jobQuery);
        }
        
        else{
            $noOfJob=1;
        }
         ?>

        <tr>
            <td>1</td>
            <td><input type="text" name="job-1-1" value="<?php echo $jobResult[2] ?>"></td>
            <td><input type="text" name="job-1-2" value="<?php echo $jobResult[3] ?>"></td>
            <td><input type="text" name="job-1-3" value="<?php echo $jobResult[4] ?>"></td>
        </tr>

        <?php
            for($otherJourno = 2; $otherJourno <= $noOfJob ; $otherJourno++){
                $jobResult = mysql_fetch_array($jobQuery);
               echo "<tr>";
               echo "<td>", $jobResult[1] ,"</td>";
                echo "<td><input type='text' name='job-",$otherJourno,"-1' value='", $jobResult[2] ,"'></td>";
                echo "<td><input type='text' name='job-",$otherJourno,"-2' value='", $jobResult[3] ,"'></td>";
                echo "<td><input type='text' name='job-",$otherJourno,"-3' value='", $jobResult[4] ,"'></td>";
                echo "</tr>";
            }
        ?>
        <script>jobCount = (<?php echo $noOfJob ?> + 1);</script>
    </table>
    <br>

    <p>
        <input type="checkbox" name="further_studies" value="true">
        b) Are you interested in further studies,if Yes mention in detail.
    </p>
    <p>
        <input type="checkbox" name="entrepreneur" value="true">
        c) Are you interested in becoming entrepreneur,if Yes give details.
    </p>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
</form>
</div>
</body>
<script>
    function addJournal() {
        var resultTable = document.getElementById("journalTable");
        var newRow = document.createElement("tr");

        var srnoCol = document.createElement("td");
        var srno = document.createTextNode(jCount);

        srnoCol.appendChild(srno);
        newRow.appendChild(srnoCol);

        for (var j = 1; j <= 3; j++) {
            var newCol = document.createElement("td");
            var inputTag = document.createElement("input");
            inputTag.setAttribute("name", "journo-" + jCount + "-" + j);
            if (j == 3)
                inputTag.setAttribute("type", "date");
            else
                inputTag.setAttribute("type", "text");

            newCol.appendChild(inputTag);
            newRow.appendChild(newCol);
        }
        resultTable.appendChild(newRow);
        jCount++;
    }

    function addCompetitive() {
        var resultTable = document.getElementById("competitiveTable");
        var newRow = document.createElement("tr");

        var srnoCol = document.createElement("td");
        var srno = document.createTextNode(cCount);

        srnoCol.appendChild(srno);
        newRow.appendChild(srnoCol);

        var newCol = document.createElement("td");
        var inputTag = document.createElement("input");
        inputTag.setAttribute("type", "text");
        newCol.appendChild(inputTag);
        inputTag.setAttribute("name", "comp-" + cCount + "-" + 0);
        newRow.appendChild(newCol);

        for (var j = 1; j <= 3; j++) {
            var newCol = document.createElement("td");
            var inputTag = document.createElement("input");
            inputTag.setAttribute("name", "comp-" + cCount + "-" + j);
            inputTag.setAttribute("type", "text");

            newCol.appendChild(inputTag);
            newRow.appendChild(newCol);
        }
        resultTable.appendChild(newRow);
        cCount++;
    }

    function addJob() {
        var resultTable = document.getElementById("jobTable");
        var newRow = document.createElement("tr");

        var srnoCol = document.createElement("td");
        var srno = document.createTextNode(jobCount);

        srnoCol.appendChild(srno);
        newRow.appendChild(srnoCol);

        for (var j = 1; j <= 3; j++) {
            var newCol = document.createElement("td");
            var inputTag = document.createElement("input");
            inputTag.setAttribute("name", "job-" + jobCount + "-" + j);
            inputTag.setAttribute("type", "text");

            newCol.appendChild(inputTag);
            newRow.appendChild(newCol);
        }
        resultTable.appendChild(newRow);
        jobCount++;
    }

    function addCountersAndCheck() {
        var form = document.getElementById("ActivityForm");

        var jCountTag = document.createElement("input");
        jCountTag.setAttribute("name", "jCounter");
        jCountTag.setAttribute("type", "hidden");
        jCountTag.value = jCount;
        form.appendChild(jCountTag);

        var cCountTag = document.createElement("input");
        cCountTag.setAttribute("name", "cCounter");
        cCountTag.setAttribute("type", "hidden");
        cCountTag.value = cCount;
        form.appendChild(cCountTag);

        var jobCountTag = document.createElement("input");
        jobCountTag.setAttribute("name", "jobCounter");
        jobCountTag.setAttribute("type", "hidden");
        jobCountTag.value = jobCount;
        form.appendChild(jobCountTag);

        var journoLeftEmpty = 0;
        for (var journoField = 1; journoField < jCount; journoField++) {

            var field1 = form.elements["journo-" + journoField + "-1"];
            var field2 = form.elements["journo-" + journoField + "-2"];
            var field3 = form.elements["journo-" + journoField + "-3"];

            if (field1.value == "" && field2.value == "" && field3.value == "") {
                journoLeftEmpty = 1;
            }
            else {
                if (journoLeftEmpty == 1) {
                    alert("Enter Journal Fields in order! Don't Skip any row.");
                    return false;
                }
            }
        }

        var compLeftEmpty = 0;
        for (var compField = 1; compField < cCount; compField++) {
            var field0 = form.elements["comp-" + compField + "-0"];
            var field1 = form.elements["comp-" + compField + "-1"];
            var field2 = form.elements["comp-" + compField + "-2"];
            var field3 = form.elements["comp-" + compField + "-3"];

            if (field0.value == "" && field1.value == "" && field2.value == "" && field3.value == "") {
                compLeftEmpty = 1;
            }
            else {
                if (compLeftEmpty == 1) {
                    alert("Enter Competitive Exam Fields in order! Don't Skip any row.");
                    return false;
                }
            }
        }

        var jobLeftEmpty = 0;
        for (var jobField = 1; jobField < jobCount; jobField++) {

            var field1 = form.elements["job-" + jobField + "-1"];
            var field2 = form.elements["job-" + jobField + "-2"];
            var field3 = form.elements["job-" + jobField + "-3"];

            if (field1.value == "" && field2.value == "" && field3.value == "") {
                jobLeftEmpty = 1;
            }
            else {
                if (jobLeftEmpty == 1) {
                    alert("Enter Placement Fields in order! Don't Skip any row.");
                    return false;
                }
            }
        }
        return true;

    }
</script>
</html>