<?php
require_once('function.php');
session_start();

if (!isset($_SESSION['userID'])){

    goto2("../login.php","Please log in before using");

}



?>