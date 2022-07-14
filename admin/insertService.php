<?php
  require './config/url.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>
td,th
{
  padding: 10px;
}


</style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Insert Services</title>
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

<script>

  // $(document).ready(function(){
       checkCookie();
  // });


  function checkCookie() {
    let sessionid = getCookie("sessionid");
    
    if (sessionid != "") {
      
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "https://itsensei.herokuapp.com/api/session/" + sessionid);

      xhr.send();

      xhr.onload = function(){

        var emptyArray = "[]";

        if(xhr.responseText === emptyArray){
          alert('Please Login First!');
          window.location.replace("../login.php");
        }
        else{

          var sessionInfo = JSON.parse(xhr.responseText);
          // alert('Welcome ' + sessionInfo[0].userid);

        }

      }


    } else {
      alert('Please Login First!');
      window.location.replace("../login.php");
    }
  }


  function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }


</script>

<?php include 'headerWithNavigation.php' ?>

<main id="main">

<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">
  <div class="section-title">
    <h2>Insert Services</h2>
  </div>

  <div class="row">
  <div class="col-lg-4 col-md-6 d-flex align-items-stretch">


  <?php

  // if (isset($_POST['description']))
  // {
  //   $u = $_POST['servicename'];
  //   $n = $_POST['description'];
  //   $x=$_POST['boxicon'];
  //   $sql = "INSERT INTO `tbl_service` (`ServiceName`, `Description`,`Boxicon_description`)
  //   VALUES ('".$u."', '".$n."','".$x."')";

  //   mysqli_select_db($conn, "wpproject");
  //   $result = mysqli_query($conn,$sql);

  //  goto2("viewService.php","Service is successfully inserted");
  // }
  // else
  // {
    ?>

<form action="https://itsensei.herokuapp.com/api/service" method="POST" id="serviceForm">
    <table >
    <tr>
      <th><label for="Service Name">Service&nbsp;Name</label></th>
      <th>:</th>
      <td><input type="text" id="servicename" name="servicename" size="80" required></td>
    </tr>
    <tr>
      <th><label for="Description" > Description </label></th>
      <th>:</th>
      <td>
        <textarea id = "description" name = "description" cols="50" rows="5" required></textarea>

      </td>
    </tr>


    <tr>
    <tr>
    <th><label for="Boxicon"> BoxIcons</label></th>
    <th>:</th>
    <td>
    <div class="icon"><i class="" id="previewIcon" style="font-size:xxx-large"></i></div>
    </td>
    </tr>
    <th><label for="Boxicons">BoxIcons&nbsp;Description</label></th>
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
      <td> <input class="btn btn-outline-success" type="submit" value="Add" id="save"></td>
    </tr>
    </form>
    <tr>
      <td>
      <form action="viewService.php">

      <input class="btn btn-outline-secondary rounded-pill" type="submit" value="Return To Previous Page">
</form>
      </td>
      <td>


      </td>
      <td></td>
    </tr>
    </table>


  <?php //} ?>

  </div>
  </div>
  <br>

  </div>

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
<script>
var frm = $('#serviceForm');

frm.submit(function (e) {

    e.preventDefault();

    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function (data) {
            alert('Service is successfully inserted.');
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