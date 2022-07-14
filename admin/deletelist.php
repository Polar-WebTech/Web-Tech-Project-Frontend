<?php
require_once('../config/setting.php');
require_once('../config/function.php');
require_once('../config/db.php');
include ('../config/checkSessionOther.php');
?>

<?php

 if(isset($_GET['tbl_list_Goal']))
       {
        $u=$_GET['tbl_list_Goal'];
        $sql ="DELETE FROM `tbl_list`
        WHERE (`tbl_list_Goal`='".$u."')";

        mysqli_select_db($conn,"wpproject");
        $result=mysqli_query($conn,$sql);

       goto2("viewlist.php"," The mission is successfully deleted");
       }

?>


