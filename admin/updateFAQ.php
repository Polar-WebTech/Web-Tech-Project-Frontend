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

  <title>Update FAQ</title>
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
          <h2 style="color:black">Update FAQ</h2>

          <h4>Please select one item to edit</h4>
      </div>


<?php

if((isset($_POST['answer'])&&isset($_POST['question']))){
    $questionid=$_GET['question_id'];
    $u=$_POST['question'];
    $n=$_POST['answer'];
    $sql=" UPDATE `wpproject`.`tbl_question` SET `Answer` = '".$n."',`Question` = '".$u."' WHERE `question_id` = '".$questionid."'";
    mysqli_select_db($conn,"wpproject");
    $result=mysqli_query($conn,$sql);
    goto2("viewFAQ.php","The FAQ is updated successfully");
}


else{
    $u=$_GET['question_id'];
    $sql=" SELECT * FROM wpproject.tbl_question where Question_id='".$u."'";
    mysqli_select_db($conn,$database);
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
?>

<form action="updateFAQ.php?question_id=<?php echo  $u;?>" method="POST">
<header style="margin-left:465px; font-size:20px; color:black;"></header>
<table class="FAQ">
    <tr>
        <th><label for="Question" id="question">Question</label></th>
        <th><label for="Answer" id="answer">Answer</label></th>
    </tr>

    <tr>
        <td><textarea id="question" name="question"  rows="5" required><?php echo $row['Question'];?></textarea></td>
        <td><textarea  id="answer" name="answer" rows="5" required><?php echo $row['Answer']; ?></textarea></td>
    </tr>

</table>

<input type="submit" value="Save" class="submit">
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

input[type=submit].submit{
    margin-top: 12px;
    margin-left: 475px;
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

#question,#answer{
    text-align:center;
}

#question, #answer{
    width: 200px;
}

table,th,td{
    height:30px;
    width:1000px;
    border: 1px solid black;
    border-collapse:collapse;
    padding: 5px;
}

#question, #answer{
    width: 100%;
}



</style>