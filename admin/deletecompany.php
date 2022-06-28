<?php
include ("../config/setting.php");

include ("../config/function.php");

include ("../config/db.php");
include ('../config/checkSessionOther.php');
?>

<?php

if (isset($_GET['tbl_company_Title'])){
    $u = $_GET['tbl_company_Title'];
    $sql = "DELETE FROM `tbl_company` WHERE (tbl_company_Title='".$u."') ";
    mysqli_select_db($conn,"wpproject");
    $result = mysqli_query($conn,$sql);

    goto2("viewcompany.php","The company is successfully deleted");
}

?>
