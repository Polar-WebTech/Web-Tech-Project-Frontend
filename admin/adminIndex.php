
<?php
  require './config/url.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'head.php'?>

  <title id="websitetitle"><?php //echo $rowProfile['Website_name'] ?></title>

</head>


<script>

  // $(document).ready(function(){
  //     checkCookie();
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
        alert('Welcome ' + sessionInfo[0].userid);

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

<script>

  $(document).ready(function()
  {
    checkCookie();
    $.when(
      $.ajax({
  type:"GET",
  url:"<?php echo $ToProfile?>",
  success: function(result,status,xhr)
  {
    profilelist=JSON.parse(result);
    document.getElementById("websitetitle").innerHTML=profilelist[0].name;
    document.getElementById("slogan").innerHTML="<h1>"+profilelist[0].slogan+"</h1>";
    // $('#slogan').append();
    $('#about_us').append("<p>"+profilelist[0].about_us+"</p>");
    // document.getElementById("about_us").innerHTML="<p>"+profilelist[0].about_us+"</p>";
    $('#serviceTitle').append("<h4>We - <b>"+profilelist[0].name+"</b> offer services as below.</h4>");
    $('#activeuser').append("<span data-purecounter-start='0' data-purecounter-end="+profilelist[0].active_users+" data-purecounter-duration='1' class='purecounter'>"+profilelist[0].active_users+"</span><p>Active users</p>");
    $('#ei').append("<span data-purecounter-start='0' data-purecounter-end="+profilelist[0].experience_instructors+" data-purecounter-duration='1' class='purecounter'>"+profilelist[0].experience_instructors+"</span><p>Active users</p>");
    $('#totalhours').append("<span data-purecounter-start='0' data-purecounter-end="+profilelist[0].total_hours+" data-purecounter-duration='1' class='purecounter'>"+profilelist[0].total_hours+"</span><p>Active users</p>");
    $('#noofcourses').append("<span data-purecounter-start='0' data-purecounter-end="+profilelist[0].no_courses+" data-purecounter-duration='1' class='purecounter'>"+profilelist[0].no_courses+"</span><p>Active users</p>");
  }

}),


$.ajax({
  type:"GET",
  url:"<?php echo $ToService?>",
  success: function(result,status,xhr)
  {
    servicelist=JSON.parse(result);
    for (var i=0;i<servicelist.length;i++){
      var content="";
      content+=("<div class='col-lg-4 col-md-6 d-flex align-items-stretch'>");
      content+=("<div class='icon-box'>");
      content+=("<div class='icon'><i class='bx "+servicelist[i].boxicon_description+"'></i></div>");

      content+=("<h4>"+servicelist[i].servicename+"</h4>");
      content+=("<p>"+servicelist[i].description+"</p>");
      content+=("</div>");
      $("#servicerow").append(content);
  }
  }
}),

)
  })

</script>

<body>

<?php include 'headerWithNavigation.php' ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8" id="slogan">
          <!-- <h1><?php //echo $rowProfile['Slogan']?></h1> -->

        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <br>
    <br>
  <div class="container">
  <div class="section-title">
        <h2><a href="<?php echo $ToEditProfilePHP?>">[Edit Website Profile]</a></h2>

        </div>

  </div>
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" id="about_us">
          <h2>About Us</h2>
          <!-- <p><?php // echo $rowProfile['About_us'];?></p> -->
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" id="serviceTitle">
        <h2>Services &nbsp;&nbsp;&nbsp;<a href="<?php echo $ToViewServicePHP?>">[Edit]</a></h2>
          <!-- <h4>We - <b></b> offer services as below.</h4> -->
        </div>

        <div class="row" id="servicerow">
        <?php
                // $sql="select * from tbl_service";
                // mysqli_select_db($conn, $database);
                // $result = mysqli_query($conn, $sql);
                // while($row = mysqli_fetch_assoc($result)) {
            ?>
        <!--  <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

            <div class="icon-box">
              <div class="icon"><i class="bx <?php //echo $row['Boxicon_description']; ?>"></i></div>
              <h4><?php //echo $row['ServiceName'];?></h4>
              <p><?php //echo $row['Description'];?></p>
            </div>

          </div>
          <?php //} ?> -->

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- list section -->
    <section id="mission" class="features">

      <div class="container">
      <div class="section-title">
          <h2>Our Mission - To Let You Learn &nbsp;&nbsp;&nbsp;<a href="<?php $ToViewMissionPHP?>">[Edit]</a></h2>

        </div>
        <div class="row">
          <table style="width:100%">
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="icon-box mt-5 mt-lg-0">

              <?php
              //  $no=1;
              // $sql ="select * from tbl_list";
              // mysqli_select_db($conn,$database);
              // $result=mysqli_query($conn,$sql);
              // while ($row=mysqli_fetch_assoc($result)){
              ?>
              <tr>
              <th ><i class="bx bx-receipt"></i></th>
              <th><h4>
                <?php //echo $no; ?>

              </h4></th>
              <th style="width:20%"><p><?php //echo $row['tbl_list_Goal'];?></p></th>
              <th style="width:70%"><p><?php //echo $row['tbl_list_Description'];?></p></th>
              </tr>
              <?php //$no++;
              // } ?>
              </div>
            </div>
            </table>
          </div>
        </div>
    </section>

    <!-- ======= Company Section ======= -->
    <section id="company" class="portfolio">
      <div class="container">

        <div class="section-title">
        <h2>Cooperated Companies &nbsp;&nbsp;&nbsp;<a href="<?php echo $ToViewCompanyPHP?>">[Edit]</a></h2>


        </div>


        <div  style="display: flex;flex-wrap:wrap ">
        <?php

        //  $sqlx ="SELECT * FROM tbl_company ";
        //  mysqli_select_db($conn,$database);
        //  $resultx=mysqli_query($conn,$sqlx);
        // while ($rowx=mysqli_fetch_assoc($resultx)){ ?>


          <div class="col-lg-4 col-md-6 portfolio-item">
          <a href ="<?php //echo $rowx['tbl_company_Link'];?>"><img src = "data:image;base64,<?php //echo $rowx['tbl_company_Picture'];?>" style="width:max-content"class="img-fluid" alt="" ></a>

          </div>

          <?php //}  ?>

        </div>

      </div>

    </section><!-- End Company Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="text-center title">
          <h3>What we have achieved so far</h3>

        </div>

        <div class="row counters position-relative">

          <div class="col-lg-3 col-6 text-center" id="activeuser">
            <!-- <span data-purecounter-start="0" data-purecounter-end=<?php //echo $rowProfile['Active_users'] ?> data-purecounter-duration="1" class="purecounter"></span><p>Active users</p> -->
          </div>

          <div class="col-lg-3 col-6 text-center" id="ei">
            <!-- <span data-purecounter-start="0" data-purecounter-end=<?php //echo $rowProfile['Experience_instructors'] ?> data-purecounter-duration="1" class="purecounter"></span><p>Experience instructors</p> -->
          </div>

          <div class="col-lg-3 col-6 text-center" id="totalhours">
            <!-- <span data-purecounter-start="0" data-purecounter-end=<?php //echo $rowProfile['Total_hours'] ?> data-purecounter-duration="1" class="purecounter"></span><p>Total hours of teaching video</p> -->
          </div>

          <div class="col-lg-3 col-6 text-center" id="noofcourses">
            <!-- <span data-purecounter-start="0" data-purecounter-end=<?php // echo $rowProfile['Number_courses'] ?> data-purecounter-duration="1" class="purecounter"></span><p>Number of courses</p> -->
          </div>
        </div>

      </div>
    </section>
    <!-- End Counts Section -->


    <!-- ======= Most popular courses Section ======= -->
    <section id="course" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Most Popular Courses&nbsp;&nbsp;&nbsp;<a href="<?php echo $ToViewTopCoursePHP?>">[Edit]</a></h2>
          <p>Explore most popular courses to enhance your programming skills.</p>
          <br>

        </div>


      <?php include 'viewCourse.php'?>

        </div>

      </div>

    </section>



  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
        <h2>Pricing &nbsp;&nbsp;&nbsp;<a href="<?php echo $ToViewPricePHP?>">[Edit]</a></h2>


        </div>

        <div class="row">
          <?php
          // $sql= "select * from tbl_price order by price";
          // mysqli_select_db($conn,$database);
          // $result=mysqli_query($conn,$sql);


          // while($row=mysqli_fetch_assoc($result)){
          ?>


          <!--<div class="col-lg-4 col-md-6">
            <div class="box">
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
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>



              </div>
            </div>
          </div>-->
        <?php // } ?>


        </div>

      </div>
    </section>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact&nbsp;&nbsp;&nbsp;<b><a href="<?php echo $ToEditContactPHP?>">[Edit]</a></b></h2>
          <p>If you have any problems, please feel to free to contact us via the approaches provided at below.</p>
        </div>
      </div>


      <div id ="map" style = "height: 350px; width: 100%;"></div>



      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="ri-map-pin-line"></i>
                <h4 >Location:</h4>
                <p id="location"> </p>
              </div>

              <div class="email">
                <i class="ri-mail-line"></i>
                <h4 >Email:</h4>
                <p id="webemail"></p>
              </div>

              <div class="phone">
                <i class="ri-phone-line"></i>
                <h4 >Call:</h4>
                <p id="call"></p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" id="message" required></textarea>
              </div>

              <div class="text-center"><button type="submit" onclick="return sendMail();">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
      <script>
      var contact;
          function sendMail()
  { if (confirm("Is it ok to launch mail application?")==true)
    {
      var emailTo=document.getElementById("email").value;
    var emailCC=contact[0].email;
    var emailSub=document.getElementById("subject").value;
    var emailBody=document.getElementById("message").innerHTML;
    window.open(`mailto:${emailTo}?cc=${emailCC}&subject=${emailSub}&body=${emailBody}`, '_self');

    };

  }
         $.ajax({
          type:"GET",



          url:"<?php echo $ToContact?>",
          success:function(result,status,xhr)
          {


           contact=JSON.parse(result);

      var Location;


        Location=[parseFloat(contact[0].latitude),parseFloat(contact[0].longitude)];


      var map = L.map('map').setView(Location, 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);
map.attributionControl.setPrefix(false);
var marker = new L.marker(Location, {
    draggable: 'false',

  }).addTo(map);
  marker.bindPopup("We are here").openPopup();

        document.getElementById("location").innerHTML=contact[0].location;
        document.getElementById("webemail").innerHTML=contact[0].email;
        document.getElementById("call").innerHTML=contact[0].phone;
          }
        })

      </script>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
<?php  include 'footer.php';?>
  </footer><!-- End Footer -->

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
    // var br1 = document.createElement("br");
    // var br2 = document.createElement("br");
    // btnWrapDiv.appendChild(br1);
    // btnWrapDiv.appendChild(br2);


    // create second <a> node in the btn-wrap div, add href, and append to btnWrapDiv
    // var a2 = document.createElement("a");
    // a2.setAttribute("href","updateprice.php?id="+pricingArray[i].type);
    // a2.innerHTML = "Update Price";
    // btnWrapDiv.appendChild(a2);

    // add 2 more <br> to btnWrapDiv
    // var br3 = document.createElement("br");
    // var br4 = document.createElement("br");
    // btnWrapDiv.appendChild(br3);
    // btnWrapDiv.appendChild(br4);


    // create third <a> node in the btn-wrap div, add href, and append to btnWrapDiv
    // var a3 = document.createElement("button");
    // a3.setAttribute("href","deleteprice.php?id="+pricingArray[i].type);
    // a3.setAttribute("href","#");
    // a3.setAttribute("onclick","return confirm ('Are you sure to delete this price package?')");
    // a3.setAttribute("style","background-color:transparent; border: 0px; color:#009961");
    // a3.setAttribute("onclick","return deletePricing('" + pricingArray[i].type + "', '" + pricingArray[i].price + "', '" + pricingArray[i].basic_courses + "', '" + pricingArray[i].members_content + "', '" + pricingArray[i].practices + "', '" + pricingArray[i].support + "', '" + pricingArray[i].certification + "', '" + pricingArray[i].hours + "', '" + pricingArray[i].additional + "', '" + pricingArray[i].additional2 +"');");
    // a3.setAttribute("onclick","return deletePricing('" + pricingArray[i].type +"');");
    // a3.innerHTML = "Delete";
    // btnWrapDiv.appendChild(a3);


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

</body>

</html>