<?php
include ("../config/setting.php");
include ("../config/function.php");
include ('../config/db.php');
include ('../config/checkSessionOther.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php

  $sqlProfile="select * from tbl_profile";
  mysqli_select_db($conn, $database);
  $resultProfile = mysqli_query($conn, $sqlProfile);
  $rowProfile=mysqli_fetch_assoc($resultProfile);

  $sqlContact="select * from tbl_contact";
  $resultContact=mysqli_query($conn,$sqlContact);
  $rowContact=mysqli_fetch_assoc($resultContact);

  $sqlSocial="select * from tbl_socialmedia";
  $resultSocial=mysqli_query($conn,$sqlSocial);


  ?>
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

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="adminIndex.php"><?php echo $rowProfile['Website_name'] ?></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">About</a></li>
              <li><a class="nav-link scrollto" href="#services">Services</a></li>
              <li><a class="nav-link scrollto " href="#features">Mission</a></li>
              <li><a class="nav-link scrollto " href="#company">Cooperated Companies</a></li>
              <li><a class="nav-link scrollto " href="#portfolio">Most Popular Courses</a></li>
              <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
              <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
              <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

          <a href="../logout.php" class="get-started-btn scrollto">Log Out</a>
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h1><?php echo $rowProfile['Slogan']?></h1>

        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <br>
    <br>
  <div class="container">
  <div class="section-title">
        <h2><a href="editProfile.php">[Edit Website Profile]</a></h2>

        </div>

  </div>
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
          <p>
            <?php

              echo $rowProfile['About_us'];
            ?>
          </p>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
        <h2>Services &nbsp;&nbsp;&nbsp;<a href="viewService.php">[Edit]</a></h2>
          <h4>We - <b><?php echo $rowProfile['Website_name'] ?></b> offer services as below.</h4>
        </div>

        <div class="row">
        <?php
                $sql="select * from tbl_service";
                mysqli_select_db($conn, $database);
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
            ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

            <div class="icon-box">
              <div class="icon"><i class="bx <?php echo $row['Boxicon_description']; ?>"></i></div>
              <h4><?php echo $row['ServiceName'];?></h4>
              <p><?php echo $row['Description'];?></p>
            </div>

          </div>
          <?php } ?>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- list section -->
    <section id="features" class="features">

      <div class="container">
      <div class="section-title">
          <h2>Our Mission - To Let You Learn &nbsp;&nbsp;&nbsp;<a href="viewlist.php">[Edit]</a></h2>

        </div>
        <div class="row">
          <table style="width:100%">
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="icon-box mt-5 mt-lg-0">

              <?php
               $no=1;
              $sql ="select * from tbl_list";
              mysqli_select_db($conn,$database);
              $result=mysqli_query($conn,$sql);
              while ($row=mysqli_fetch_assoc($result)){
              ?>
              <tr>
              <th ><i class="bx bx-receipt"></i></th>
              <th><h4><?php echo $no; ?></h4></th>
              <th style="width:20%"><p><?php echo $row['tbl_list_Goal'];?></p></th>
              <th style="width:70%"><p><?php echo $row['tbl_list_Description'];?></p></th>
              </tr>
              <?php $no++;
              } ?>
              </div>
            </div>
            </table>
          </div>
        </div>
    </section>

    <!-- ======= Company Section ======= -->
    <section id="company" class="portfolio">
      <div class="container">

        <div class="section-title">
        <h2>Cooperated Companies &nbsp;&nbsp;&nbsp;<a href="viewcompany.php">[Edit]</a></h2>


        </div>


        <div  style="display: flex;flex-wrap:wrap ">
        <?php

         $sqlx ="SELECT * FROM tbl_company ";
         mysqli_select_db($conn,$database);
         $resultx=mysqli_query($conn,$sqlx);
        while ($rowx=mysqli_fetch_assoc($resultx)){ ?>


          <div class="col-lg-4 col-md-6 portfolio-item">
          <a href ="<?php echo $rowx['tbl_company_Link'];?>"><img src = "data:image;base64,<?php echo $rowx['tbl_company_Picture'];?>" style="width:max-content"class="img-fluid" alt="" ></a>

          </div>

          <?php }  ?>

        </div>

      </div>

    </section><!-- End Company Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="text-center title">
          <h3>What we have achieved so far</h3>

        </div>

        <div class="row counters position-relative">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end=<?php echo $rowProfile['Active_users'] ?> data-purecounter-duration="1" class="purecounter"></span>
            <p>Active users</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end=<?php echo $rowProfile['Experience_instructors'] ?> data-purecounter-duration="1" class="purecounter"></span>
            <p>Experience instructors</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end=<?php echo $rowProfile['Total_hours'] ?> data-purecounter-duration="1" class="purecounter"></span>
            <p>Total hours of teaching video</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end=<?php echo $rowProfile['Number_courses'] ?> data-purecounter-duration="1" class="purecounter"></span>
            <p>Number of courses</p>
          </div>
        </div>

      </div>
    </section><!-- End Counts Section -->


    <!-- ======= Most popular courses Section ======= -->
<section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Most Popular Courses&nbsp;&nbsp;&nbsp;<a href="viewTopCourse.php">[Edit]</a></h2>
          <p>Explore most popular courses to enhance your programming skills.</p>
          <br>

        </div>


        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <?php $sql ="select * from tbl_category";
          mysqli_select_db($conn,$database);
          $result=mysqli_query($conn,$sql);

                 while($row=mysqli_fetch_assoc($result)) {?>
                 <li data-filter=".filter-<?php echo $row['tbl_category_id']?>"><?php echo $row['tbl_category_description']?></li>


              <?php } ?>

            </ul>

          </div>
        </div>

        <div class="row portfolio-container" style="display: block;">
        <?php
         $sql ="select * from tbl_course";
         $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result)){ ?>


          <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $row['tbl_course_categoryid']?> ">


            <img src="data:image;base64,<?php echo $row['tbl_course_image']; ?>" style="width:max-content"class="img-fluid" alt="">

            <div class="portfolio-info" >
              <h4><?php echo $row['tbl_course_title']?></h4>

              <p><a href="coursedetailAdmin.php?id=<?php echo $row['tbl_course_courseid'] ;?>"  class="details-link" title="More Details"><i class="bx bx-link"></i></a></p>
            </div>


          </div>

          <?php } ?>



        </div>

      </div>

    </section><!-- End Popular Courses Section -->



  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
        <h2>Pricing &nbsp;&nbsp;&nbsp;<a href="viewPrice.php">[Edit]</a></h2>


        </div>

        <div class="row">
          <?php $sql= "select * from tbl_price order by price";
          mysqli_select_db($conn,$database);
          $result=mysqli_query($conn,$sql);


          while($row=mysqli_fetch_assoc($result)){
          ?>


          <div class="col-lg-4 col-md-6">
            <div class="box">
              <h3><?php echo $row['Type']?></h3>

              <h4><sup>$</sup><?php echo $row['price']?><span> / month</span></h4>
              <ul>
                <li><?php echo $row['basic_courses']?></li>
                <li><?php echo $row['members_content']?></li>
                <li><?php echo $row['practices']?></li>
                <li ><?php echo $row['support']?></li>
                <li ><?php echo $row['certification']?></li>
                <li ><?php echo $row['hours']?></li>
                <li ><?php echo $row['additional']?></li>
                <li ><?php echo $row['additional2']?></li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>



              </div>
            </div>
          </div>
        <?php } ?>


        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Faq Section ======= -->
    <section id="faq" class="faq">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Frequently Asked <strong>Questions</strong>&nbsp;&nbsp;&nbsp;<b><a href="viewFAQ.php">[Edit]</a></b></h3>
              <p>
                Below you'll find answers to the questions we get asked the most about applying for IT courses at this website.
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <?php
                    $sql="SELECT * FROM `wpproject`.`tbl_question` LIMIT 0,1000";
                    mysqli_select_db($conn,$database);
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><?php echo $row['Question']?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      <?php echo $row['Answer'] ?>
                    </p>
                  </div>
                </li>
                <?php } ?>
              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("../assets/img/faq.jpg");'>&nbsp;</div>
        </div>

      </div>
    </section><!-- End Faq Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact&nbsp;&nbsp;&nbsp;<b><a href="editContact.php">[Edit]</a></b></h2>
          <p>If you have any problems, please feel to free to contact us via the approaches provided at below.</p>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="<?php echo $rowContact['GoogleMap_link'] ?>"
          frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="ri-map-pin-line"></i>
                <h4>Location:</h4>
                <p><?php echo $rowContact['Location'] ?> </p>
              </div>

              <div class="email">
                <i class="ri-mail-line"></i>
                <h4>Email:</h4>
                <p><?php echo $rowContact['Email'] ?></p>
              </div>

              <div class="phone">
                <i class="ri-phone-line"></i>
                <h4>Call:</h4>
                <p><?php echo $rowContact['Phone'] ?></p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
      <h3><?php echo $rowProfile['Website_name']?></h3>

      <div class="social-links">
        <a href="" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span><?php echo $rowProfile['Website_name']?></span></strong>. All Rights Reserved
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