<?php
    require 'config/postgresqlDB.php';

    $sql="SELECT * FROM tbl_course ";
    $result=pg_query($sql);
    $data;
    if (!$result)
    {
        echo "Error occur";
    }
    $allcourse=array();
    while ($row=pg_fetch_row($result))
    {
        $course=array(
            "courseid"=>$row[0],
            "title"=>$row[1],
            "language"=>$row[2],
            "duration"=>$row[3],

            "description"=>$row[4],
            "image"=>pg_unescape_bytea($row[5]),
            "categoryid"=>$row[6]
        );
        array_push($allcourse,$course);
    }

echo json_encode($allcourse);
?>