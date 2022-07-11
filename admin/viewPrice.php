<?php
include("../config/setting.php");
include("../config/db.php");
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
  <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Pricing</h2>

          <h3><a href="adminIndex.php" id="back"><u>Back</u></a><br></h3>
        </div>

        <div class="row">
          <?php
          // $sql= "select * from tbl_price order by price";
          // mysqli_select_db($conn,$database);
          // $result=mysqli_query($conn,$sql);


          // while($row=mysqli_fetch_assoc($result)){
          ?>


          <!-- <div class="col-lg-4 col-md-6">                                          //This is firstDiv
            <div class="box">                                                           // This is boxDiv
              <h3><?php //echo $row['Type']?></h3>

              <h4><sup>$</sup><?php //echo $row['price']?><span> / month</span></h4>
              <ul>
                <li><?php //echo $row['basic_courses']?></li>
                <li><?php //echo $row['members_content']?></li>
                <li><?php //echo $row['practices']?></li>
                <li ><?php //echo $row['support']?></li>
                <li ><?php //echo $row['certification']?></li>
                <li ><?php //echo $row['hours']?></li>
                <li ><?php //echo $row['additional']?></li>
                <li ><?php //echo $row['additional2']?></li>
              </ul>
              <div class="btn-wrap">                                                    // This is btnWrapDiv
                <a href="#" class="btn-buy">Buy Now</a>
                <br>
                <br>

                <a href="updateprice.php?id=<?php //echo $row['Type'];?> ">Update Price</a>

                <br>
                <br>
                <p><a href="deleteprice.php?id=<?php //echo $row['Type'] ;?>" onclick="return confirm ('Are you sure to delete this price package?')">Delete</a></p>


              </div>
            </div>
          </div> -->
        <?php //} ?>
        
        <div class="pricing" style="background-color:transparent; padding:0;">
            <button class="box" style="margin-top:30px; background-color:transparent; border:none; padding:0;"><a class="btn-buy" href="InsertPrice.php">Insert New Package</a></button>
        </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->


    </body>


    <!-- Javascript to read pricing data -->
    <script>

      var xhr = new XMLHttpRequest();
      xhr.open('get','https://itsensei.herokuapp.com/api/pricing');
      xhr.send();

      xhr.onload = function(){

        var pricingArray = JSON.parse(xhr.responseText);
        var rowDiv = document.querySelector("#pricing .container .row");
          

        for(var i=0; i<pricingArray.length; i++){

          // create first div element after the row div
          var firstDiv = document.createElement("div");
          firstDiv.classList.add("col-lg-4");
          firstDiv.classList.add("col-md-6");

          // create the div element with .box class
          var boxDiv = document.createElement("div");
          boxDiv.classList.add("box");


          // create h3 node
          var boxDivh3 = document.createElement("h3");
          boxDivh3.innerHTML = pricingArray[i].type;

          // create h4 node
          var boxDivh4 = document.createElement("h4");
          boxDivh4.innerHTML = "<sup>$</sup>" + pricingArray[i].price + "<span> / month</span>";

          // create ul node
          var boxDivul = document.createElement("ul");

          // create li node for basic_courses and append to ul
          var basicCoursesli = document.createElement("li");
          basicCoursesli.innerHTML = pricingArray[i].basic_courses;
          boxDivul.appendChild(basicCoursesli);

          // create li node for members_content and append to ul
          var membersContentli = document.createElement("li");
          membersContentli.innerHTML = pricingArray[i].members_content;
          boxDivul.appendChild(membersContentli);

          // create li node for practices and append to ul
          var practicesli = document.createElement("li");
          practicesli.innerHTML = pricingArray[i].practices;
          boxDivul.appendChild(practicesli);

          // create li node for support and append to ul
          var supportli = document.createElement("li");
          supportli.innerHTML = pricingArray[i].support;
          boxDivul.appendChild(supportli);

          // create li node for certification and append to ul
          var certificationli = document.createElement("li");
          certificationli.innerHTML = pricingArray[i].certification;
          boxDivul.appendChild(certificationli);

          // create li node for hours and append to ul
          var hoursli = document.createElement("li");
          hoursli.innerHTML = pricingArray[i].hours;
          boxDivul.appendChild(hoursli);

          // create li node for additional and append to ul
          var additionalli = document.createElement("li");
          additionalli.innerHTML = pricingArray[i].additional;
          boxDivul.appendChild(additionalli);

          // create li node for additional2 and append to ul
          var additional2li = document.createElement("li");
          additional2li.innerHTML = pricingArray[i].additional2;
          boxDivul.appendChild(additional2li);


          // create node for div after ul with .btn-wrap class, and set id = btnWrapDiv
          var btnWrapDiv = document.createElement("div");
          btnWrapDiv.classList.add("btn-wrap");


          // create first <a> node with .btn-buy class in the btn-wrap div, and append to btnWrapDiv
          var a1 = document.createElement("a");
          a1.classList.add("btn-buy");
          a1.setAttribute("href","#");
          a1.innerHTML = "Buy Now";
          btnWrapDiv.appendChild(a1);


          // add 2 <br> tags to btnWrapDiv after first <a>
          var br1 = document.createElement("br");
          var br2 = document.createElement("br");
          btnWrapDiv.appendChild(br1);
          btnWrapDiv.appendChild(br2);


          // create second <a> node in the btn-wrap div, add href, and append to btnWrapDiv
          var a2 = document.createElement("a");
          a2.setAttribute("href","updateprice.php?id="+pricingArray[i].type);
          a2.innerHTML = "Update Price";
          btnWrapDiv.appendChild(a2);

          // add 2 more <br> to btnWrapDiv
          var br3 = document.createElement("br");
          var br4 = document.createElement("br");
          btnWrapDiv.appendChild(br3);
          btnWrapDiv.appendChild(br4);


          // create third <a> node in the btn-wrap div, add href, and append to btnWrapDiv
          var a3 = document.createElement("button");
          // a3.setAttribute("href","deleteprice.php?id="+pricingArray[i].type);
          // a3.setAttribute("href","#");
          // a3.setAttribute("onclick","return confirm ('Are you sure to delete this price package?')");
          a3.setAttribute("style","background-color:transparent; border: 0px; color:#009961");
          // a3.setAttribute("onclick","return deletePricing('" + pricingArray[i].type + "', '" + pricingArray[i].price + "', '" + pricingArray[i].basic_courses + "', '" + pricingArray[i].members_content + "', '" + pricingArray[i].practices + "', '" + pricingArray[i].support + "', '" + pricingArray[i].certification + "', '" + pricingArray[i].hours + "', '" + pricingArray[i].additional + "', '" + pricingArray[i].additional2 +"');");
          a3.setAttribute("onclick","return deletePricing('" + pricingArray[i].type +"');");
          a3.innerHTML = "Delete";
          btnWrapDiv.appendChild(a3);


          // append everything to the div with .box class
          boxDiv.appendChild(boxDivh3);
          boxDiv.appendChild(boxDivh4);
          boxDiv.appendChild(boxDivul);
          boxDiv.appendChild(btnWrapDiv);

          // append the div with .box class to the first div after the div with .row class
          firstDiv.appendChild(boxDiv);

          // append the first div to the .row div before the insert pricing button
          rowDiv.insertBefore(firstDiv,rowDiv.childNodes[i]);

        }

      };

    </script>

    <!-- Javascript to delete pricing data (MUST ENABLE MOESIF CORS) -->
    <script>

      function deletePricing(type){
        var dltXML = new XMLHttpRequest();

        dltXML.open("DELETE","https://itsensei.herokuapp.com/api/pricing/" + type);

        dltXML.send();

        dltXML.onload = function(){
            alert("Deleted successfully.");

            window.location.replace("viewPrice.php");
        };
      }
    </script>

    <script>

      // function to delete a pricing
      // function deletePricing(type, price, basic_courses, members_content, practices, support, certification, hours, additional, additional2){

      //   var form = document.createElement("form");
      //   form.setAttribute("action","https://itsensei.herokuapp.com/api/pricing/" + type);
      //   form.setAttribute("method","DELETE");
      //   form.setAttribute("id","hiddenForm");
        
      //   var inputType = document.createElement("input");
      //   inputType.setAttribute("type","hidden");
      //   inputType.setAttribute("name","type");
      //   inputType.setAttribute("value",type);
      //   form.appendChild(inputType);

      //   var inputPrice = document.createElement("input");
      //   inputPrice.setAttribute("type","hidden");
      //   inputPrice.setAttribute("name","price");
      //   inputPrice.setAttribute("value",price);
      //   form.appendChild(inputPrice);

      //   var inputBasicCourses = document.createElement("input");
      //   inputBasicCourses.setAttribute("type","hidden");
      //   inputBasicCourses.setAttribute("name","basic_courses");
      //   inputBasicCourses.setAttribute("value",basic_courses);
      //   form.appendChild(inputBasicCourses);

      //   var inputMembersContent = document.createElement("input");
      //   inputMembersContent.setAttribute("type","hidden");
      //   inputMembersContent.setAttribute("name","members_content");
      //   inputMembersContent.setAttribute("value",members_content);
      //   form.appendChild(inputMembersContent);

      //   var inputPractices = document.createElement("input");
      //   inputPractices.setAttribute("type","hidden");
      //   inputPractices.setAttribute("name","practices");
      //   inputPractices.setAttribute("value",practices);
      //   form.appendChild(inputPractices);

      //   var inputSupport = document.createElement("input");
      //   inputSupport.setAttribute("type","hidden");
      //   inputSupport.setAttribute("name","support");
      //   inputSupport.setAttribute("value",support);
      //   form.appendChild(inputSupport);

      //   var inputCertification = document.createElement("input");
      //   inputCertification.setAttribute("type","hidden");
      //   inputCertification.setAttribute("name","certification");
      //   inputCertification.setAttribute("value",certification);
      //   form.appendChild(inputCertification);

      //   var inputHours = document.createElement("input");
      //   inputHours.setAttribute("type","hidden");
      //   inputHours.setAttribute("name","hours");
      //   inputHours.setAttribute("value",hours);
      //   form.appendChild(inputHours);

      //   var inputAdditional = document.createElement("input");
      //   inputAdditional.setAttribute("type","hidden");
      //   inputAdditional.setAttribute("name","additional");
      //   inputAdditional.setAttribute("value",additional);
      //   form.appendChild(inputAdditional);

      //   var inputAdditional2 = document.createElement("input");
      //   inputAdditional2.setAttribute("type","hidden");
      //   inputAdditional2.setAttribute("name","additional2");
      //   inputAdditional2.setAttribute("value",additional2);
      //   form.appendChild(inputAdditional2);

      //   document.body.appendChild(form);

      //   // var frm = $('#hiddenForm');

      //   // form.submit();
      //   form.submit(function (e) {

      //       e.preventDefault();

      //       $.ajax({
      //           type: 'DELETE',
      //           url: 'https://itsensei.herokuapp.com/api/pricing/' + type,
      //           // data: form.serialize(),
      //           success: function (data) {
      //               alert('Pricing Deleted Successfully.');
      //               window.location.replace("viewPrice.php");
      //           },
      //           error: function (data) {
      //               alert('An error occurred.');
      //               console.log(data);
      //           },
      //       });

      //   });

      // }


    </script>

</html>