<?php
    require 'config/postgresqlDB.php';
    require 'config/urlSummary.php';

    $id=$_POST["hiddencategoryid"];
    $description=$_POST["description"];

    $sql="UPDATE tbl_category SET description='".$description."' WHERE id='".$id."'";

    $result=pg_query($db,$sql);
    $path=$ToUpdateCategoryHTML."?id=".$id;
    redirectHeader ($path);



?>