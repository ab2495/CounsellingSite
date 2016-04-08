<?php
            require_once 'db_connect.php';
    $report = array();

    //Created a object to connect to database
    $obj = new DB_Connect();
    $conn = $obj->connect();
    if(!$conn)
        echo mysql_error() , "<br>";

            session_start();
            $user = $_SESSION["user"];
            
            $departmentSeminar = $_POST["departmentSeminar"];
            $instituteSeminar = $_POST["instituteSeminar"];
            $universitySeminar = $_POST["universitySeminar"];
            $otherSeminar = $_POST["otherSeminar"];
            $event ="Seminar";

            $seminarDetail = "insert into awards values($user, '$event',
                        '$departmentSeminar','$instituteSeminar',
                        '$universitySeminar','$otherSeminar')";

            mysql_query($seminarDetail);
            echo mysql_error() , "<br>" , "<br>";

            $departmentISTE = $_POST["departmentISTE"];
            $instituteISTE = $_POST["instituteISTE"];
            $universityISTE = $_POST["universityISTE"];
            $otherISTE = $_POST["otherISTE"];
            $event ="ISTE";

            $ISTEDetail = "insert into awards values($user, '$event',
                        '$departmentISTE','$instituteISTE',
                        '$universityISTE','$otherISTE')";
            

            mysql_query($ISTEDetail);
            echo mysql_error() , "<br>";
            

            $departmentIE = $_POST["departmentIE"];
            $instituteIE = $_POST["instituteIE"];
            $universityIE = $_POST["universityIE"];
            $otherIE = $_POST["otherIE"];
            $event ="IE";

            $IEDetail = "insert into awards values($user, '$event',
                        '$departmentIE','$instituteIE',
                        '$universityIE','$otherIE')";
            

            mysql_query($IEDetail);
            echo mysql_error() , "<br>";


        $departmentEvent = $_POST["departmentEvent"];
        $instituteEvent = $_POST["instituteEvent"];
        $universityEvent = $_POST["universityEvent"];
        $otherEvent = $_POST["otherEvent"];
        $event ="Event";

            $EventDetail = "insert into awards values($user, '$event',
                        '$departmentEvent','$instituteEvent',
                        '$universityEvent','$otherEvent')";
            

            mysql_query($EventDetail);
            echo mysql_error() , "<br>";


        for($journals = 1; $journals < $_POST["jCounter"] ;$journals++){
            $var1 = "journo-".$journals."-1";
            $var2 = "journo-".$journals."-2";
            $var3 = "journo-".$journals."-3";

            $insertQr = "insert into research_paper values( 
                                $user,$journals,
                                '$_POST[$var1]',
                                '$_POST[$var2]',
                                '$_POST[$var3]')";
            
            $qrry = mysql_query($insertQr);
            echo mysql_error() , "<br>";

        }

        for($competitive = 1; $competitive < $_POST["cCounter"] ;$competitive++){
            $var0 = "comp-".$competitive."-0";
            $var1 = "comp-".$competitive."-1";
            $var2 = "comp-".$competitive."-2";
            $var3 = "comp-".$competitive."-3";

            $insertQr = "insert into competitive_exam values( 
                                $user,$competitive,
                                '$_POST[$var0]',
                                '$_POST[$var1]',
                                '$_POST[$var2]',
                                '$_POST[$var3]')";
            
            $qrry = mysql_query($insertQr);
            echo mysql_error() , "<br>";
        }

        for($placement = 1; $placement < $_POST["jobCounter"] ;$placement++){
            $var1 = "job-".$placement."-1";
            $var2 = "job-".$placement."-2";
            $var3 = "job-".$placement."-3";

            $insertQr = "insert into placement values( 
                                $user,$placement,
                                '$_POST[$var1]',
                                '$_POST[$var2]',
                                '$_POST[$var3]')";
            
            $qrry = mysql_query($insertQr);
            echo mysql_error() , "<br>";
        }

?>