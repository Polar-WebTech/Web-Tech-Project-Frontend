<?php
  require './config/url.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
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

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages ">
<?php include 'headerWithNavigation.php' ?>
    <!-- <div class="container-fluid">

    <div class="row justify-content-center" style="padding-top:20px;padding-bottom:20px">
    <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
      <h1 class="logo me-auto me-lg-0"><a href="adminIndex.php"><?php echo $rowProfile['Website_name'] ?></a></h1>
    </div>
    </div>

    </div> -->
</header>
<!-- End Header -->

<main id="main">

<section id="services" class="services">
  <div class="container">
    <div class="section-title">
      <h2>View Services</h2>
        <h3><a href="<?php echo $ToAdminIndexPHP?>" id="back"><u>Back</u></a><br></h3>
    </div>
      <div class="row">
<!--<table>
<tr>
  <th>No</th>
  <th>Service Name</th>
  <th>Description</th>
  <th>BoxIcons</th>
  </tr>
<?php
//   $no=1;
//   $sql="select * from tbl_service";
//   mysqli_select_db($conn, $database);
//   $result = mysqli_query($conn, $sql);

// while($row = mysqli_fetch_assoc($result))
// {
?>

   <tr>
    <td><p><?php //echo $no; ?></p></td>
    <td><p><?php //echo $row['ServiceName'];?></p></td>
    <td><p><?php //echo $row['Description'];?></p></td>
    <td>
    <div class="icon"><i class="bx <?php //echo $row['Boxicon_description'] ?>" style="font-size:xxx-large"></i></div>
    </td>
    <td><p><a href="updateService.php?ServiceName=<?php //echo  $row['ServiceName'] ; ?>">Update Service </a></td>

<td><a href="deleteService.php?ServiceName=<?php //echo  $row['ServiceName'] ; ?>" onclick="return confirm ('Are you sure to delete this service?')">Delete Service </a></p></td>
  </tr>

<?php //$no++;
//}?>

<tr>

<tr>

</table>-->
</div>


<a href="<?php echo $ToInsertServicePHP?>">
          <button type="button" class="btn btn-outline-primary rounded-pill">Insert Service</button></a>

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

<!-- Javascript to read service data -->
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
          heading_2.innerHTML = "Service Name";
          let heading_3 = document.createElement('th');
          heading_3.innerHTML = "Description";
          let heading_4 = document.createElement('th');
          heading_4.innerHTML = "	BoxIcons";

          row_1.appendChild(heading_1);
          row_1.appendChild(heading_2);
          row_1.appendChild(heading_3);
          row_1.appendChild(heading_4);
          thead.appendChild(row_1);

      var xhr = new XMLHttpRequest();
      xhr.open('get','<?php echo $ToService ?>');
      xhr.send();

      xhr.onload = function(){

        var serviceArray = JSON.parse(xhr.responseText);
        var rowDiv = document.querySelector("#services .container .row");


        for(var i=0; i<serviceArray.length; i++){

          let row = document.createElement('tr');
          let row_data_1 = document.createElement('td');
          row_data_1.innerHTML = i+1;
          let row_data_2 = document.createElement('td');
          row_data_2.innerHTML = serviceArray[i].servicename;
          let row_data_3 = document.createElement('td');
          row_data_3.innerHTML = serviceArray[i].description;
          let row_data_4 = document.createElement('td');
          row_data_4.innerHTML = " <div class='icon'><i class='bx "+serviceArray[i].boxicon_description+"' style='font-size:xxx-large'></i></div>";
          let row_data_5 = document.createElement('td');
          row_data_5.innerHTML = "<p><a href='<?php echo $ToUpdateServicePHP?>?servicename="+serviceArray[i].servicename+"'>Update Service </a></p>";
          let row_data_6 = document.createElement('td');
          let p = document.createElement('p');
          var ad = document.createElement("button");
          ad.setAttribute("onclick","return deleteService('" + serviceArray[i].servicename +"');");
          ad.setAttribute("style","background-color:transparent; border: 0px; color:#009961");
          ad.innerHTML = "Delete Service";
          p.appendChild(ad);
          row_data_6.appendChild(p);
          row.appendChild(row_data_1);
          row.appendChild(row_data_2);
          row.appendChild(row_data_3);
          row.appendChild(row_data_4);
          row.appendChild(row_data_5);
          row.appendChild(row_data_6);
          tbody.appendChild(row);


        }
        document.getElementsByClassName('row')[1].appendChild(table);
      }

</script>
<script>

      function deleteService(servicename){
        if (confirm("Are you sure to delete this service?")==true)
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