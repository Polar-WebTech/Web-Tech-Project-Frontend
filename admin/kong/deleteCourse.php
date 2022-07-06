<?php
    require 'config/postgresqlDB.php';
    require 'config/urlSummary.php';
    $id=$_GET['id'];

    $sql="DELETE FROM tbl_course WHERE courseid='".$id."'";

    $result=pg_query($db,$sql);


    redirectHeader ($ToViewTopCourseHTML);



?>