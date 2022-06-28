<?php
include ("../config/setting.php");
include ("../config/function.php");
include ("../config/db.php");
include ('../config/checkSessionOther.php');
$sqlProfile="select * from tbl_profile";
mysqli_select_db($conn, $database);
$resultProfile = mysqli_query($conn, $sqlProfile);
$rowProfile=mysqli_fetch_assoc($resultProfile);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>
td,th
{
  padding: 10px;
}
input[type="submit"].add{
  background-color:greenyellow;
  color:blue;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;


}
input[type="submit"].add:hover{

  font-size: x-large;

}

</style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Insert Services</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: KnightOne - v4.3.0
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages ">
    <div class="container-fluid">

    <div class="row justify-content-center" style="padding-top:20px;padding-bottom:20px">
    <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
      <h1 class="logo me-auto me-lg-0"><a href="adminIndex.php"><?php echo $rowProfile['Website_name'] ?></a></h1>
    </div>
    </div>

    </div>
</header>
<!-- End Header -->

<main id="main">

<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">
  <div class="section-title">
    <h2>Insert Services</h2>
  </div>

  <div class="row">
  <div class="col-lg-4 col-md-6 d-flex align-items-stretch">


  <?php

  if (isset($_POST['description']))
  {
    $u = $_POST['servicename'];
    $n = $_POST['description'];
    $x=$_POST['boxicon'];
    $sql = "INSERT INTO `tbl_service` (`ServiceName`, `Description`,`Boxicon_description`)
    VALUES ('".$u."', '".$n."','".$x."')";

    mysqli_select_db($conn, "wpproject");
    $result = mysqli_query($conn,$sql);

   goto2("viewService.php","Service is successfully inserted");
  }
  else
  {?>

    <form action="insertService.php" method="POST" >
    <table >
    <tr>
      <th><label for="Service Name">Service&nbsp;Name</label></th>
      <th>:</th>
      <td><input type="text" id="servicename" name="servicename" size="80" required></td>
    </tr>
    <tr>
      <th><label for="Description" > Description </label></th>
      <th>:</th>
      <td>
        <textarea id = "description" name = "description" cols="50" rows="5" required></textarea>

      </td>
    </tr>

    <tr>
      <th colspan="3" style="color:red"><br>For BoxIcons description, please refer to this website-<a href="https://pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template/icons-boxicons.html">
    BoxIcons Website</a>. </th>
    </tr>
    <tr>
      <th colspan="3" style="color:red">For instance, the laptop icon in the above link is bx-laptop,then you should enter <i style="color:blue">bx-laptop</i> for the BoxIcons Description.<br><br></th>
    </tr>
    <tr>
    <th><label for="Boxicons">BoxIcons&nbsp;Description</label></th>
    <th>:</th>
      <td><input type="text" id="boxicon" name="boxicon" size="40" required></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td> <input type="submit" value="Add" class="add"></td>
    </tr>
    </form>
    <tr>
      <td>
      <form action="viewService.php">

<input type="submit" value="Return To Previous Page" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
</form>
      </td>
      <td>


      </td>
      <td></td>
    </tr>
    </table>


  <?php } ?>

  </div>
  </div>
  <br>

  </div>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>


</body>

</html>