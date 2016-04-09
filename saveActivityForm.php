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
            
        $tagName = array("seminar", "iste", "ie", "sport", "event");
        $counter = array($_POST["seminarCounter"],$_POST["isteCounter"],$_POST["ieCounter"],
                         $_POST["sportCounter"],$_POST["eventCounter"]);
        $typeArray = array("Seminar","ISTE","IE","Sport","Event");

        for($act = 0; $act < count($tagName) ; $act++){

            for($givenRow = 1; $givenRow < $counter[$act] ; $givenRow++){
                $col1 = $_POST[$tagName[$act]."-".$givenRow."-1"];
                $col2 = $_POST[$tagName[$act]."-".$givenRow."-2"];
                $col3 = $_POST[$tagName[$act]."-".$givenRow."-3"];
                $col4 = $_POST[$tagName[$act]."-".$givenRow."-4"];
                $col5 = $_POST[$tagName[$act]."-".$givenRow."-5"];
                $col6 = $_POST[$tagName[$act]."-".$givenRow."-6"];
                
                if($act != 0)
                    $col7 = $tagName[$act]."-"+$givenRow."-7";
                else
                    $col7 = "";
                
                if(!($col1 =="" && $col2 =="")){
                    $insertQr = "insert into activity values( 
                                $user,$givenRow,
                                '$col1','$col2','$col3','$col4','$col5','$col6','$col7','$typeArray[$act]')
                                on duplicate key update 
                                title = '$col1' ,
                                place = '$col2' ,
                                start_date = '$col3' ,
                                end_date = '$col4' ,
                                level = '$col5' ,
                                certificate = '$col6' ,
                                prize = '$col7' 
                                ";
            
                    $qrry = mysql_query($insertQr);
                    echo mysql_error() , "<br>";
                }
            }
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