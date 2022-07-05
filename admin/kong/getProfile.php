<?php
    require 'config/postgresqlDB.php';

    $sql="SELECT * FROM tbl_profile WHERE id='1'";
    $result=pg_query($sql);
    $data;
    if (!$result)
    {
        echo "Error occur";
    }
    $row=pg_fetch_all($result);

echo json_encode($row);
?>