<?php
  require './config/url.php';
?>

<!DOCTYPE html>
<html lang="en">



<head>
<style>

input[type="submit"].inp{
  background-color:greenyellow;
  color:blue;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;


}
input[type="submit"].inp:hover{

  font-size: x-large;

}

#tableList th,#tableList td
{
  padding: 10px;
}
</style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Mission</title>
  <meta content="" name="tbl_list_Description">
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
  <?php include 'head.php'?>
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


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages ">
  <?php include 'headerWithNavigation.php' ?> 
  </header><!-- End Header -->



  <main id="main">

  <section id="features" class="features">
      <div class="container">
      <div class="section-title">
          <h2>Update Mission Description</h2>

        </div>
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="icon-box mt-5 mt-lg-0">
<?php

// if (isset($_POST['desc'])){
//  //echo " you have try to save ";
//         $u=$_GET['tbl_list_Goal'];  //error  type="text" disabled
//         $n=$_POST['desc'];
//         $sql ="UPDATE `tbl_list` SET `tbl_list_Description`='".$n."'
//         WHERE (`tbl_list_Goal`='".$u."') LIMIT 1";  // sql command
// //echo $sql;
//         mysqli_select_db($conn,$database); ///select database as default
//         $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
//        // mysqli_fetch_assoc($result);
//        goto2("viewlist.php","The mission is successfully updated");
// } else {
//     $u=$_GET['tbl_list_Goal'];
//     $sql ="select * from tbl_list where tbl_list_Goal='".$u."'";  // sql command
//     mysqli_select_db($conn,"wpproject"); ///select database as default
//     $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql

//     $row=mysqli_fetch_assoc($result);
//echo $u;
?>
<form method="PUT" id="missionForm">
 <table style="width:100%" id="tableList">
 <tr>
  <th><label for="Goal">Mission</label></th>
  <th>:</th>
  <th><input type="text" disabled id="goal" name="goal" size="50" value="<?php //echo $u; ?>  "></th>
 </tr>
 <tr>
  <th><label for="desc"> Description</label></th>
  <th>:</th>
  <th><textarea id="description" rows="5px" cols="70px" name="description" required><?php //echo $row['tbl_list_Description'];?></textarea></th>
 </tr>
 <tr>
  <td></td>
  <td></td>
  <td><input class="inp" type="submit" value="Save"></td>
 </tr>
</table>
<br>

</form>

<form action="viewlist.php" method="POST">
  <input type="submit" value="Return to previous page" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">
</form>

<?php //} ?>

</div>
</div>

    </div>

      </div>
    </section><!-- End Features Section -->


  </main><!-- End #main -->



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

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const goal = urlParams.get('goal');

  document.getElementById("missionForm").setAttribute("action","<?php echo $ToMission?>"+"/"+goal);

  var xml = new XMLHttpRequest();
  xml.open('get','<?php echo $ToMission?>' +"/" + goal);

  xml.send();

  xml.onload = function(){

    var pricingData = JSON.parse(xml.responseText);

    document.getElementById("goal").value = pricingData[0].goal;
    document.getElementById("description").value = pricingData[0].description;
  }


</script>

<!-- Javascript to update data (MUST ENABLE MOESIF CORS) -->
<script>
  var frm = $('#missionForm');

  frm.submit(function (e) {

      e.preventDefault();

      $.ajax({
          type: frm.attr('method'),
          url: frm.attr('action'),
          data: frm.serialize(),
          success: function (data) {
              alert('Submission was successful.');
              window.location.replace("viewlist.php");
          },
          error: function (data) {
              console.log('An error occurred.');
              console.log(data);
          },
      });
  });

</script>
</html>