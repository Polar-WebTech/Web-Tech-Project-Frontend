<?php
require_once('../config/setting.php');
require_once('../config/function.php');
require_once('../config/db.php');
include ('../config/checkSessionOther.php');
?>

<?php

if (isset($_GET['id'])){

        $u=$_GET['id'];

        $sql ="DELETE FROM `tbl_price`
        WHERE (`Type`='".$u."') ";

        mysqli_select_db($conn,$database);
        $result=mysqli_query($conn,$sql);
      goto2("viewprice.php","The Price Package is successfully deleted");
}
?>