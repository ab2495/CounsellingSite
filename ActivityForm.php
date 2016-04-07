<? php
            $departmentSeminar = $_POST["departmentSeminar"];
            $institutionSeminar = $_POST["institutionSeminar"];
            $universitySeminar = $_POST["universitySeminar"];
            $otherSeminar = $_POST["otherSeminar"];

            $test1 = mysql_query("insert into seminar values($departmentSeminar,$,$,$)")
            $test2 = mysql_query("insert into seminar values($,$institutionSeminar,$,$)")
            $test3 = mysql_query("insert into seminar value($,$,$universitySeminar,$,)")
            $test4 = mysql_query("insert into seminar values($,$,$,$otherSeminar)")

            mysql_query($test1);
            mysql_query($test2);
            mysql_query($test3);
            mysql_query($test4);

            $departmentISTE = $_POST["departmentISTE"];
            $institutionISTE = $_POST["institutionISTE"];
            $universityISTE = $_POST["universityISTE"];
            $otherISTE = $_POST["otherISTE"];

            $test5 = mysql_query("insert into ISTE values($departmentISTE,$,$,$)")
            $test6 = mysql_query("insert into ISTE values($,$institutionISTE,$,$)")
            $test7 = mysql_query("insert into ISTE value($,$,$universityISTE,$,)")
            $test8 = mysql_query("insert into ISTE values($,$,$,$otherISTE)")

            mysql_query($test5);
            mysql_query($test6);
            mysql_query($test7);
            mysql_query($test8);


            $departmentIE = $_POST["departmentIE"];
            $institutionIE = $_POST["institutionIE"];
            $universityIE = $_POST["universityIE"];
            $otherIE = $_POST["otherIE"];

            $test9 = mysql_query("insert into IE values($departmentIE,$,$,$)")
            $test10 = mysql_query("insert into IE values($,$institutionIE,$,$)")
            $test11 = mysql_query("insert into IE value($,$,$universityIE,$,)")
            $test12 = mysql_query("insert into IE values($,$,$,$otherIE)")

            mysql_query($test9);
            mysql_query($test10);
            mysql_query($test11);
            mysql_query($test12);

        $departmentEvent = $_POST["departmentEvent"];
        $institutionEvent = $_POST["institutionEvent"];
        $universityEvent = $_POST["universityEvent"];
        $otherEvent = $_POST["otherEvent"];

        $test13 = mysql_query("insert into Event values($departmentEvent,$,$,$)")
        $test14 = mysql_query("insert into Event values($,$institutionEvent,$,$)")
        $test15 = mysql_query("insert into Event value($,$,$universityEvent,$,)")
        $test16 = mysql_query("insert into Event values($,$,$,$otherEvent)")

        mysql_query($test13);
        mysql_query($test14);
        mysql_query($test15);
        mysql_query($test16);


?>