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

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Cooperated Companies</title>
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

  <style>
    .category a
    {
      color: blue;
      background-color:greenyellow;
      padding-top: 5px;
      padding-bottom: 5px;
      padding-left: 15px;
      padding-right: 15px;
      border-radius: 25px;
    }
    .category a:hover
    {


      font-size:x-large;


    }
    </style>
</head>

<body>


  <main id="main">


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container-fluid">

      <div class="row justify-content-center" style="padding-top:20px;padding-bottom:20px">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between" >
          <h1 class="logo me-auto me-lg-0"><a href="adminIndex.php"><?php echo $rowProfile['Website_name'] ?></a></h1>

        </div>
      </div>

    </div>
  </header><!-- End Header -->


    <!-- ======= Company Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
        <h2>View Cooperated Companies</h2>
        <br>
          <h3><a href="adminIndex.php" id="back"><u>Back<u></a></h3>
        </div>


        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">

          </div>
        </div>

        <div class="row portfolio-container" style="display: block;">
        <?php
         $conn = new mysqli($servername, $user, $passw);
         $sql ='SELECT * FROM `tbl_company`';
         mysqli_select_db($conn,$database);
         $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result)){ ?>


          <div class="col-lg-4 col-md-6 portfolio-item ">
          <a href ="<?php echo $row['tbl_company_Link'];?>"><img src = "data:image;base64,<?php echo $row['tbl_company_Picture'];?>" style="width:max-content"class="img-fluid" alt="" ></a>

            <div class="portfolio-info" >

              <p><a href="updatecompany.php?tbl_company_Title=<?php echo $row['tbl_company_Title'] ;?>" style="font-size:medium;color:white;">Update&nbsp;&nbsp;</a></p>
              <p><a href="deletecompany.php?tbl_company_Title=<?php echo $row['tbl_company_Title'] ;?>" onclick="return confirm ('Are you sure to delete this company?')" style="font-size:medium;color:white;">Delete</a></p>
            </div>


          </div>

          <?php } ?>


          <div class="col-lg-4 col-md-6 portfolio-item " style="display: flex; justify-content:center;">
            <h4><a href="insertcompany.php"><img src="../assets/img/plus icon.png" style="height: 150px; width: 120px;"class="img-fluid" alt=""></a>
            <div class="portfolio-info">
            <p><a href="insertcompany.php" style="font-size:medium;color:white;">Add</a></p>

            </div>
          </div>
        </div>

      </div>

    </section><!-- End Company Section -->


  </main><!-- End #main -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">xxx<i class="bi bi-arrow-up-short"></i></a>

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