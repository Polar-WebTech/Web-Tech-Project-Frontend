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

  <title>Insert Course</title>
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

    .table_course td select:hover,.table_course td input[type=file]:hover
    {
      font-size: large;
      color: blue;
    }
    .table_course td input[type=text],.table_course td textarea
    {


      font-family:Verdana, Geneva, Tahoma, sans-serif;
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
          <h2>Insert Course</h2>

        </div>

<?php

if (isset($_POST['courseid'])){
  mysqli_select_db($conn,$database);
  $sqlcheckUnique ="select * from tbl_course";
  $resultcheck=mysqli_query($conn,$sqlcheckUnique);

  while ($row=mysqli_fetch_assoc($resultcheck))
  {
    if ($_POST['courseid']==$row['tbl_course_courseid'])
    {
      goto2("insertcourse.php"," Insertion failed due to duplicated course ID");


    }
  }

        $courseid=$_POST['courseid'];

        $title=$_POST['title'];
        $language=$_POST['language'];
        $duration=$_POST['duration'];
        $description=$_POST['description'];

        $categoryid=$_POST['categoryid'];

        $image = $_FILES['imagefile']['tmp_name'];
        $name = $_FILES['imagefile']['name'];
        $image = base64_encode(file_get_contents(addslashes($image)));

          $sql ="INSERT INTO `tbl_course` (`tbl_course_courseid`, `tbl_course_title`,`tbl_course_language`, `tbl_course_duration`,
            `tbl_course_description`,`tbl_course_image`,`tbl_course_categoryid`)
            VALUES ('".$courseid."', '".$title."', '".$language."','".$duration."','".$description."','".$image."','".$categoryid."')";




                $result=mysqli_query($conn,$sql);


             goto2("viewTopCourse.php"," Course is successfully Inserted");









} else {

?>
<form action="insertcourse.php" method="POST" enctype="multipart/form-data">
    <table class="table_course">
        <tr>
  <th width="300px"><label for="courseid">Course ID:</label></th>
  <td><input type="text"  id="courseid" name="courseid" required></td>
</tr>
  <tr>
  <th><label for="title"> Course Title:</label></th>
  <td><textarea id="title" name="title" rows="6" cols="50"></textarea></td>
  </tr>
    <tr>
  <th><label for="language"> Programming language used:</label></th>
  <td><input type="text" id="language" name="language"></td>
    </tr>
    <tr>
  <th><label for="duration"> Course Duration In Hours:</label></th>
  <td><input type="number" id="duration" name="duration" step="0.01"></td>
    </tr>
    <tr>
  <th><label for="description"> Course Description:</label></th>
  <td><textarea id="description" name="description" rows="6" cols="50"></textarea></td>
    </tr>
    <tr>
 <th> <label for="image"> Course Image:</label></th>
  <td><input type="file" id="imagefile" name="imagefile" required accept="image/*"><b>Upload an image</b></td>
    </tr>
    <tr>
        <th><label for="category"> Course Category:</label></th>
        <td>
  <select name="categoryid" id="categoryid" required>


   <?php
  $sql2 ="select * from tbl_category";  // sql command
  mysqli_select_db($conn,$database); ///select database as default
  $result2=mysqli_query($conn,$sql2);  // command allow sql cmd to be sent to mysql

   while( $row=mysqli_fetch_assoc($result2)) {   ?>
    <option

    value="<?php echo $row['tbl_category_id'];?>"><?php echo $row['tbl_category_description'];?></option>

   <?php }
    ?>
    </select>
        </td>
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
      <form action="viewTopCourse.php">

        <input type="submit" value="Return To Previous Page" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
      </form>
      </div>

      </div>

    </section><!-- End Portfolio Section -->


</body>

</html>
