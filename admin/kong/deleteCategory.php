<?php
    require 'config/postgresqlDB.php';
    require 'config/urlSummary.php';
    $id=$_GET['id'];

    $sql="DELETE FROM tbl_category WHERE id='".$id."'";

    $result=pg_query($db,$sql);

//     header("Location:$ToViewCourseCategoryHTML");
// exit();


?>