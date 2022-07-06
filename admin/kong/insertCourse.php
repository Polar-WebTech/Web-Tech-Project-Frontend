<?php
    require 'config/postgresqlDB.php';
    require 'config/urlSummary.php';

    $courseid=$_POST['courseid'];

    $title=$_POST['title'];
    $language=$_POST['language'];
    $duration=doubleval($_POST['duration']);
    $description=$_POST['description'];

    $categoryid=$_POST['categoryid'];

    $image = $_FILES['imagefile']['tmp_name'];
    $name = $_FILES['imagefile']['name'];
    $image = base64_encode(file_get_contents(addslashes($image)));
    $imageescape=pg_escape_bytea($image);
    // echo $image;
    // echo $imageescape;
    $sqlcheck="SELECT * FROM tbl_course WHERE courseid='".$courseid."'";
    $resultcheck=pg_query($sqlcheck);
    $numrow=pg_num_rows($resultcheck);
    // echo($numrow);
    if ($numrow==0)
    {
        $sql="INSERT INTO tbl_course (courseid,title,language,duration,description,image,categoryid)
        VALUES ('".$courseid."', '".$title."','".$language."',$duration,'".$description."','".$imageescape."','".$categoryid."') ";

    $result=pg_query($sql);

    }
    else
    {
        echo "<script>alert('The course id entered already existed. Please try with other unique course id')</script>";
    }

    redirectHeader ($ToViewTopCourseHTML);


?>