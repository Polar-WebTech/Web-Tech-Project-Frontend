<?php
require_once('setting.php');
require_once('function.php');

$conn=new mysqli($servername,$user,$passw);

if (!$conn){

    die("Connection failed".mysqli_connect_error());
}


?>
