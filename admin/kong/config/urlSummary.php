<?php

include 'urlToBackend.php';
include 'urlToFrontend.php';


function redirectHeader ($path)
{
    echo "<script>window.location.href='$path';</script>";
    // header("Location:$path");
    // exit();
}
?>