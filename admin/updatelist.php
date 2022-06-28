<?php
include ("../config/setting.php");
include ("../config/db.php");
include_once ("../config/function.php");
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

input[type="submit"].inp{
  background-color:greenyellow;
  color:blue;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;


}
input[type="submit"].inp:hover{

  font-size: x-large;

}

#tableList th,#tableList td
{
  padding: 10px;
}
</style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Mission</title>
  <meta content="" name="tbl_list_Description">
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
  <header id="header" class="fixed-top header-inner-pages ">
    <div class="container-fluid">

      <div class="row justify-content-center" style="padding-top:20px;padding-bottom:20px">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="adminIndex.php"><?php echo $rowProfile['Website_name'] ?></a></h1>
        </div>
      </div>

    </div>
  </header><!-- End Header -->



  <main id="main">

  <section id="features" class="features">
      <div class="container">
      <div class="section-title">
          <h2>Update Mission Description</h2>

        </div>
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="icon-box mt-5 mt-lg-0">
<?php

if (isset($_POST['desc'])){
 //echo " you have try to save ";
        $u=$_GET['tbl_list_Goal'];  //error  type="text" disabled
        $n=$_POST['desc'];
        $sql ="UPDATE `tbl_list` SET `tbl_list_Description`='".$n."'
        WHERE (`tbl_list_Goal`='".$u."') LIMIT 1";  // sql command
//echo $sql;
        mysqli_select_db($conn,$database); ///select database as default
        $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
       // mysqli_fetch_assoc($result);
       goto2("viewlist.php","The mission is successfully updated");
} else {
    $u=$_GET['tbl_list_Goal'];
    $sql ="select * from tbl_list where tbl_list_Goal='".$u."'";  // sql command
    mysqli_select_db($conn,"wpproject"); ///select database as default
    $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql

    $row=mysqli_fetch_assoc($result);
//echo $u;
?>
<form action="updatelist.php?tbl_list_Goal=<?php echo $u; ?>" method="POST">
 <table style="width:100%" id="tableList">
 <tr>
  <th><label for="Goal">Mission</label></th>
  <th>:</th>
  <th><input type="text" disabled id="tbl_list_Goal" name="tbl_list_Goal" size="50" value="<?php echo $u; ?>  "></th>
 </tr>
 <tr>
  <th><label for="desc"> Description</label></th>
  <th>:</th>
  <th><textarea id="desc" rows="5px" cols="70px" name="desc" required><?php echo $row['tbl_list_Description'];?></textarea></th>
 </tr>
 <tr>
  <td></td>
  <td></td>
  <td><input class="inp" type="submit" value="Save"></td>
 </tr>
</table>
<br>

</form>

<form action="viewlist.php" method="POST">
  <input type="submit" value="Return to previous page" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
</form>

<?php } ?>

</div>
</div>

    </div>

      </div>
    </section><!-- End Features Section -->


  </main><!-- End #main -->



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