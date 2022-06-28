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

  <title>Insert FAQ</title>
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
      <h2 style="color:black">Insert FAQ</h2>

      </div>

<?php

if(isset($_POST['question'])){

    $u=$_POST['question'];
    $n=$_POST['answer'];
    $sql="INSERT INTO `wpproject`.`tbl_question` (`Question`, `Answer`) VALUES ('".$u."', '".$n."')";
    mysqli_select_db($conn,"wpproject");
    $result=mysqli_query($conn,$sql);
    goto2("viewFAQ.php", "FAQ is successfully inserted");

}

else{


?>
<form action="insertFAQ.php" method="POST">

    <table>

      <tr>
        <th><label for="User ID" style="color:black">Question</label></th>
        <th>:</th>
        <td><textarea id="question" name="question" rows="6"cols="40" required></textarea></td>
      </tr>

      <tr>
        <th><label for="Name" style="color:black">Answer</label></th>
        <th>:</th>
        <td><textarea id="answer" name="answer" rows="6"cols="40" required></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td> <input type="submit" value="Confirm" class="submit" ></td>
      </tr>
    </table>



</form>

<?php } ?>
<div >
      <form action="viewFAQ.php">

        <input type="submit" value="Return To Previous Page" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
      </form>
  </div>

</body>
</html>

<style>
  label{
    font-size:20px;
  }



  th,td{
   border:1px;
   height:80px;
   padding: 15px;
  }
   input[type=submit].submit
    {
      background-color:greenyellow;
  color:blue;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;
    }
    input[type=submit].submit:hover
    {
      font-size: x-large;
    }


</style>
