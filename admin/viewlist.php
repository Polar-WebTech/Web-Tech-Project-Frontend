<?php
  require './config/url.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>
  .insert{
   border-style:solid;
   border-width:2px;
   color:green;
  }
   th,td
  {
    padding:10px;
  }
  th
  {
    font-size: large;
  }

  </style>
  <?php include 'head.php'?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View List of Missions</title>
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
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages ">
    <!-- <div class="container-fluid">

      <div class="row justify-content-center" style="padding-top:20px;padding-bottom:20px">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="adminIndex.php"><?php echo $rowProfile['Website_name'] ?></a></h1>
        </div>
      </div> -->
      <?php include 'headerWithNavigation.php' ?>
    </div>
  </header><!-- End Header -->



  <main id="main">

    <!-- ======= Features Section ======= -->
    <?php
    // $no=1;
    // $sql ="select * from tbl_list";  // sql command
    // mysqli_select_db($conn,$database); ///select database as default
    // $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
  ?>

    <section id="features" class="features">

      <div class="container">
      <div class="section-title">
          <h2>Our mission - to let you learn:</h2>
          <h3><a href="adminIndex.php" id="back"><u>Back</u></a><br></h3>
        </div>
        <div class="row">
          <!-- <table style="width:100%">
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="icon-box mt-5 mt-lg-0">

              <?php
              //while ($row=mysqli_fetch_assoc($result)){
              ?>
              <tr>
              <th ><i class="bx bx-receipt"></i></th>
              <th><h4><?php //echo $no; ?></h4></th>
              <th style="width:20%"><p><?php //echo $row['tbl_list_Goal'];?></p></th>
              <th style="width:70%"><p><?php //echo $row['tbl_list_Description'];?></p></th>
              </tr>
              <tr>
              <th> </th>
              <th></th>
              <th style="width:20%"><a href="deletelist.php?tbl_list_Goal=<?php //echo  $row['tbl_list_Goal'] ; ?>" onclick="return confirm ('Are you sure to delete this mission?')">Delete Mission </a></p></th>
              <th style="width:70%"><p><a href="updatelist.php?tbl_list_Goal=<?php //echo  $row['tbl_list_Goal'] ; ?>">Update Description </a></th>
              </tr>
              <?php //$no++;
              //} ?>

            </div>
            </table>  -->
          </div>
          <br>

    <a href="<?php echo $ToInsertMissionPHP?>">
    <button type="button" class="editbtn" style="border-radius:25px;background-color:lightgrey;color:green;padding:10px;">Insert New Mission</button> </a>
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
    let table = document.createElement('table');
    let thead = document.createElement('thead');
    let tbody = document.createElement('tbody');
    table.appendChild(thead);
    table.appendChild(tbody);

    let row_1 = document.createElement('tr');
    let heading_1 = document.createElement('th');
    heading_1.innerHTML = "No";
    let heading_2 = document.createElement('th');
    heading_2.innerHTML = "Mission";
    let heading_3 = document.createElement('th');
    heading_3.innerHTML = "Description";

    row_1.appendChild(heading_1);
    row_1.appendChild(heading_2);
    row_1.appendChild(heading_3);
    thead.appendChild(row_1);

    var xhr = new XMLHttpRequest();
    xhr.open('get','<?php echo $ToMission?>');
    xhr.send();

      xhr.onload = function(){

        var serviceArray = JSON.parse(xhr.responseText);
        // var rowDiv = document.querySelector("#services .container .row");


        for(var i=0; i<serviceArray.length; i++){

          let row = document.createElement('tr');
          let row_data_1 = document.createElement('td');
          row_data_1.innerHTML = i+1;
          let row_data_2 = document.createElement('td');
          row_data_2.innerHTML = serviceArray[i].goal;
          let row_data_3 = document.createElement('td');
          row_data_3.innerHTML = serviceArray[i].description;

          let row_data_4 = document.createElement('td');

          row_data_4.innerHTML = "<a href='updatelist.php?goal="+serviceArray[i].goal+"'>Update Mission </a>";

          let row_data_5 = document.createElement('td');
          let p = document.createElement('p');
          var ad = document.createElement("button");
          ad.setAttribute("onclick","return deleteMission('" + serviceArray[i].goal +"');");
          ad.setAttribute("style","background-color:transparent; border: 0px; color:#009961");
          ad.innerHTML = "Delete Mission";
          p.appendChild(ad);
          p.setAttribute("style","margin-top: 20px");
          row_data_5.appendChild(p);

          row.appendChild(row_data_1);
          row.appendChild(row_data_2);
          row.appendChild(row_data_3);
          row.appendChild(row_data_4);
          row.appendChild(row_data_5);
          tbody.appendChild(row);
        }
        document.getElementsByClassName('row')[1].appendChild(table);
      }

</script>
<script>

      function deleteMission(goal){
        if (confirm("Are you sure to delete this service?")==true)
      {
        $.ajax({
        type:"delete",
        url:"<?php echo $ToMission?>" +"/" + goal,
        success: function(data)
        {
          alert ("Delete successfully");
          window.location.replace("viewlist.php");
        },
        error: function(data)
        {
          alert ("Delete failure");

        }
      });
      }
        // var dltXML = new XMLHttpRequest();

        // dltXML.open("DELETE",""+"/" + servicename);

        // dltXML.send();

        // dltXML.onload = function(){
        //     alert("Deleted successfully.");

        //     window.location.replace("viewService.php");
        // };
      }
</script>
<script>

function deleteService(goal){
  if (confirm("Are you sure to delete this mission?")==true)
{
  $.ajax({
  type:"delete",
  url:"<?php echo $ToService ?>"+"/"+servicename,
  success: function(data)
  {
    alert ("Delete successfully");
    window.location.replace("<?php echo $ToViewServicePHP ?>");
  },
  error: function(data)
  {
    alert ("Delete failure");

  }
});
}
  // var dltXML = new XMLHttpRequest();

  // dltXML.open("DELETE",""+"/" + servicename);

  // dltXML.send();

  // dltXML.onload = function(){
  //     alert("Deleted successfully.");

  //     window.location.replace("viewService.php");
  // };
}
</script>

</html>