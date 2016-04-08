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

            if(!($departmentSeminar == "" && $instituteSeminar == "" &&  $universitySeminar == "" && $otherSeminar == "")){

                $seminarDetail = "insert into awards values($user, '$event',
                        '$departmentSeminar','$instituteSeminar',
                        '$universitySeminar','$otherSeminar') 
                        on duplicate key update 
                        department = '$departmentSeminar' ,
                        institute = '$instituteSeminar' ,
                        university = '$universitySeminar' ,
                        other = '$otherSeminar' 
                        ";

                mysql_query($seminarDetail);
                echo mysql_error() , "<br>" , "<br>";
            }


            $departmentISTE = $_POST["departmentISTE"];
            $instituteISTE = $_POST["instituteISTE"];
            $universityISTE = $_POST["universityISTE"];
            $otherISTE = $_POST["otherISTE"];
            $event ="ISTE";

            if(!($departmentISTE == "" && $instituteISTE == "" &&  $universityISTE = "" && $otherISTE == "")){
                $ISTEDetail = "insert into awards values($user, '$event',
                        '$departmentISTE','$instituteISTE',
                        '$universityISTE','$otherISTE')
                        on duplicate key update 
                        department = '$departmentISTE' ,
                        institute = '$instituteISTE' ,
                        university = '$universityISTE' ,
                        other = '$otherISTE'
                        ";
            

                mysql_query($ISTEDetail);
                echo mysql_error() , "<br>";
            }

            $departmentIE = $_POST["departmentIE"];
            $instituteIE = $_POST["instituteIE"];
            $universityIE = $_POST["universityIE"];
            $otherIE = $_POST["otherIE"];
            $event ="IE";

            if(!($departmentIE == "" && $instituteIE == "" &&  $universityIE == "" && $otherIE == "")){
                $IEDetail = "insert into awards values($user, '$event', 
                        '$departmentIE','$instituteIE',
                        '$universityIE','$otherIE')
                        on duplicate key update 
                        department = '$departmentIE' ,
                        institute = '$instituteIE' ,
                        university = '$universityIE' ,
                        other = '$otherIE'
                        ";
            
                mysql_query($IEDetail);
                echo mysql_error() , "<br>";
            }

            $departmentSport = $_POST["departmentSport"];
            $instituteSport = $_POST["instituteSport"];
            $universitySport = $_POST["universitySport"];
            $otherSport = $_POST["otherSport"];
            $event ="Sport";

            if(!($departmentSport == "" && $instituteSport == "" &&  $universitySport =="" && $otherSport == "")){
                $SportDetail = "insert into awards values($user, '$event',
                        '$departmentSport','$instituteSport',
                        '$universitySport','$otherSport')
                        on duplicate key update 
                        department = '$departmentSport' ,
                        institute = '$instituteSport' ,
                        university = '$universitySport' ,
                        other = '$otherSport'
                        ";
            

                mysql_query($SportDetail);
                echo mysql_error() , "<br>";
            }

        $departmentEvent = $_POST["departmentEvent"];
        $instituteEvent = $_POST["instituteEvent"];
        $universityEvent = $_POST["universityEvent"];
        $otherEvent = $_POST["otherEvent"];
        $event ="Event";


        if(!($departmentEvent == "" && $instituteEvent == "" &&  $universityEvent =="" && $otherEvent == "")){
            $EventDetail = "insert into awards values($user, '$event',
                        '$departmentEvent','$instituteEvent',
                        '$universityEvent','$otherEvent')
                        on duplicate key update 
                        department = '$departmentEvent' ,
                        institute = '$instituteEvent' ,
                        university = '$universityEvent' ,
                        other = '$otherEvent'
                        ";
            

            mysql_query($EventDetail);
            echo mysql_error() , "<br>";

        }

        for($journals = 1; $journals < $_POST["jCounter"] ;$journals++){
            $var1 = "journo-".$journals."-1";
            $var2 = "journo-".$journals."-2";
            $var3 = "journo-".$journals."-3";

            if(!($_POST[$var1] == "" && $_POST[$var2] == "" &&  $_POST[$var3] =="" )){
                $insertQr = "insert into research_paper values( 
                                $user,$journals,
                                '$_POST[$var1]',
                                '$_POST[$var2]',
                                '$_POST[$var3]')
                                on duplicate key update 
                                title = '$_POST[$var1]' ,
                                journal = '$_POST[$var2]' ,
                                date = '$_POST[$var3]' 
                                ";
            
                $qrry = mysql_query($insertQr);
                echo mysql_error() , "<br>";
           }

        }

        for($competitive = 1; $competitive < $_POST["cCounter"] ;$competitive++){
            $var0 = "comp-".$competitive."-0";
            $var1 = "comp-".$competitive."-1";
            $var2 = "comp-".$competitive."-2";
            $var3 = "comp-".$competitive."-3";

            if(!($_POST[$var0] == "" && $_POST[$var1] == "" && $_POST[$var2] == "" &&  $_POST[$var3] =="" )){

                $insertQr = "insert into competitive_exam values( 
                                $user,$competitive,
                                '$_POST[$var0]',
                                '$_POST[$var1]',
                                '$_POST[$var2]',
                                '$_POST[$var3]')
                                on duplicate key update 
                                exam_name = '$_POST[$var0]' ,
                                score = '$_POST[$var1]' ,
                                passing_year = '$_POST[$var2]' ,
                                probable_date = '$_POST[$var3]'
                                ";
            
                $qrry = mysql_query($insertQr);
                echo mysql_error() , "<br>";
            }
        }


        for($placement = 1; $placement < $_POST["jobCounter"] ;$placement++){
            $var1 = "job-".$placement."-1";
            $var2 = "job-".$placement."-2";
            $var3 = "job-".$placement."-3";

            if(!($_POST[$var1] == "" && $_POST[$var2] == "" &&  $_POST[$var3] =="" )){

                $insertQr = "insert into placement values( 
                                $user,$placement,
                                '$_POST[$var1]',
                                '$_POST[$var2]',
                                '$_POST[$var3]')
                                on duplicate key update 
                                comapny_name = '$_POST[$var1]' ,
                                salary = '$_POST[$var2]' ,
                                designation = '$_POST[$var3]' 
                                ";
            
                $qrry = mysql_query($insertQr);
                echo mysql_error() , "<br>";
            }
        }

         header("Location: FillResult.php");
        exit();
        
?>