
<?php
  require './config/url.php';
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Most Popular Courses</title>
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
  <link href="../assets/css/otherStyle.css" rel="stylesheet">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- =======================================================
  * Template Name: KnightOne - v4.3.0
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .category a
    {
      color: blue;
      background-color:greenyellow;
      padding-top: 5px;
      padding-bottom: 5px;
      padding-left: 15px;
      padding-right: 15px;
      border-radius: 25px;
    }
    .category a:hover
    {


      font-size:x-large;


    }
    </style>
    <script>
      var allcourse;
      var categorylist;
      window.addEventListener("load",function()
    {
      // $("#header").load("header.html");
      // $("ul").hide();
      // $(".row portfolio-container").hide();
      // $("#add").hide();


      document.getElementById("back").href="<?php echo $ToAdminIndexHTML?>";


    })
    function deleteCourse(id)
    {
      if (confirm("Are you sure to delete this course")==true)
      {
        $.ajax({
        type:"delete",
        url:"<?php echo $ToCourse ?>"+"/"+id,
        success: function(data)
        {
          alert ("Delete successfully");
          window.location.replace("<?php echo $ToViewTopCourseHTML ?>");
        },
        error: function(data)
        {
          alert ("Delete failure");

        }
      });
      }
      else
      {

      }

    }
$(document).ready(function(){
  $.when(

$.ajax({

  type:"GET",
  url:"<?php echo $ToCourse?>",
  async:false,
  success: function(result,status,xhr)
  {


//     console.log(result);
 allcourse=JSON.parse(result);
    var filterlist="";
 for (var i=0;i<allcourse.length;i++)
    {
      filterlist+=("filter-"+allcourse[i].categoryid+" ");
      var content="";

      content=content+"<div class='col-lg-4 col-md-6 portfolio-item filter-"+allcourse[i].categoryid+"'>";
      content+=("<a href='../coursedetail.php?id="+allcourse[i].courseid
      +"'>"+'<img src="data:image;base64,'+allcourse[i].image+
      '" style="width:max-content" class="img-fluid" alt=""></a> ');
      content+='<div class="portfolio-info" >';
          content+=('<h4>'+allcourse[i].title+"</h4>");
      content+=(' <p><a href="<?php echo $ToUpdateCourse?>?id='+allcourse[i].courseid+'" style="font-size:medium;color:white;">Update</a></p>');
      content+=('<p><a href="#" class="delete" id="'
        +allcourse[i].courseid+'"'
        +' style="font-size:medium;color:white;">Delete</a></p></div></div>');

      $("#item").append(content);


    }
    var deletelink=document.getElementsByClassName("delete");
    for (var b=0;b<deletelink.length;b++)
    {
      deletelink[b].setAttribute("onclick",'return deleteCourse("'+deletelink[b].id+'")');
    };


    content="";
    content+=('<div id="add" class="col-lg-4 col-md-6 portfolio-item '+filterlist+'" style="display: flex; justify-content:center;">');
    content+=('<a id="linkInsert" href="<?php echo $ToInsertCourseHTML?>"><img src="../assets/img/plus icon.png" style="height: 150px; width: 120px;"class="img-fluid" alt=""></a>');
    content+=('<div class="portfolio-info"><h4>Add course</h4> </div></div>');
    $("#item").append(content);



  }
}),
$.ajax({
  type:"GET",
  url:"<?php echo $ToCategory?>",
  async:false,
  success: function(result,status,xhr)
  {


  categorylist=JSON.parse(result);
   var filter= document.getElementById("portfolio-flters");
  var category=document.getElementById("viewcategory");

  var tempcontent="";
  tempcontent+=("<li data-filter="*" class='filter-active'>All</li>");

  for (var i=0;i<categorylist.length;i++)
  {



    if (i==0)
    {
      $("#portfolio-flters").append("<li data-filter='.filter-"+categorylist[i].id+"' class=''>"+categorylist[i].description+"</li>");

    }
    else
    {
      $("#portfolio-flters").append("<li data-filter='.filter-"+categorylist[i].id+"'>"+categorylist[i].description+"</li>");

    }
  }
  $("#portfolio-flters").append('<div class="category"><a  href="<?php echo $ToViewCourseCategoryHTML?>"  >Edit Course Category</a></div>');





  }
}),

).done(function(){
  $("#loader").hide();






})
})



    </script>
</head>

<body>


  <main id="main">

    <div id="header"></div>



    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Most Popular Courses</h2>
          <p>Explore most popular courses to enhance your programming skills.</p>
          <br>
          <h3><a href=""  id="back"><u>Back</u></a><br></h3>
        </div>

        <div id="loader"></div>
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>








            </ul>

          </div>
        </div>

        <div id="item" class="row portfolio-container" style="display: block;">









        </div>

      </div>

    </section><!-- End Portfolio Section -->


</script>
  </main><!-- End #main -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">xxx<i class="bi bi-arrow-up-short"></i></a>

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

</html>