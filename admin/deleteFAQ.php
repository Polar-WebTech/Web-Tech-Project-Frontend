<?php
include_once("../config/setting.php");

require_once('../config/db.php');
require_once('../config/function.php');
include ('../config/checkSessionOther.php');
?>
<?php

if(isset($_GET['question_id'])){

    $u=$_GET['question_id'];
    $sql=" DELETE FROM `wpproject`.`tbl_question` WHERE `Question_id` = '".$u."'";
    mysqli_select_db($conn,$database);
    $result=mysqli_query($conn,$sql);
    goto2("viewFAQ.php", "The FAQ is successfully deleted");

}

?>
