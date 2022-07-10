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

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
  td,th
  {
    padding: 10px;
  }
  input[type="submit"].save{
  background-color:greenyellow;
  color:blue;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;


}
input[type="submit"].save:hover{

  font-size: x-large;

}
  </style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Services</title>
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
  <!-- <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> -->
  <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- =======================================================
  * Template Name: KnightOne - v4.3.0
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script>
    function iconChange(value) {
    document.getElementById("previewIcon").className = "bx "+value; 
  } 
  </script>
</head>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages ">
    <div class="container-fluid">

    <div class="row justify-content-center" style="padding-top:20px;padding-bottom:20px">
    <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
      <h1 class="logo me-auto me-lg-0"><a href="adminIndex.php"><?php echo $rowProfile['Website_name'] ?></a></h1>
    </div>
    </div>

    </div>
</header>
<!-- End Header -->
<body>
<main id="main">

<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">
  <div class="section-title">
    <h2>Update Services</h2>
  </div>

  <div class="row">
  <div class="col-lg-4 col-md-6 d-flex align-items-stretch">


  <?php
  // if (isset($_POST['Description']))
  // {
  //   $u = $_GET['ServiceName'];
  //   $n = $_POST['Description'];
  //   $x=$_POST['boxicon'];
  //   $sql = "UPDATE `tbl_service` SET `Description` = '".$n."',  `Boxicon_description` = '".$x."'
  //   WHERE (`ServiceName` = '".$u."') LIMIT 1";

  //   mysqli_select_db($conn, $database);
  //   $result = mysqli_query($conn,$sql);

  //  goto2("viewService.php","The service is successfully updated");
  // }
  // else
  // {
  //   $u = $_GET['ServiceName'];

  //   $sql="select * from tbl_service where ServiceName='".$u."'";
  //   mysqli_select_db($conn, $database);
  //   $result = mysqli_query($conn, $sql);

  //   $row = mysqli_fetch_assoc($result);
    ?>

    <form method="PUT" id="serviceForm">
    <table >
    <tr>
      <th><label for="Service Name">Service Name</label></th>
      <th>:</th>
      <td><input type="text" id="servicename" name="servicename"  disabled value = "<?php //echo $u; ?>"></td>
    </tr>
    <tr>
      <th><label for="Description"> Description</label></th>
      <th>:</th>
      <td><textarea id="description" rows="5px" cols="50px" name="description" required><?php //echo $row['Description']; ?></textarea></td>
    </tr>
    <tr>
    
    <tr>
    <tr>
    <th><label for="Boxicon"> BoxIcons</label></th>
    <th>:</th>
    <td>
    <div class="icon"><i class="bx <?php //echo $row['Boxicon_description'] ?>" id="previewIcon" style="font-size:xxx-large"></i></div>
    </td>
    </tr>
    <tr>
    <th><label for="Boxicon Description"> BoxIcons&nbsp;Description</label></th>
    <th>:</th>
    <td>
      <select id=“boxicon_description” name="boxicon_description" onchange="iconChange(this.value)" required>
          <option value="bx-color"><i class='bx bx-color'></i> Color</option>
          <option value="bx-money"><i class='bx bx-money'></i> Money</option>
          <option value="bx-certification"><i class='bx bx-certification'></i> Certification</option>
          <option value="bxl-facebook"><i class='bx bxl-facebook'></i> Facebook</option>
          <option value="bx-video"><i class='bx bx-video'></i> Video</option>
          <option value="bxs-videos"><i class='bx bxs-videos'></i> Videos</option>
          <option value="bx-signal-5"><i class='bx bx-signal-5'></i> Signal</option>
          <option value="bx-cheese"><i class='bx bx-cheese'></i> Cheese</option>
          <option value="bx-home-alt-2"><i class='bx bx-home-alt-2'></i> Home</option>
          <option value="bx-cable-car"><i class='bx bx-cable-car'></i> Cable Car</option>
          <option value="bx-bowl-hot"><i class='bx bx-bowl-hot'></i> Hot Bowl</option>
          <option value="bxs-injection"><i class='bx bxs-injection'></i> Injection</option>
          <option value="bx-qr-scan"><i class='bx bx-qr-scan'></i> Qr-Scan</option>
          <option value="bx-speaker"><i class='bx bx-speaker'></i> Speaker</option>
          <option value="bx-bar-chart-alt-2"><i class='bx bx-bar-chart-alt-2'></i> Bar Chart</option>
          <option value="bx-buildings"><i class='bx bx-buildings'></i> Buildings</option>
          <option value="bx-message-rounded-dots"><i class='bx bx-message-rounded-dots'></i> Message</option>
          <option value="bx-user-pin"><i class='bx bx-user-pin'></i> User Pin</option>
          <option value="bxs-analyse"><i class='bx bxs-analyse'></i> Analysis</option>
          <option value="bx-plus-medical"><i class='bx bx-plus-medical' ></i> Medical</option>
          <option value="bx-accessibility"><i class='bx bx-accessibility'></i> Accessibility</option>
          <option value="bx-check-shield"><i class='bx bx-check-shield'></i> Network</option>
      </select>
    </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td> <input type="submit" value="Save" class="save"></td>
    </tr>
    </form>
    <tr>
      <td>
      <form action="viewService.php">

<input type="submit" value="Return To Previous Page" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
</form>
      </td>
      <td></td>
      <td></td>
    </tr>
    </table>



  <?php //} ?>
  </div>
  </div>

  </div>
</section>


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
<!-- Javascript to read service data -->
<script>

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const servicename = urlParams.get('servicename');

document.getElementById("serviceForm").setAttribute("action","https://itsensei.herokuapp.com/api/service/"+servicename);

var xml = new XMLHttpRequest();
xml.open('get','https://itsensei.herokuapp.com/api/service/' + servicename);

xml.send();

xml.onload = function(){

  var serviceData = JSON.parse(xml.responseText);

  document.getElementById("servicename").value = serviceData[0].servicename;
  document.getElementById("description").value = serviceData[0].description;
  document.getElementById("previewIcon").className = "bx "+serviceData[0].boxicon_description;
}


</script>
<!-- Javascript to update service data (MUST ENABLE MOESIF CORS) -->
<script>
  var frm = $('#serviceForm');

  frm.submit(function (e) {

      e.preventDefault();

      $.ajax({
          type: frm.attr('method'),
          url: frm.attr('action'),
          data: frm.serialize(),
          success: function (data) {
              alert('The service is successfully updated.');
              window.location.replace("viewService.php");
          },
          error: function (data) {
              console.log('An error occurred.');
              console.log(data);
          },
      });
  });

</script>
</html>