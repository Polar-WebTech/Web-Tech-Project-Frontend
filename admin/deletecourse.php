<?php
require_once('../config/setting.php');
require_once('../config/db.php');
require_once('../config/function.php');
include ('../config/checkSessionOther.php');
?>

<?php

if (isset($_GET['id'])){

        $u=$_GET['id'];

        $sql ="DELETE FROM `tbl_course`
        WHERE (`tbl_course_courseid`='".$u."') ";

        mysqli_select_db($conn,$database);
        $result=mysqli_query($conn,$sql);
      goto2("viewTopCourse.php","The course is successfully deleted");
}
?>