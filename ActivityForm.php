<? php


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