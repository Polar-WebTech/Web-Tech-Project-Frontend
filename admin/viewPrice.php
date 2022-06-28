<?php
include("../config/setting.php");
include("../config/db.php");
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

  <title>View Pricing</title>
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


  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Pricing</h2>

          <h3><a href="adminIndex.php" id="back"><u>Back</u></a><br></h3>
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
                <br>
                <br>

                <a href="updateprice.php?id=<?php echo $row['Type'];?> ">Update Price</a>

                <br>
                <br>
                <p><a href="deleteprice.php?id=<?php echo $row['Type'] ;?>" onclick="return confirm ('Are you sure to delete this price package?')">Delete</a></p>


              </div>
            </div>
          </div>
        <?php } ?>
        <a href="InsertPrice.php">
          <button type="button" class="editbtn" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">Insert New Package</button></a>

        </div>

      </div>
    </section><!-- End Pricing Section -->


    </body>

</html>