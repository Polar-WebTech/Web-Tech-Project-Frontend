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

<?php include 'head.php'?>
  <script>
    function iconChange(value) {
    document.getElementById("previewIcon").className = "bx "+value;
  }
  </script>
</head>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages ">
<?php include 'headerWithNavigation.php' ?>
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
      <td> <input class="btn btn-outline-success" type="submit" value="Save" id="save"  ></td>
    </tr>
    </form>
    <tr>
      <td>
      <form action="viewService.php">

      <input class="btn btn-outline-secondary rounded-pill" type="submit" value="Return To Previous Page">
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
xml.open('get','<?php echo $ToService ?>'+'/' + servicename);

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
              window.location.replace("<?php echo $ToViewServicePHP ?>");
          },
          error: function (data) {
              console.log('An error occurred.');
              console.log(data);
          },
      });
  });

</script>
</html>