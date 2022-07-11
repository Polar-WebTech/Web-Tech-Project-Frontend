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

  <title>Edit Contact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
  <link href="../assets/css/otherStyle.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
  integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
  crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
  integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
  crossorigin=""></script>
  <!-- =======================================================
  * Template Name: KnightOne - v4.3.0
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<!-- ======= Header ======= -->
<!-- <div id="header"></div> -->
<!-- End Header -->

<main id="main">

<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">
  <div class="section-title">
    <h2>Edit Contact</h2>
  </div>
  <div id="loader"></div>
  <div id ="map" style = "height: 600px; width: 800px;"></div>
  <div class="row">
  <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

  <script>
    window.addEventListener("load",function()
    {
      // $("#header").load("header.html");
      // $("input").hide();
      // $("table").hide();


      document.getElementById("backForm").action="<?php echo $ToAdminIndexHTML?>";


    })
    $.when (

        $.ajax({
          type:"GET",
          complete:function()
          {
            $("#loader").hide();
            $("input").show();
      $("table").show();

          },


          url:"<?php echo $ToContact?>",
          success:function(result,status,xhr)
          {
            console.log(result);

            var contact=JSON.parse(result);

      var Location;
      if (contact[0].latitude==null||contact[0].latitude=="")
      {
        Location = [3.152815, 101.703651];
      }
      else
      {
        Location=[parseFloat(contact[0].latitude),parseFloat(contact[0].longitude)];
      }

      var map = L.map('map').setView(Location, 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);
map.attributionControl.setPrefix(false);
var marker = new L.marker(Location, {
    draggable: 'true',

  }).addTo(map);
  marker.bindPopup("We are here").openPopup();
  marker.on('drag', function(event) {
    // var position = marker.getLatLng();
    // marker.setLatLng(position, {
    //   draggable: 'true'
    // }).bindPopup(position).update();
    updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
  });
  function updateLatLng(lat,lng,reverse) {
if(reverse) {
marker.setLatLng([lat,lng]);
map.panTo([lat,lng]);
} else {
document.getElementById('latitude').value = marker.getLatLng().lat;
document.getElementById('longitude').value = marker.getLatLng().lng;
map.panTo([lat,lng]);
}}

    document.getElementById("location").innerHTML=contact[0].location;
    document.getElementById("email").value=contact[0].email;
    document.getElementById("phone").value=contact[0].phone;
    document.getElementById("latitude").value=contact[0].latitude;
        document.getElementById("longitude").value=contact[0].longitude;
          }
        })


    )













    </script>

    <form   id="editForm" method="POST">
      <input id="latitude" type="hidden" name="latitude" >
    <input id="longitude" type="hidden"  name="longitude" >
    <table >

    <tr>
      <th><label for="location">Location</label></th>
      <th>:</th>
      <td><textarea id="location" rows="5px" cols="50px" name="location" required></textarea></td>
    </tr>

    <tr>
      <th><label for="email">Email</label></th>
      <th>:</th>
      <td><input type="text" id="email" name="email" size="50" required  > </td>
    </tr>

    <tr>
      <th><label for="phone">Phone No</label></th>
      <th>:</th>
      <td><input type="text" id="phone" name="phone" size="50"required > </td>
    </tr>


    <tr>
      <td></td>
      <td></td>
      <td>
        <input class="btn btn-outline-success" type="submit" value="Save" id="save"  >

    </tr>
    </form>
    <tr>
      <td>
      <form  id="backForm" method="post">
        <input class="btn btn-outline-secondary rounded-pill" type="submit" value="Return To Previous Page"  >

</form>
      </td>
      <td></td>
      <td></td>
    </tr>
    </table>



  </div>
  </div>

  </div>
</section>

<script>
   var form= $("#editform");
    form.submit(function(e)
    {
      e.preventDefault();
      $.ajax({
        type:"POST",
        url: "<?php echo $ToContact?>",
        data: form.serialize(),
          success: function (data) {
            console.log(data);
              // alert('Submission was successful.');
              // window.location.replace("");
          },
          error: function (data) {
              console.log('An error occurred.');
              console.log(data);
          },

      })
    })
</script>
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



</html>