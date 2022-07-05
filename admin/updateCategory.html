<?php
require_once('../config/setting.php');
require_once('../config/db.php');
require_once('../config/function.php');
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

  <title>Update Course Category</title>
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
    .table_course tr
    {

      height: 50px;

    }
    .table_course td{
        padding: 10px;
    }
    .table_course td input[type="submit"]{
  background-color:greenyellow;
  color:blue;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;


}
.table_course td input[type="submit"]:hover{

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


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
      <div class="section-title">
          <h2>Update Course</h2>

        </div>

<?php

if (isset($_POST['description'])){
  mysqli_select_db($conn,$database);
        $categoryid=$_GET['categoryid'];

        $description=$_POST['description'];
        $sql ="UPDATE `tbl_category` SET `tbl_category_description`='".$description."'
        WHERE (`tbl_category_id`='".$categoryid."') LIMIT 1";


            $result=mysqli_query($conn,$sql);

           goto2("viewcoursecategory.php","The course category is successfully updated");

} else {
    $id=$_GET['categoryid'];
    $sql="select * from tbl_category where tbl_category_id='".$id."'";
    mysqli_select_db($conn,$database);
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<form action="updatecategory.php?categoryid=<?php echo $id ;?>" method="POST" >
    <table class="table_course">
        <tr>
  <th width="300px"><label for="categoryid">Category ID:</label></th>
  <td><input type="text"  id="categoryid" name="categoryid" disabled value="<?php echo $id; ?>"></td>
</tr>
<tr>
  <th width="300px"><label for="description">Description:</label></th>
  <td><textarea id="description" name="description" rows="6" cols="50" required><?php echo $row['tbl_category_description']?></textarea></td>
</tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" value="Save">
        </td>
    </tr>
  </table>
</form>
<?php } ?>
<div >
      <form action="viewcoursecategory.php">

        <input type="submit" value="Return To Previous Page" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
      </form>
      </div>

      </div>

      </div>

    </section><!-- End Portfolio Section -->


</body>

</html>
