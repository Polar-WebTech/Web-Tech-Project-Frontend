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

  <title>Insert Cooperated Company</title>
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

    .table_course td input[type=file]:hover
    {
      font-size: large;
      color: blue;
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
    .table_course td input[type=text],.table_course td textarea
    {


      font-family:Verdana, Geneva, Tahoma, sans-serif;
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
          <h1 class="logo me-auto me-lg-0"><a href="adminIndex.html"><?php echo $rowProfile['Website_name'] ?></a></h1>

        </div>
      </div>

    </div>
  </header><!-- End Header -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
      <div class="section-title">
          <h2>Insert Cooperated Company</h2>

        </div>

<?php

if (isset($_POST['title'])){
    mysqli_select_db($conn,"wpproject");
    $u = $_POST['title'];
    $l = $_POST['link'];
    $image = $_FILES['imagefile']['tmp_name'];
    $name = $_FILES['imagefile']['name'];
    $image = base64_encode(file_get_contents(addslashes($image)));
    $sql = "INSERT INTO `tbl_company` (`tbl_company_Title`, `tbl_company_Picture`, `tbl_company_Link`)
    VALUES ('".$u."', '".$image."', '".$l."')";




    $result=mysqli_query($conn,$sql);


    goto2("viewcompany.php","Company is successfully inserted");









} else {

?>
<form action="insertcompany.php" method="POST" enctype="multipart/form-data">
    <table class="table_course">
        <tr>
  <th width="300px"><label for="title">Title:</label></th>
  <td><input type="text" id="title" name="title" required size="50"></td>
</tr>
    <tr>
 <th> <label for="image">Company Image:</label></th>
  <td><input type="file" id="imagefile" name="imagefile" required accept="image/*"></td>
    </tr>

    <tr>
  <th width="300px"><label for="link">Link:</label></th>
  <td><input type="text" id="link" name="link" size="50"></td>
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
      <form action="viewcompany.php">

        <input type="submit" value="Return To Previous Page" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
      </form>
      </div>

      </div>

    </section><!-- End Portfolio Section -->


</body>

</html>
