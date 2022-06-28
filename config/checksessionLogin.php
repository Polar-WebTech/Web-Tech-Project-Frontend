<?php
require_once('function.php');
session_start();

if ((isset($_SESSION['userID']))){


       goto2("admin/adminIndex.php","You have logged on.");

}

?>