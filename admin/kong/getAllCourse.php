<?php
    require 'config/postgresqlDB.php';

    $sql="SELECT * FROM tbl_contact ";
    $result=pg_query($sql);
    $data;
    if (!$result)
    {
        echo "Error occur";
    }
    $row=pg_fetch_all($result);

echo json_encode($row);
?>