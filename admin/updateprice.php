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

  <title>View Pricing</title>
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <!-- =======================================================
  * Template Name: KnightOne - v4.3.0
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .table_price tr
    {

      height: 50px;

    }
    .table_price td{
        padding: 10px;
    }
    .table_price td input[type=submit]
    {
      background-color:greenyellow;
  color:blue;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;
    }
    .table_price td input[type=submit]:hover
    {
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


    <!-- ======= Pricing Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
      <div class="section-title">
          <h2>Update Price information</h2>

        </div>

<?php

// if (isset($_POST['price'])){

//         mysqli_select_db($conn,$database);
//         $pricetype=$_GET['id'];

//         $price=$_POST['price'];
//         $basic_c=$_POST['basic_courses'];
//         $memberC=$_POST['members_content'];
//         $practices=$_POST['practices'];
//         $support=$_POST['support'];
//         $certification=$_POST['certification'];
//         $hours=$_POST['hours'];
//         $additional=$_POST['additional'];
//         $additional2=$_POST['additional2'];




//         $sql ="UPDATE `tbl_price` SET `price`='".$price."' ,`basic_courses`='".$basic_c."'
//         ,`members_content`='".$memberC."',`practices`='".$practices."',`support`='".$support."'
//         , `certification`='".$certification."', `hours`='".$hours."'
//         , `additional`='".$additional."', `additional2`='".$additional2."'
//         WHERE (`Type`='".$pricetype."') LIMIT 1";

//         $result=mysqli_query($conn,$sql);

//         goto2("viewPrice.php","The price information is successfully updated");


// } else {

//     $id=$_GET['id'];


//     $sql="select * from tbl_price where Type='".$id."'";
//     mysqli_select_db($conn,$database);
//     $result=mysqli_query($conn,$sql);
//     $row=mysqli_fetch_assoc($result);

?>
<form action="updateprice.php?id=<?php //echo $id ;?>" method="PUT" id="pricingForm">
    <table class="table_price">


        <tr>
  <th width="300px"><label for="type">Price Type</label></th>
  <th>:</th>
  <td><input type="text"  id="type" name="type" disabled value="<?php //echo $id; ?>"></td>
</tr>
  <tr>
  <th><label for="Price"> Price</label></th>
  <th>:</th>
  <td><input type="text" id="price" name="price" rows="6" cols="50" required value="<?php //echo $row['price'];?>"></td>
  </tr>
  <tr>
  <th><label for="basic_courses"> Basic courses</label></th>
  <th>:</th>
  <td><input type="text" id="basic_courses" name="basic_courses"  size="100" value="<?php //echo $row['basic_courses'];?>"></td>
  </tr>
  <tr>
  <th><label for="members_content"> Member's Content</label></th>
  <th>:</th>
  <td><input type="text" id="members_content" name="members_content" rows="6" cols="50" size="100" value="<?php //echo $row['members_content'];?>"></td>
  </tr>
  <tr>
  <th><label for="practices">Practices</label></th>
  <th>:</th>
  <td><input type="text" id="practices" name="practices" rows="6" cols="50" size="100" value="<?php //echo $row['practices'];?>"></td>
  </tr>
  <tr>
  <th><label for="support"> Support</label></th>
  <th>:</th>
  <td><input type="text" id="support" name="support" rows="6" cols="50" size="100" value="<?php //echo $row['support'];?>"></td>
  </tr>
  <tr>
  <th><label for="certification"> Certification</label></th>
  <th>:</th>
  <td><input type="text" id="certification" name="certification" rows="6" cols="50" size="100" value="<?php //echo $row['certification'];?>"></td>
  </tr>
  <tr>
  <th><label for="hours"> Duration</label></th>
  <th>:</th>
  <td><input type="text" id="hours" name="hours" rows="6" cols="50" size="100" value="<?php //echo $row['hours'];?>"></td>
  </tr>
  <tr>
  <th><label for="additional"> Additional Description 1</label></th>
  <th>:</th>
  <td><input type="text" id="additional" name="additional" rows="6" cols="50" size="100" value="<?php //echo $row['additional'];?>"></td>
  </tr>
  <tr>
  <th><label for="additional2"> Additional Description 2</label></th>
  <th>:</th>
  <td><input type="text" id="additional2" name="additional2" rows="6" cols="50" size="100" value="<?php //echo $row['additional2'];?>"></td>
  </tr>







    <tr>
        <td></td>
        <td></td>
        <td>
            <input type="submit" value="Save">
        </td>
    </tr>
  </table>
</form>
<?php //} ?>
<div >
      <form action="viewPrice.php">

        <input type="submit" value="Return To Previous Page" style="border-radius:25px;background-color:white;color:green;padding:10px;">
      </form>
      </div>

      </div>

      </div>

    </section><!-- End Pricing Section -->


</body>

<!-- Javascript to read pricing data -->
<script>

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const id = urlParams.get('id');

  document.getElementById("pricingForm").setAttribute("action","https://itsensei.herokuapp.com/api/pricing/"+id);

  var xml = new XMLHttpRequest();
  xml.open('get','https://itsensei.herokuapp.com/api/pricing/' + id);

  xml.send();

  xml.onload = function(){

    var pricingData = JSON.parse(xml.responseText);

    document.getElementById("type").value = pricingData[0].type;
    document.getElementById("price").value = pricingData[0].price;
    document.getElementById("basic_courses").value = pricingData[0].basic_courses;
    document.getElementById("members_content").value = pricingData[0].members_content;
    document.getElementById("practices").value = pricingData[0].practices;
    document.getElementById("support").value = pricingData[0].support;
    document.getElementById("certification").value = pricingData[0].certification;
    document.getElementById("hours").value = pricingData[0].hours;
    document.getElementById("additional").value = pricingData[0].additional;
    document.getElementById("additional2").value = pricingData[0].additional2;
  }


</script>

<!-- Javascript to update data (MUST ENABLE MOESIF CORS) -->
<script>
  var frm = $('#pricingForm');

  frm.submit(function (e) {

      e.preventDefault();

      $.ajax({
          type: frm.attr('method'),
          url: frm.attr('action'),
          data: frm.serialize(),
          success: function (data) {
              alert('Submission was successful.');
              window.location.replace("viewPrice.php");
          },
          error: function (data) {
              console.log('An error occurred.');
              console.log(data);
          },
      });
  });

</script>

</html>
