<?php
    require 'config/postgresqlDB.php';
    require 'config/urlSummary.php';

    $courseid=$_POST['hiddencourseid'];

    $title=$_POST['title'];
    $language=$_POST['language'];
    $duration=doubleval($_POST['duration']);
    $description=$_POST['description'];

    $categoryid=$_POST['categoryid'];
    if ($_FILES['imagefile']['size']!=0)
    {
        $image = $_FILES['imagefile']['tmp_name'];
    $name = $_FILES['imagefile']['name'];
    $image = base64_encode(file_get_contents(addslashes($image)));
    $imageescape=pg_escape_bytea($image);
    $sql="UPDATE tbl_course SET title='".$title."',language='".$language."',duration=$duration,description='".$description."'
    ,categoryid='".$categoryid."', image='".$image."' WHERE courseid='".$courseid."'";
    $result=pg_query($sql);
    }
    else
    {
        $sql="UPDATE tbl_course SET title='".$title."',language='".$language."',duration=$duration,description='".$description."'
        ,categoryid='".$categoryid."' WHERE courseid='".$courseid."'";

    $result=pg_query($sql);
    }





    redirectHeader ( $ToUpdateCourseHTML."?id=".$courseid);



?>