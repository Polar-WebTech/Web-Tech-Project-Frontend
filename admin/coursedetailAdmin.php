
<?php
  require './config/url.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php include 'head.php'?>
</head>
<script>
   getParameter = (key) => {

// Address of the current window
address = window.location.search

// Returns a URLSearchParams object instance
parameterList = new URLSearchParams(address)

// Returning the respected value associated
// with the provided key
return parameterList.get(key)
}
var id=getParameter('id');
window.addEventListener("load",function()
    {

      $("#portfolio-details").hide();

    })
    $.when(
      $.ajax({
    type:"GET",
      url:"<?php echo $ToCourse?>/"+id,
      success: function(result,status,xhr)
      {

        var course=JSON.parse(result);
        var img=document.createElement("img");
        img.src="data:image;base64,"+course.image;
        img.setAttribute("style","width:max-content;max-width: 100%;max-height:100%;");
        img.setAttribute("class","img-fluid");
        img.setAttribute("alt","");
        var imgContainer=document.getElementsByClassName("s")[0];
        imgContainer.appendChild(img);







        $.ajax({
    type:"GET",
      url:"<?php echo $ToCategory?>/"+course.categoryid,
      success: function(resultx,status,xhr)
      {

        var category=JSON.parse(resultx);

        var ul=document.getElementsByTagName("ul")[1];
        var content="";
        content+=(' <li><strong>Course ID</strong>: '+course.courseid+'</li>');
        content+=(' <li><strong>Course Title</strong>: '+course.title+'</li>')
        content+=('<li><strong>Programming Languages Used</strong>: '+course.language+'</li>');
        content+=('<li><strong>Course Duration</strong>: '+course.duration+' Hours</li>');
        content+=(' <li><strong>Course Category</strong>: '+category[0].description+'</li>');
        ul.innerHTML=content;

        var description=document.getElementById("description");
        description.innerHTML=course.description;

      }
  });
      }
  })
    )
 .done(function(){
    $("#portfolio-details").show();
    $("#loader").hide();
  })




</script>
<body>

  <?php include 'headerWithNavigation.php' ?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo $ToViewTopCoursePHP?>">Home</a></li>
          <li>Course Details</li>
        </ol>
        <h2>Course Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->
    <div id="loader"></div>
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper-container">
              <div class="swiper-wrapper align-items-center">

                <div class="s" style="display: flex; justify-content:center;">

              </div>


              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Course information</h3>
              <ul>

              </ul>
            </div>
            <div class="portfolio-description">
              <h2>This is the detail of the course</h2>
              <p id="description">

            </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->


<?php  include 'footer.php';
?>
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

</html>