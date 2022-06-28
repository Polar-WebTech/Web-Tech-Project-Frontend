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
  input[type="submit"].save{
  background-color:greenyellow;
  color:blue;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;


}
input[type="submit"].save:hover{

  font-size: x-large;

}
  </style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Contact</title>
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
    <h2>Edit Contact</h2>
  </div>

  <div class="row">
  <div class="col-lg-4 col-md-6 d-flex align-items-stretch">


  <?php
  if (isset($_POST['link']))
  {
    $u = $_GET['id'];
    $a = $_POST['link'];
    $b = $_POST['location'];
    $c = $_POST['email'];
    $d = $_POST['phone'];

    $sql = "UPDATE `tbl_contact` SET `GoogleMap_link` = '".$a."',  `Location` = '".$b."',`Email` = '".$c."',`Phone` = '".$d."'
    WHERE (`id` = '".$u."') LIMIT 1";

    mysqli_select_db($conn, $database);
    $result = mysqli_query($conn,$sql);

   goto2("adminIndex.php","The contact is successfully edited");
  }
  else
{


    $sql="select * from tbl_contact";
    mysqli_select_db($conn, $database);
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $u=$row['id'];
    ?>

    <form action="editContact.php?id=<?php echo $u; ?>" method="POST">
    <table >
    <tr>
      <th><label for="link">Google Map Link</label></th>
      <th>:</th>
      <td><input type="text" id="link" name="link" size="50"required value = "<?php echo $row['GoogleMap_link'] ?>"></td>
    </tr>
    <tr>
      <th><label for="location">Location</label></th>
      <th>:</th>
      <td><textarea id="location" rows="5px" cols="50px" name="location" required><?php echo $row['Location']; ?></textarea></td>
    </tr>

    <tr>
      <th><label for="email">Email</label></th>
      <th>:</th>
      <td><input type="text" id="email" name="email" size="50" required value = "<?php echo $row['Email'] ?>"> </td>
    </tr>

    <tr>
      <th><label for="phone">Phone No</label></th>
      <th>:</th>
      <td><input type="text" id="phone" name="phone" size="50"required value = "<?php echo $row['Phone'] ?>"> </td>
    </tr>


    <tr>
      <td></td>
      <td></td>
      <td> <input type="submit" value="Save" class="save"></td>
    </tr>
    </form>
    <tr>
      <td>
      <form action="adminIndex.php">

<input type="submit" value="Return To Previous Page" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
</form>
      </td>
      <td></td>
      <td></td>
    </tr>
    </table>



  <?php } ?>
  </div>
  </div>

  </div>
</section>


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



</html>