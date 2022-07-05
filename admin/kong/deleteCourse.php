<?php
    require 'config/postgresqlDB.php';
    require 'config/urlToFrontend.php';
    $id=$_GET['id'];

    $sql="DELETE FROM tbl_course WHERE courseid='".$id."'";

    $result=pg_query($db,$sql);

//     header("Location: $ToAdminIndexHTML");
// exit();


?>