
<?php
  require './config/url.php';
?>

<html lang="en">

<head>

  <title>View Most Popular Courses</title>
  <?php include 'head.php'?>
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


      document.getElementById("back").href="<?php echo $ToAdminIndexPHP?>";


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
          window.location.replace("<?php echo $ToViewTopCoursePHP ?>");
        },
        error: function(data)
        {
          alert ("Delete failure");

        }
      });
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
      content+=("<a href='coursedetailAdmin.php?id="+allcourse[i].courseid
      +"'>"+'<img src="data:image;base64,'+allcourse[i].image+
      '" style="width:max-content" class="img-fluid" alt=""></a> ');
      content+='<div class="portfolio-info" >';
          content+=('<h4>'+allcourse[i].title+"</h4>");
      content+=(' <p><a href="<?php echo $ToUpdateCoursePHP?>?id='+allcourse[i].courseid+'" style="font-size:medium;color:white;">Update</a></p>');
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
    content+=('<a id="linkInsert" href="<?php echo $ToInsertCoursePHP?>"><img src="../assets/img/plus icon.png" style="height: 150px; width: 120px;"class="img-fluid" alt=""></a>');
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
  $("#portfolio-flters").append('<div class="category"><a  href="<?php echo $ToViewCourseCategoryPHP?>"  >Edit Course Category</a></div>');





  }
}),

).done(function(){
  $("#loader").hide();






})
})



    </script>
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