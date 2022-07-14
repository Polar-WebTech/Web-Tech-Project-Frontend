<?php
  require './config/url.php';
?>


<html lang="en">

<head>
<?php include 'head.php'?>
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

<?php include 'headerWithNavigation.php' ?>

  <main id="main">

  <!-- ======= Header ======= 
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container-fluid">

      <div class="row justify-content-center" style="padding-top:20px;padding-bottom:20px">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between" >
          <h1 class="logo me-auto me-lg-0"><a href="adminIndex.php"><?php //echo $rowProfile['Website_name'] ?></a></h1>

        </div>
      </div>

    </div>
  </header> End Header -->


    <!-- ======= Pricing Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
      <div class="section-title">
          <h2>Insert New Package</h2>

        </div>

<?php

// if (isset($_POST['Type'])){

//         mysqli_select_db($conn,$database);
//         $pricetype=$_POST['Type'];

//         $price=$_POST['price'];
//         $basic_c=$_POST['basic_courses'];
//         $memberC=$_POST['members_content'];
//         $practices=$_POST['practices'];
//         $support=$_POST['support'];
//         $certification=$_POST['certification'];
//         $hours=$_POST['hours'];
//         $additional=$_POST['additional'];
//         $additional2=$_POST['additional2'];




//         $sql ="INSERT INTO `tbl_price` (`Type`, `price`,`basic_courses`, `members_content`,
//         `practices`,`support`,`certification`,`hours`,`additional`,`additional2`)
//         VALUES ('".$pricetype."', '".$price."', '".$basic_c."','".$memberC."','".$practices."','".$support."','".$certification."'
//         ,'".$hours."','".$additional."','".$additional2."')";

//         $result=mysqli_query($conn,$sql);

//         goto2("viewPrice.php","Price package is successfully Created");


// } else {





?>
<form action="https://itsensei.herokuapp.com/api/pricing" method="POST" id="pricingForm">
    <table class="table_price">


        <tr>
  <th width="300px"><label for="Type">Price Type</label></th>
  <th>:</th>
  <td><input type="text"  id="type" name="type" required placeholder="Package name..."></td>
</tr>
  <tr>
  <th><label for="Price"> Price</label></th>
  <th>:</th>
  <td><input type="text" id="price" name="price" rows="6" cols="50" required></td>
  </tr>
  <tr>
  <th><label for="basic_courses"> basic courses</label></th>
  <th>:</th>
  <td><input type="text" id="basic_courses" name="basic_courses"  size="100" required></td>
  </tr>
  <tr>
  <th><label for="members_content"> members content</label></th>
  <th>:</th>
  <td><input type="text" id="members_content" name="members_content" rows="6" cols="50" size="100" required></td>
  </tr>
  <tr>
  <th><label for="practices">practices</label></th>
  <th>:</th>
  <td><input type="text" id="practices" name="practices" rows="6" cols="50" size="100" required></td>
  </tr>
  <tr>
  <th><label for="support"> Support</label></th>
  <th>:</th>
  <td><input type="text" id="support" name="support" rows="6" cols="50" size="100" required></td>
  </tr>
  <tr>
  <th><label for="certification"> Certification</label></th>
  <th>:</th>
  <td><input type="text" id="certification" name="certification" rows="6" cols="50" size="100" required></td>
  </tr>
  <tr>
  <th><label for="hours"> hours</label></th>
  <th>:</th>
  <td><input type="text" id="hours" name="hours" rows="6" cols="50" size="100" required></td>
  </tr>
  <tr>
  <th><label for="additional"> additional 1</label></th>
  <th>:</th>
  <td><input type="text" id="additional" name="additional" rows="6" cols="50" size="100" ></td>
  </tr>
  <tr>
  <th><label for="additional2"> additional 2</label></th>
  <th>:</th>
  <td><input type="text" id="additional2" name="additional2" rows="6" cols="50" size="100" ></td>
  </tr>


    <tr>
        <td></td>
        <td></td>
        <td>
            <input type="submit" value="Save" id="submitBtn">
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
