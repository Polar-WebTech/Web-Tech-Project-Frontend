
<?php
  require './config/url.php';
?>

<html lang="en">

<head>


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

      $("#item").append(content);


    }



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




  }
}),

)
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



        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>


            </ul>

          </div>
        </div>

        <div id="item" class="row portfolio-container" style="display: block;">



        </div>






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