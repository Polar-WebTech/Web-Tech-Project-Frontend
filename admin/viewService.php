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
  th,td
  {
    padding:10px;
  }
  th
  {
    font-size: large;
  }
  </style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Services</title>
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

<section id="services" class="services">
<div class="container">
<div class="section-title">
<h2>View Services</h2>
<h3><a href="adminIndex.php" id="back"><u>Back</u></a><br></h3>
</div>
<div class="row">
<table>
<tr>
  <th>No</th>
  <th>Service Name</th>
  <th>Description</th>
  <th>BoxIcons</th>
  </tr>
<?php
  $no=1;
  $sql="select * from tbl_service";
  mysqli_select_db($conn, $database);
  $result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
?>

   <tr>
    <td><p><?php echo $no; ?></p></td>
    <td><p><?php echo $row['ServiceName'];?></p></td>
    <td><p><?php echo $row['Description'];?></p></td>
    <td>
    <div class="icon"><i class="bx <?php echo $row['Boxicon_description'] ?>" style="font-size:xxx-large"></i></div>
    </td>
    <td><p><a href="updateService.php?ServiceName=<?php echo  $row['ServiceName'] ; ?>">Update Service </a></td>

<td><a href="deleteService.php?ServiceName=<?php echo  $row['ServiceName'] ; ?>" onclick="return confirm ('Are you sure to delete this service?')">Delete Service </a></p></td>
  </tr>

<?php $no++;
}?>

<tr>

<tr>

</table>
<a href="insertService.php">
          <button type="button" class="editbtn" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">Insert Service</button></a>


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