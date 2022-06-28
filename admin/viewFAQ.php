<?php

include ("../config/setting.php");
include ("../config/function.php");
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

  <title>View FAQ</title>
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

  <section id="portfolio" class="portfolio">
      <div class="container">
      <div class="section-title">
          <h2 style="color:black">FAQ List</h2>
          <h3><a href="adminIndex.php" id="back"><u>Back</u></a><br></h3>
      </div>

<table style="width:100%;">
  <tr>
    <th>No</th>
    <th>Question</th>
    <th>Answer</th>
    <th colspan="2">Action</th>
  </tr>

<?php
    $no=1;
    $sql="SELECT * FROM `wpproject`.`tbl_question` LIMIT 0,1000";
    mysqli_select_db($conn,$database);
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){

?>

  <tr>
    <td style="text-align: center;"><?php echo $no; ?> </td>
    <td style="text-align:left;"><?php echo $row['Question']; ?></td>
    <td style="text-align:left;"><?php echo $row['Answer']; ?></td>
    <td style="text-align:center;"><p><a href="updateFAQ.php?question_id=<?php echo $row['Question_id']; ?>"><u>Update FAQ</u></a></p></td>
    <td style="text-align:center;"><p><a href="deleteFAQ.php?question_id=<?php echo $row['Question_id']; ?>" onclick="return confirm ('Are you sure to delete this FAQ?')"><u>Delete FAQ</u></a> </p></td>
  </tr>

  <?php $no++;} ?>

</table>

<form action="insertFAQ.php" style="margin-top: 10px;">
<input type="submit" value="Insert FAQ" id="insert" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
</form>

</body>
</html>

<style>

p{
  margin-top:15px;
}

table,th,td{


    text-align:center;
    padding: 10px;
}

#insert{
  margin-top: 5px;
  margin-left:564px;
}

#back{
    font-size: 20px;
}

</style>