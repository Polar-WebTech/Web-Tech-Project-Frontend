<?php
include ("../config/setting.php");
include ("../config/function.php");
include ("../config/db.php");
include ('../config/checkSessionOther.php');
?>

  <?php

  if (isset($_GET['ServiceName']))
  {
    $u = $_GET['ServiceName'];

    $sql = "DELETE FROM `tbl_service`
    WHERE (`ServiceName` = '".$u."')";
    //echo $sql;
    mysqli_select_db($conn, $database);
    $result = mysqli_query($conn,$sql);

   goto2("viewService.php","The service is successfully deleted");
  }?>
