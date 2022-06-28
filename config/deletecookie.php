<?php
include ('function.php');
setcookie("loginuser","",time()-(3*86400),"/");
setcookie("loginpass","",time()-(3*86400),"/");
goto2("../login.php","Cookie has been deleted successfully");
?>