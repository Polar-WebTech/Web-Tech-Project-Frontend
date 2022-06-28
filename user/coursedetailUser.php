<?php
include ('../config/function.php');
include ('../config/setting.php');
include ('../config/db.php');

$sqlProfile="select * from tbl_profile";
mysqli_select_db($conn, $database);
$resultProfile = mysqli_query($conn, $sqlProfile);
$rowProfile=mysqli_fetch_assoc($resultProfile);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $rowProfile['Website_name'] ?></title>
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

<body>
<?php


     $path='userIndex.php';


  ?>
  <!-- ======= Header ======= -->

  <header id="header" class="fixed-top header-inner-pages">


    <div class="container-fluid">

<div class="row justify-content-center">
  <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
    <h1 class="logo me-auto me-lg-0"><a href="<?php echo $path; ?>"><?php echo $rowProfile['Website_name'] ?></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto " href="<?php echo $path;?>">Home</a></li>
        <li><a class="nav-link scrollto" href="<?php echo $path.'#services' ?>" >Services</a></li>

              <li><a class="nav-link scrollto " href="<?php echo $path.'#features'; ?>">Our Mission</a></li>
              <li><a class="nav-link scrollto " href="<?php echo $path.'#company'; ?>">Cooperated Companies</a></li>
              <li><a class="nav-link scrollto " href="<?php echo $path.'#portfolio'; ?>">Most Popular Courses</a></li>
              <li><a class="nav-link scrollto" href="<?php echo $path.'#pricing'; ?>">Pricing</a></li>
              <li><a class="nav-link scrollto" href="<?php echo $path.'#faq'; ?>">FAQ</a></li>
              <li><a class="nav-link scrollto" href="<?php echo $path.'#contact'; ?>">Contact</a></li>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</div>

</div>


  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo $path ?>">Home</a></li>
          <li>Course Details</li>
        </ol>
        <h2>Course Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper-container">
              <div class="swiper-wrapper align-items-center">
                <?php
                $id=$_GET['id'];
                $sql ="select * from tbl_course where tbl_course_courseid='".$id."'";
                mysqli_select_db($conn,$database);
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                ?>
                <div class="swiper-slide" style="display: flex; justify-content:center;">
                <img src="data:image;base64,<?php echo $row['tbl_course_image']; ?>" style="width:max-content"class="img-fluid" alt="" style="max-width: 100%;max-height:100%;">
                </div>


              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Course information</h3>
              <ul>
                <li><strong>Course ID</strong>: <?php echo $row['tbl_course_courseid'];?></li>
                <li><strong>Course Title</strong>: <?php echo $row['tbl_course_title'];?></li>
                <li><strong>Programming Languages Used</strong>: <?php echo $row['tbl_course_language'];?></li>
                <li><strong>Course Duration</strong>: <?php echo $row['tbl_course_duration'];?> Hours</li>
                <?php
                  $categoryid=$row['tbl_course_categoryid'];
                  $sql2 ="select * from tbl_category where tbl_category_id='".$categoryid."'";
                  $result2=mysqli_query($conn,$sql2);
                  $row2=mysqli_fetch_assoc($result2);
                ?>
                 <li><strong>Course Category</strong>: <?php echo $row2['tbl_category_description'];?></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>This is the detail of the course</h2>
              <p>
              <?php echo $row['tbl_course_description'] ?>
            </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3><?php echo $rowProfile['Website_name'] ?></h3>

      <div class="social-links">
        <a href="" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span><?php echo $rowProfile['Website_name'] ?></span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

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