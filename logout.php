<?php
    require_once('config/function.php');

    session_start();

    unset($_SESSION['userID']);
    unset($_SESSION['password']);

    session_destroy();


  goto2("login.php","You have log out from the Portal")




?>