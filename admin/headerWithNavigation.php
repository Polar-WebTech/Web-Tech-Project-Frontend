
<?php
  require './config/url.php';

?>
<?php include 'head.php'?>
  <script>
    $(document).ready(
      function()
      {
        var xhr=new XMLHttpRequest();
        xhr.open("get","<?php echo $ToProfile?>");
        xhr.send();
        xhr.onload=function()
        {


            var profile=JSON.parse(xhr.responseText);
            var name=document.getElementById("name");

            name.setAttribute("href",'<?php echo $ToAdminIndexPHP?>');
            name.innerText=profile[0].name;
            var list=document.getElementsByTagName("ul")[0];
            var content="";
            content+=(' <li><a class="nav-link scrollto " href="'+'<?php echo $ToAdminIndexPHP?>'+'">Home</a></li>');
            content+=(' <li><a class="nav-link scrollto" href="'+'<?php echo $ToAdminIndexPHP?>'+'#services" >Services</a></li>');
            content+=('<li><a class="nav-link scrollto " href="'+'<?php echo $ToAdminIndexPHP?>'+'#mission">Our Mission</a></li>');
            content+=('<li><a class="nav-link scrollto " href="'+'<?php echo $ToAdminIndexPHP?>'+'#company">Cooperated Companies</a></li>');
            content+=(' <li><a class="nav-link scrollto " href="'+'<?php echo $ToAdminIndexPHP?>'+'#course">Most Popular Courses</a></li>');
            content+=('<li><a class="nav-link scrollto" href="'+'<?php echo $ToAdminIndexPHP?>'+'#pricing">Pricing</a></li>');
            content+=(' <li><a class="nav-link scrollto" href="'+'<?php echo $ToAdminIndexPHP?>'+'#contact">Contact</a></li>');

            list.innerHTML=content;

            var navbar=document.getElementById("containernav");
            var linkx=document.createElement("a");
            linkx.setAttribute("href","../logout.php" );
            linkx.classList.add("get-started-btn");
            linkx.classList.add("scrollto");
            var linktext=document.createTextNode("Log Out");
            linkx.appendChild(linktext);
            navbar.appendChild(linkx);
        }
      }
    )




  </script>

 <!-- ======= Header ======= -->

 <header id="header" class="fixed-top header-inner-pages">


<div class="container-fluid">

<div class="row justify-content-center">
<div class="col-xl-9 d-flex align-items-center justify-content-lg-between" id="containernav">
<h1 class="logo me-auto me-lg-0"><a href="" id="name" ></a></h1>
<!-- Uncomment below if you prefer to use an image logo -->
<!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

<nav id="navbar" class="navbar order-last order-lg-0">
  <ul>








  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->

</div>
</div>

</div>


</header><!-- End Header -->