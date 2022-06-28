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

  <title>Update Course</title>
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
    .table_course td select:hover,.table_course td input[type=file]:hover
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

if (isset($_POST['title'])){
  mysqli_select_db($conn,$database);
        $courseid=$_GET['id'];

        $title=$_POST['title'];
        $language=$_POST['language'];
        $duration=$_POST['duration'];
        $description=$_POST['description'];

        $categoryid=$_POST['categoryid'];

        if (!empty($_FILES['imagefile']['tmp_name'])){

        $image = $_FILES['imagefile']['tmp_name'];
        $name = $_FILES['imagefile']['name'];
        $image = base64_encode(file_get_contents(addslashes($image)));
        $sql ="UPDATE `tbl_course` SET `tbl_course_title`='".$title."' ,`tbl_course_language`='".$language."'
        ,`tbl_course_duration`='".$duration."',`tbl_course_description`='".$description."',`tbl_course_image`='".$image."'
        , `tbl_course_categoryid`='".$categoryid."'
        WHERE (`tbl_course_courseid`='".$courseid."') LIMIT 1";

        }

        else
        {
            $sql ="UPDATE `tbl_course` SET `tbl_course_title`='".$title."' ,`tbl_course_language`='".$language."'
            ,`tbl_course_duration`='".$duration."',`tbl_course_description`='".$description."'
            , `tbl_course_categoryid`='".$categoryid."'
            WHERE (`tbl_course_courseid`='".$courseid."') LIMIT 1";

        }


            $result=mysqli_query($conn,$sql);

            goto2("viewTopCourse.php","The course is successfully updated");

} else {
    $id=$_GET['id'];
    $sql="select * from tbl_course where tbl_course_courseid='".$id."'";
    mysqli_select_db($conn,$database);
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<form action="updatecourse.php?id=<?php echo $id ;?>" method="POST" enctype="multipart/form-data">
    <table class="table_course">
        <tr>
  <th width="300px"><label for="courseid">Course ID:</label></th>
  <td><input type="text"  id="courseid" name="courseid" disabled value="<?php echo $id; ?>"></td>
</tr>
  <tr>
  <th><label for="title"> Course Title:</label></th>
  <td><textarea id="title" name="title" rows="6" cols="50"><?php echo $row['tbl_course_title'];?></textarea></td>
  </tr>
    <tr>
  <th><label for="language"> Programming language used:</label></th>
  <td><input type="text" id="language" name="language" value="<?php echo $row['tbl_course_language'];?>"></td>
    </tr>
    <tr>
  <th><label for="duration"> Course Duration:</label></th>
  <td><input type="number" id="duration" name="duration" step="0.01" value="<?php echo $row['tbl_course_duration'];?>"></td>
    </tr>
    <tr>
  <th><label for="description"> Course Description:</label></th>
  <td><textarea id="description" name="description" rows="6" cols="50" ><?php echo $row['tbl_course_description'];?></textarea></td>
    </tr>
    <tr>
        <?php $temp=$row['tbl_course_image'];?>
 <th rowspan="2"> <label for="image"> Course Image:</label></th>
  <td><div style="border:1px solid black;display:flex;justify-content:center;">
  <?php echo "<img src='data:image;base64,$temp' style='width:auto;height:auto;' class='img-fluid' alt='' >" ?>

</div></td>
    </tr>
    <tr>

        <td><input type="file" id="imagefile" name="imagefile"  accept="image/*"><b>Upload an image</b></td>
    </tr>
    <tr>
        <th rows="2"><label for="category"> Course Category:</label></th>
        <td><b><?php
        $temp=$row['tbl_course_categoryid'];
        $sql2 ="select * from tbl_category where tbl_category_id='".$temp."'";
        mysqli_select_db($conn,$database);
        $result2=mysqli_query($conn,$sql2);
        $row=mysqli_fetch_assoc($result2);
        echo $row['tbl_category_description'];
        ?></b></td>
    </tr>
    <tr>
    <td></td>
        <td>
  <select name="categoryid" id="categoryid" required value="<?php echo $row['tbl_course_categoryid'];?>">


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

      </div>

    </section><!-- End Portfolio Section -->


</body>

</html>
