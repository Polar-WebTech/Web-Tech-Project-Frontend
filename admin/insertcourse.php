
<?php
  require './config/url.php';
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Insert Course</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
  <!-- =======================================================
  * Template Name: KnightOne - v4.3.0
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


  <style>
    .table_course tr
    {

      height: 50px;
    }

    .table_course td select:hover,.table_course td input[type=file]:hover
    {
      font-size: large;
      color: blue;
    }
    .table_course td input[type=text],.table_course td textarea
    {


      font-family:Verdana, Geneva, Tahoma, sans-serif;
    }

  </style>

  <script>

    window.addEventListener("load",function()
    {
      // $("#header").load("header.html");
      $("#table_course").hide();
      $("input").hide();

      document.getElementsByTagName("form")[1].action="<?php echo $ToViewTopCoursePHP?>";

    })

    $.when (

        $.ajax({
          type:"GET",
          complete:function()
          {
            $("#loader").hide();
      $("#table_course").show();
      $("input").show();
          }
          ,
          url:"<?php echo $ToCategory?>",
          success:function(result,status,xhr)
          {

      var categorylist=JSON.parse(result);
      var content="";
      for (var i=0;i<categorylist.length;i++)
      {
        content=content+"<option value='"+categorylist[i].id+"'>"+categorylist[i].description+"</option>";
      }
     document.getElementById("categoryid").innerHTML=content;
          }
        })


    )





  </script>
</head>

<body>


  <main id="main">


  <div id="header"></div>


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
      <div class="section-title">
          <h2>Insert Course</h2>

        </div>
        <div id="loader"></div>






  <form  method="POST" enctype="multipart/form-data" id="form">
    <table class="table_course" id="table_course">
        <tr>
  <th width="300px"><label for="courseid">Course ID:</label></th>
  <td><input type="text"  id="courseid" name="courseid" required></td>
</tr>
  <tr>
  <th><label for="title"> Course Title:</label></th>
  <td><textarea id="title" name="title" rows="6" cols="50"></textarea></td>
  </tr>
    <tr>
  <th><label for="language"> Programming language used:</label></th>
  <td><input type="text" id="language" name="language"></td>
    </tr>
    <tr>
  <th><label for="duration"> Course Duration In Hours:</label></th>
  <td><input type="number" id="duration" name="duration" step="0.01"></td>
    </tr>
    <tr>
  <th><label for="description"> Course Description:</label></th>
  <td><textarea id="description" name="description" rows="6" cols="50"></textarea></td>
    </tr>
    <tr>
 <th> <label for="image"> Course Image:</label></th>
  <td><input type="file" id="imagefile" name="imagefile" required accept="image/*"><b>Upload an image</b></td>
    </tr>
    <tr>
        <th><label for="category"> Course Category:</label></th>
        <td>
  <select name="categoryid" id="categoryid" required>




    </select>
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
          <input class="btn btn-outline-success" type="submit" value="Save" id="save"  >
        </td>
    </tr>
  </table>
</form>
<script>

var form=$("#form");

    form.submit(function(e)
    {
      e.preventDefault();

      var formData = new FormData($("#form")[0]);
    $.ajax({
      type:"POST",
      url:"<?php echo $ToCourse?>",

      data:formData,
      // enctype: 'multipart/form-data',
      processData: false,
    contentType: false,
    cache: false,

      success:function(data)
      {



        alert("Insert successfully");
        window.location.replace("<?php echo $ToViewTopCoursePHP?>");

      },
      error:function(data)
      {
        alert("Insert failure");
      }
    })

    })
</script>



      <div >
      <form method="post">
        <input class="btn btn-outline-secondary rounded-pill" type="submit" value="Return To Previous Page"  >

      </form>
      </div>

      </div>

    </section><!-- End Portfolio Section -->


</body>

</html>
