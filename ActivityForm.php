<!DOCTYPE html>
<?php
    session_start();

    require_once 'db_connect.php';
    $obj = new DB_Connect();
    $conn = $obj->connect();
    if(!$conn)
        echo mysql_error();

    $user = $_SESSION["user"];

    function addDropDown($no,$selected,$type){
        echo "<td>";
        echo "<select name=\"",$type,"-",$no,"-5\">";
        echo "<option value=\"Department\" ";
        if($selected == "Department") echo " selected='selected'"; 
        echo ">Inter-Department</option>";
        echo "<option value=\"Institue\"";
        if($selected == "Institute") echo " selected='selected'"; 
        echo ">Inter-Institute</option>";
        echo "<option value=\"University\"";
        if($selected == "Unversity") echo " selected='selected'"; 
        echo ">Inter-University</option>";
        echo "<option value=\"Other\"";
        if($selected == "Other") echo " selected='selected'"; 
        echo ">Other</option>";
        echo "</select>";
        echo "</td>";
    }

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
        <h4>Seminar/Workshop Detail</h4>
    </p>
    <table class="table table-bordered" id="seminarTable">
        <tr>
            <th>Sr.No</th>
            <th>Title</th>
            <th>Place</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Type</th>
            <th>Certificate</th>
        </tr>
        <tr>
            <td>
                <button id="seminarButton" onclick="addSeminar()" type="button">New Row</button>
            </td>
        </tr>

         <?php 
        $seminarResult = array("","","","","","","","","");
        $noOfseminar = 1;
        $seminarQuery = mysql_query("select * from activity where enrollment = $user order by sr_no");
        if(($noOfseminar = mysql_num_rows($seminarQuery))!=0){
            $seminarResult = mysql_fetch_array($seminarQuery);
        }
        else{
            $noOfseminar=1;
        }
         ?>

        <tr>
            <td>1</td>
            <td><input type="text" name="seminar-1-1" value="<?php echo $seminarResult[2] ?>"></td>
            <td><input type="text" name="seminar-1-2" value="<?php echo $seminarResult[3] ?>"></td>
            <td><input type="date" name="seminar-1-3" value="<?php echo $seminarResult[4] ?>"></td>
            <td><input type="date" name="seminar-1-4" value="<?php echo $seminarResult[5] ?>"></td>
            <?php addDropDown(1,$seminarResult[6],'seminar');?>
            <td><input type="file" name="seminar-1-6" value="<?php echo $seminarResult[7] ?>"></td>
        </tr>
        <?php
            for($otherseminar = 2; $otherseminar <= $noOfseminar ; $otherseminar++){
                $seminarResult = mysql_fetch_array($seminarQuery);
               echo "<tr>";
               echo "<td>", $seminarResult[1] ,"</td>";
                echo "<td><input type='text' name='seminar-",$otherseminar,"-1' value='", $seminarResult[2] ,"'></td>";
                echo "<td><input type='text' name='seminar-",$otherseminar,"-2' value='", $seminarResult[3] ,"'></td>";
                echo "<td><input type='date' name='seminar-",$otherseminar,"-3' value='", $seminarResult[4] ,"'></td>";
                echo "<td><input type='date' name='seminar-",$otherseminar,"-4' value='", $seminarResult[5] ,"'></td>";
                addDropDown($otherseminar,$seminarResult[6]);
                echo "<td><input type='file' name='seminar-",$otherseminar,"-6' value='", $seminarResult[7] ,"'></td>";
                echo "</tr>";
            }
        ?>
        <script>seminarCount = (<?php echo $noOfseminar ?> + 1);</script>

    </table>
    <br>

    <p>
        <h4>ISTE Student Chapter Event Detail</h4>
    </p>
    <table class="table table-bordered" id="isteTable">
        <tr>
            <th>Sr.No</th>
            <th>Title</th>
            <th>Place</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Type</th>
            <th>Certificate</th>
            <th>Prize</th>
        </tr>
        <tr>
            <td>
                <button id="isteButton" onclick="addISTE()" type="button">New Row</button>
            </td>
        </tr>

         <?php 
        $isteResult = array("","","","","","","","","","","");
        $noOfiste = 1;
        $isteQuery = mysql_query("select * from activity where enrollment = $user order by sr_no");
        if(($noOfiste = mysql_num_rows($isteQuery))!=0){
            $isteResult = mysql_fetch_array($isteQuery);
        }
        else{
            $noOfiste=1;
        }
         ?>

        <tr>
            <td>1</td>
            <td><input type="text" name="iste-1-1" value="<?php echo $isteResult[2] ?>"></td>
            <td><input type="text" name="iste-1-2" value="<?php echo $isteResult[3] ?>"></td>
            <td><input type="date" name="iste-1-3" value="<?php echo $isteResult[4] ?>"></td>
            <td><input type="date" name="iste-1-4" value="<?php echo $isteResult[5] ?>"></td>
            <?php addDropDown(1,$isteResult[6],'iste');?>
            <td><input type="file" name="iste-1-6" value="<?php echo $isteResult[7] ?>"></td>
            <td><input type="text" name="iste-1-7" value="<?php echo $isteResult[8] ?>"></td>
        </tr>
        <?php
            for($otheriste = 2; $otheriste <= $noOfiste ; $otheriste++){
                $isteResult = mysql_fetch_array($isteQuery);
               echo "<tr>";
               echo "<td>", $isteResult[1] ,"</td>";
                echo "<td><input type='text' name='iste-",$otheriste,"-1' value='", $isteResult[2] ,"'></td>";
                echo "<td><input type='text' name='iste-",$otheriste,"-2' value='", $isteResult[3] ,"'></td>";
                echo "<td><input type='date' name='iste-",$otheriste,"-3' value='", $isteResult[4] ,"'></td>";
                echo "<td><input type='date' name='iste-",$otheriste,"-4' value='", $isteResult[5] ,"'></td>";
                addDropDown($otheriste,$isteResult[6]);
                echo "<td><input type='file' name='iste-",$otheriste,"-6' value='", $isteResult[7] ,"'></td>";
                echo "<td><input type='text' name='iste-",$otheriste,"-7' value='", $isteResult[8] ,"'></td>";
                echo "</tr>";
            }
        ?>
        <script>isteCount = (<?php echo $noOfiste ?> + 1);</script>

    </table>
    <br>

    <p>
        <h4>IE/ISTE Convention Event Detail</h4>
    </p>
    <table class="table table-bordered" id="ieTable">
        <tr>
            <th>Sr.No</th>
            <th>Title</th>
            <th>Place</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Type</th>
            <th>Certificate</th>
            <th>Prize</th>
        </tr>
        <tr>
            <td>
                <button id="ieButton" onclick="addIE()" type="button">New Row</button>
            </td>
        </tr>

         <?php 
        $ieResult = array("","","","","","","","","","","");
        $noOfie = 1;
        $ieQuery = mysql_query("select * from activity where enrollment = $user order by sr_no");
        if(($noOfie = mysql_num_rows($ieQuery))!=0){
            $ieResult = mysql_fetch_array($ieQuery);
        }
        else{
            $noOfie=1;
        }
         ?>

        <tr>
            <td>1</td>
            <td><input type="text" name="ie-1-1" value="<?php echo $ieResult[2] ?>"></td>
            <td><input type="text" name="ie-1-2" value="<?php echo $ieResult[3] ?>"></td>
            <td><input type="date" name="ie-1-3" value="<?php echo $ieResult[4] ?>"></td>
            <td><input type="date" name="ie-1-4" value="<?php echo $ieResult[5] ?>"></td>
            <?php addDropDown(1,$ieResult[6],'ie');?>
            <td><input type="file" name="ie-1-6" value="<?php echo $ieResult[7] ?>"></td>
            <td><input type="text" name="ie-1-7" value="<?php echo $ieResult[8] ?>"></td>
        </tr>
        <?php
            for($otherie = 2; $otherie <= $noOfie ; $otherie++){
                $ieResult = mysql_fetch_array($ieQuery);
               echo "<tr>";
               echo "<td>", $ieResult[1] ,"</td>";
                echo "<td><input type='text' name='ie-",$otherie,"-1' value='", $ieResult[2] ,"'></td>";
                echo "<td><input type='text' name='ie-",$otherie,"-2' value='", $ieResult[3] ,"'></td>";
                echo "<td><input type='date' name='ie-",$otherie,"-3' value='", $ieResult[4] ,"'></td>";
                echo "<td><input type='date' name='ie-",$otherie,"-4' value='", $ieResult[5] ,"'></td>";
                addDropDown($otherie,$ieResult[6]);
                echo "<td><input type='file' name='ie-",$otherie,"-6' value='", $ieResult[7] ,"'></td>";
                echo "<td><input type='text' name='ie-",$otherie,"-7' value='", $ieResult[8] ,"'></td>";
                echo "</tr>";
            }
        ?>
        <script>ieCount = (<?php echo $noOfie ?> + 1);</script>

    </table>
    <br>


    <p>
        <h4>Sports Detail</h4>
    </p>
    <table class="table table-bordered" id="sportTable">
        <tr>
            <th>Sr.No</th>
            <th>Title</th>
            <th>Place</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Type</th>
            <th>Certificate</th>
            <th>Prize</th>
        </tr>
        <tr>
            <td>
                <button id="sportButton" onclick="addSport()" type="button">New Row</button>
            </td>
        </tr>

         <?php 
        $sportResult = array("","","","","","","","","","","");
        $noOfsport = 1;
        $sportQuery = mysql_query("select * from activity where enrollment = $user order by sr_no");
        if(($noOfsport = mysql_num_rows($sportQuery))!=0){
            $sportResult = mysql_fetch_array($sportQuery);
        }
        else{
            $noOfsport=1;
        }
         ?>

        <tr>
            <td>1</td>
            <td><input type="text" name="sport-1-1" value="<?php echo $sportResult[2] ?>"></td>
            <td><input type="text" name="sport-1-2" value="<?php echo $sportResult[3] ?>"></td>
            <td><input type="date" name="sport-1-3" value="<?php echo $sportResult[4] ?>"></td>
            <td><input type="date" name="sport-1-4" value="<?php echo $sportResult[5] ?>"></td>
            <?php addDropDown(1,$sportResult[6],'sport');?>
            <td><input type="file" name="sport-1-6" value="<?php echo $sportResult[7] ?>"></td>
            <td><input type="text" name="sport-1-7" value="<?php echo $sportResult[8] ?>"></td>
        </tr>
        <?php
            for($othersport = 2; $othersport <= $noOfsport ; $othersport++){
                $sportResult = mysql_fetch_array($sportQuery);
               echo "<tr>";
               echo "<td>", $sportResult[1] ,"</td>";
                echo "<td><input type='text' name='sport-",$othersport,"-1' value='", $sportResult[2] ,"'></td>";
                echo "<td><input type='text' name='sport-",$othersport,"-2' value='", $sportResult[3] ,"'></td>";
                echo "<td><input type='date' name='sport-",$othersport,"-3' value='", $sportResult[4] ,"'></td>";
                echo "<td><input type='date' name='sport-",$othersport,"-4' value='", $sportResult[5] ,"'></td>";
                addDropDown($othersport,$sportResult[6]);
                echo "<td><input type='file' name='sport-",$othersport,"-6' value='", $sportResult[7] ,"'></td>";
                echo "<td><input type='text' name='sport-",$othersport,"-7' value='", $sportResult[8] ,"'></td>";
                echo "</tr>";
            }
        ?>
        <script>sportCount = (<?php echo $noOfsport ?> + 1);</script>

    </table>
    <br>


    <p>
        <h4>Youth/Cultural/Technical/Festival Detail</h4>
    </p>
    <table class="table table-bordered" id="eventTable">
        <tr>
            <th>Sr.No</th>
            <th>Title</th>
            <th>Place</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Type</th>
            <th>Certificate</th>
            <th>Prize</th>
        </tr>
        <tr>
            <td>
                <button id="eventButton" onclick="addEvent()" type="button">New Row</button>
            </td>
        </tr>

         <?php 
        $eventResult = array("","","","","","","","","","","");
        $noOfevent = 1;
        $eventQuery = mysql_query("select * from activity where enrollment = $user order by sr_no");
        if(($noOfevent = mysql_num_rows($eventQuery))!=0){
            $eventResult = mysql_fetch_array($eventQuery);
        }
        else{
            $noOfevent=1;
        }
         ?>

        <tr>
            <td>1</td>
            <td><input type="text" name="event-1-1" value="<?php echo $eventResult[2] ?>"></td>
            <td><input type="text" name="event-1-2" value="<?php echo $eventResult[3] ?>"></td>
            <td><input type="date" name="event-1-3" value="<?php echo $eventResult[4] ?>"></td>
            <td><input type="date" name="event-1-4" value="<?php echo $eventResult[5] ?>"></td>
            <?php addDropDown(1,$eventResult[6],'event');?>
            <td><input type="file" name="event-1-6" value="<?php echo $eventResult[7] ?>"></td>
            <td><input type="text" name="event-1-7" value="<?php echo $eventResult[8] ?>"></td>
        </tr>
        <?php
            for($otherevent = 2; $otherevent <= $noOfevent ; $otherevent++){
                $eventResult = mysql_fetch_array($eventQuery);
               echo "<tr>";
               echo "<td>", $eventResult[1] ,"</td>";
                echo "<td><input type='text' name='event-",$otherevent,"-1' value='", $eventResult[2] ,"'></td>";
                echo "<td><input type='text' name='event-",$otherevent,"-2' value='", $eventResult[3] ,"'></td>";
                echo "<td><input type='date' name='event-",$otherevent,"-3' value='", $eventResult[4] ,"'></td>";
                echo "<td><input type='date' name='event-",$otherevent,"-4' value='", $eventResult[5] ,"'></td>";
                addDropDown($otherevent,$eventResult[6]);
                echo "<td><input type='file' name='event-",$otherevent,"-6' value='", $eventResult[7] ,"'></td>";
                echo "<td><input type='text' name='event-",$otherevent,"-7' value='", $eventResult[8] ,"'></td>";
                echo "</tr>";
            }
        ?>
        <script>eventCount = (<?php echo $noOfevent ?> + 1);</script>

    </table>
    <br>


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
                echo "<td><input type='text' name='comp-",$otherJourno,"-3' value='", $competitiveResult[5] ,"'></td>";
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

    function addSeminar() {
        var resultTable = document.getElementById("seminarTable");
        var newRow = document.createElement("tr");

        var srnoCol = document.createElement("td");
        var srno = document.createTextNode(seminarCount);

        srnoCol.appendChild(srno);
        newRow.appendChild(srnoCol);

        for (var j = 1; j <= 6; j++) {
            var newCol = document.createElement("td");
            if (j == 5) {
                var inputTag = document.createElement("select");

                var val = ["Department", "Institute", "University", "Other"];
                var name = ["Inter-Department", "Inter-Institute", "Inter-University", "Other"];

                for (var i = 0; i < val.length; i++) {
                    var option = document.createElement("option");
                    option.value = val[i];
                    option.text = name[i];
                    inputTag.appendChild(option);
                }
            }
            else {
                var inputTag = document.createElement("input");
                switch (j) {
                    case 3:
                    case 4:
                        inputTag.setAttribute("type", "date");
                        break;
                    case 6:
                        inputTag.setAttribute("type", "file");
                        break;
                    default:
                        inputTag.setAttribute("type", "text");
                        break;
                }
            }
            inputTag.setAttribute("name", "seminar-" + seminarCount + "-" + j);

            newCol.appendChild(inputTag);
            newRow.appendChild(newCol);
        }
        resultTable.appendChild(newRow);
        seminarCount++;
    }

    function addISTE() {
        var resultTable = document.getElementById("isteTable");
        var newRow = document.createElement("tr");

        var srnoCol = document.createElement("td");
        var srno = document.createTextNode(isteCount);

        srnoCol.appendChild(srno);
        newRow.appendChild(srnoCol);

        for (var j = 1; j <= 7; j++) {
            var newCol = document.createElement("td");
            if (j == 5) {
                var inputTag = document.createElement("select");

                var val = ["Department", "Institute", "University", "Other"];
                var name = ["Inter-Department", "Inter-Institute", "Inter-University", "Other"];

                for (var i = 0; i < val.length; i++) {
                    var option = document.createElement("option");
                    option.value = val[i];
                    option.text = name[i];
                    inputTag.appendChild(option);
                }
            }
            else {
                var inputTag = document.createElement("input");
                switch (j) {
                    case 3:
                    case 4:
                        inputTag.setAttribute("type", "date");
                        break;
                    case 6:
                        inputTag.setAttribute("type", "file");
                        break;
                    default:
                        inputTag.setAttribute("type", "text");
                        break;
                }
            }
            inputTag.setAttribute("name", "iste-" + isteCount + "-" + j);

            newCol.appendChild(inputTag);
            newRow.appendChild(newCol);
        }
        resultTable.appendChild(newRow);
        isteCount++;
    }

    function addIE() {
        var resultTable = document.getElementById("ieTable");
        var newRow = document.createElement("tr");

        var srnoCol = document.createElement("td");
        var srno = document.createTextNode(ieCount);

        srnoCol.appendChild(srno);
        newRow.appendChild(srnoCol);

        for (var j = 1; j <= 7; j++) {
            var newCol = document.createElement("td");
            if (j == 5) {
                var inputTag = document.createElement("select");

                var val = ["Department", "Institute", "University", "Other"];
                var name = ["Inter-Department", "Inter-Institute", "Inter-University", "Other"];

                for (var i = 0; i < val.length; i++) {
                    var option = document.createElement("option");
                    option.value = val[i];
                    option.text = name[i];
                    inputTag.appendChild(option);
                }
            }
            else {
                var inputTag = document.createElement("input");
                switch (j) {
                    case 3:
                    case 4:
                        inputTag.setAttribute("type", "date");
                        break;
                    case 6:
                        inputTag.setAttribute("type", "file");
                        break;
                    default:
                        inputTag.setAttribute("type", "text");
                        break;
                }
            }
            inputTag.setAttribute("name", "ie-" + ieCount + "-" + j);

            newCol.appendChild(inputTag);
            newRow.appendChild(newCol);
        }
        resultTable.appendChild(newRow);
        ieCount++;
    }
    function addSport() {
        var resultTable = document.getElementById("sportTable");
        var newRow = document.createElement("tr");

        var srnoCol = document.createElement("td");
        var srno = document.createTextNode(sportCount);

        srnoCol.appendChild(srno);
        newRow.appendChild(srnoCol);

        for (var j = 1; j <= 7; j++) {
            var newCol = document.createElement("td");
            if (j == 5) {
                var inputTag = document.createElement("select");

                var val = ["Department", "Institute", "University", "Other"];
                var name = ["Inter-Department", "Inter-Institute", "Inter-University", "Other"];

                for (var i = 0; i < val.length; i++) {
                    var option = document.createElement("option");
                    option.value = val[i];
                    option.text = name[i];
                    inputTag.appendChild(option);
                }
            }
            else {
                var inputTag = document.createElement("input");
                switch (j) {
                    case 3:
                    case 4:
                        inputTag.setAttribute("type", "date");
                        break;
                    case 6:
                        inputTag.setAttribute("type", "file");
                        break;
                    default:
                        inputTag.setAttribute("type", "text");
                        break;
                }
            }
            inputTag.setAttribute("name", "sport-" + sportCount + "-" + j);

            newCol.appendChild(inputTag);
            newRow.appendChild(newCol);
        }
        resultTable.appendChild(newRow);
        sportCount++;
    }
    function addEvent() {
        var resultTable = document.getElementById("eventTable");
        var newRow = document.createElement("tr");

        var srnoCol = document.createElement("td");
        var srno = document.createTextNode(eventCount);

        srnoCol.appendChild(srno);
        newRow.appendChild(srnoCol);

        for (var j = 1; j <= 7; j++) {
            var newCol = document.createElement("td");
            if (j == 5) {
                var inputTag = document.createElement("select");

                var val = ["Department", "Institute", "University", "Other"];
                var name = ["Inter-Department", "Inter-Institute", "Inter-University", "Other"];

                for (var i = 0; i < val.length; i++) {
                    var option = document.createElement("option");
                    option.value = val[i];
                    option.text = name[i];
                    inputTag.appendChild(option);
                }
            }
            else {
                var inputTag = document.createElement("input");
                switch (j) {
                    case 3:
                    case 4:
                        inputTag.setAttribute("type", "date");
                        break;
                    case 6:
                        inputTag.setAttribute("type", "file");
                        break;
                    default:
                        inputTag.setAttribute("type", "text");
                        break;
                }
            }
            inputTag.setAttribute("name", "event-" + eventCount + "-" + j);

            newCol.appendChild(inputTag);
            newRow.appendChild(newCol);
        }
        resultTable.appendChild(newRow);
        eventCount++;
    }

    function addCountersAndCheck() {
        var form = document.getElementById("ActivityForm");

        var attributeName = ["seminarCounter", "isteCounter", "ieCounter", "sportCounter", "eventCounter",
                             "jCounter", "cCounter", "jobCounter"];

        var valueArray = [seminarCount, isteCount, ieCount, sportCount, eventCount, jCount, cCount, jobCount];

        for (var i = 0; i < attributeName.length; i++) {

            var Tag = document.createElement("input");
            Tag.setAttribute("name", attributeName[i]);
            Tag.setAttribute("type", "hidden");
            Tag.value = valueArray[i];
            form.appendChild(Tag);
        }

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

        var tagName = ["seminar", "iste", "ie", "sport", "event"];

        for (act = 0; act < tagName.length; act++) {
            var LeftEmpty = 0;
            for (var Field = 1; Field < valueArray[act]; Field++) {
                var field1 = form.elements[tagName[act] + "-" + Field + "-1"];
                var field2 = form.elements[tagName[act] + "-" + Field + "-2"];
                var field3 = form.elements[tagName[act] + "-" + Field + "-3"];
                var field4 = form.elements[tagName[act] + "-" + Field + "-4"];
                var field6 = form.elements[tagName[act] + "-" + Field + "-6"];
                if (act != 0) {
                    var field7 = form.elements[tagName[act] + "-" + Field + "-7"];
                }

                if (field1.value == "" && field2.value == "" && field3.value == "" &&
                    field4.value == "" &&  field6.value == "") {
                    if (act == 0)
                        LeftEmpty = 1;
                    else if (field7.value == "")
                        LeftEmpty = 1;
                }
                else {
                    if (LeftEmpty == 1) {
                        alert("Enter Fields in order! Don't Skip any row.");
                        return false;
                    }
                }
            }
        }

        return true;

    }
</script>

</html>