<?php
    require 'config/postgresqlDB.php';
    $id=$_GET["id"];
    $sql="SELECT * FROM tbl_category WHERE id='".$id."'";
    $result=pg_query($sql);
    $data;
    if (!$result)
    {
        echo "Error occur";
    }
    $row=pg_fetch_all($result);


echo json_encode($row);
?>