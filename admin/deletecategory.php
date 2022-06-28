<?php
require_once('../config/setting.php');
require_once('../config/db.php');
require_once('../config/function.php');
include ('../config/checkSessionOther.php');
?>

<?php

if (isset($_GET['categoryid'])){

        $u=$_GET['categoryid'];

        $sql ="DELETE FROM `tbl_category`
        WHERE (`tbl_category_id`='".$u."') ";

        mysqli_select_db($conn,$database);
        $result=mysqli_query($conn,$sql);
      goto2("viewcoursecategory.php","The course category is successfully deleted");
}
?>