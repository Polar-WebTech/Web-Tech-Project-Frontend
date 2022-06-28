<?php
require_once('../config/setting.php');
require_once('../config/function.php');
require_once('../config/db.php');
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
    .table_price tr
    {

      height: 50px;

    }
    .table_price td{
        padding: 10px;
    }
    .table_price td input[type=submit]
    {
      background-color:greenyellow;
  color:blue;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;
    }
    .table_price td input[type=submit]:hover
    {
      font-size: x-large;
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


    <!-- ======= Pricing Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
      <div class="section-title">
          <h2>Insert New Package</h2>

        </div>

<?php

if (isset($_POST['Type'])){

        mysqli_select_db($conn,$database);
        $pricetype=$_POST['Type'];

        $price=$_POST['price'];
        $basic_c=$_POST['basic_courses'];
        $memberC=$_POST['members_content'];
        $practices=$_POST['practices'];
        $support=$_POST['support'];
        $certification=$_POST['certification'];
        $hours=$_POST['hours'];
        $additional=$_POST['additional'];
        $additional2=$_POST['additional2'];




        $sql ="INSERT INTO `tbl_price` (`Type`, `price`,`basic_courses`, `members_content`,
        `practices`,`support`,`certification`,`hours`,`additional`,`additional2`)
        VALUES ('".$pricetype."', '".$price."', '".$basic_c."','".$memberC."','".$practices."','".$support."','".$certification."'
        ,'".$hours."','".$additional."','".$additional2."')";

        $result=mysqli_query($conn,$sql);

        goto2("viewPrice.php","Price package is successfully Created");


} else {





?>
<form action="InsertPrice.php" method="POST" enctype="multipart/form-data">
    <table class="table_price">


        <tr>
  <th width="300px"><label for="Type">Price Type</label></th>
  <th>:</th>
  <td><input type="text"  id="Type" name="Type" required placeholder="Package name..."></td>
</tr>
  <tr>
  <th><label for="Price"> Price</label></th>
  <th>:</th>
  <td><input type="number" id="price" name="price" rows="6" cols="50" step=".01" required></td>
  </tr>
  <tr>
  <th><label for="basic_courses"> basic courses</label></th>
  <th>:</th>
  <td><input type="text" id="basic_courses" name="basic_courses"  size="100" required></td>
  </tr>
  <tr>
  <th><label for="members_content"> members content</label></th>
  <th>:</th>
  <td><input type="text" id="members_content" name="members_content" rows="6" cols="50" size="100" required></td>
  </tr>
  <tr>
  <th><label for="practices">practices</label></th>
  <th>:</th>
  <td><input type="text" id="practices" name="practices" rows="6" cols="50" size="100" required></td>
  </tr>
  <tr>
  <th><label for="support"> Support</label></th>
  <th>:</th>
  <td><input type="text" id="support" name="support" rows="6" cols="50" size="100" required></td>
  </tr>
  <tr>
  <th><label for="certification"> Certification</label></th>
  <th>:</th>
  <td><input type="text" id="certification" name="certification" rows="6" cols="50" size="100" required></td>
  </tr>
  <tr>
  <th><label for="hours"> hours</label></th>
  <th>:</th>
  <td><input type="text" id="hours" name="hours" rows="6" cols="50" size="100" required></td>
  </tr>
  <tr>
  <th><label for="additional"> additional 1</label></th>
  <th>:</th>
  <td><input type="text" id="additional" name="additional" rows="6" cols="50" size="100" ></td>
  </tr>
  <tr>
  <th><label for="additional2"> additional 2</label></th>
  <th>:</th>
  <td><input type="text" id="additional2" name="additional2" rows="6" cols="50" size="100" ></td>
  </tr>







    <tr>
        <td></td>
        <td></td>
        <td>
            <input type="submit" value="Save">
        </td>
    </tr>
  </table>
</form>
<?php } ?>
<div >
      <form action="viewPrice.php">

        <input type="submit" value="Return To Previous Page" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
      </form>
      </div>

      </div>

      </div>

    </section><!-- End Pricing Section -->


</body>

</html>
