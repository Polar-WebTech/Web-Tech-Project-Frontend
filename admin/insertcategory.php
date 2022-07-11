<?php
  require './config/url.php';
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <title>Insert Course Category</title>
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

  <!-- =======================================================
  * Template Name: KnightOne - v4.3.0
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .table_course th, .table_course td
    {
      padding: 10px;
    }
    .table_course tr
    {

      height: 50px;
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


      document.getElementsByTagName("form")[1].action="<?php echo $ToViewCourseCategoryPHP?>";

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
          <h2>Insert Course Category</h2>

        </div>

<form  method="POST" id="form">
    <table class="table_course">
        <tr>
  <th ><label for="categoryid">Category ID</label></th>
  <th>:</th>
  <td><input type="text"  id="categoryid" name="categoryid" required></td>
</tr>
  <tr>
  <th><label for="description"> Description</label></th>
  <th>:</th>
  <td><textarea id="description" name="description" rows="6" cols="50" required></textarea></td>
  </tr>
  <tr>
        <td></td>
        <td></td>
        <td>
          <input class="btn btn-outline-success" type="submit" value="Save" id="save"  >

        </td>
    </tr>
  </table>
</form>

      <div >
      <form method="post">
        <input class="btn btn-outline-secondary rounded-pill" type="submit" value="Return To Previous Page"  >

          </form>
      </div>

      </div>

    </section><!-- End Portfolio Section -->

<script>
    var form=$("#form");
    form.submit(function(e)
    {
      e.preventDefault();

    $.ajax({
      type:"POST",
      url:"<?php echo $ToCategory?>",
      data:form.serialize(),
      success:function(data)
      {
        console.log(data);
        alert("Insert successfully");
        window.location.replace("<?php echo $ToViewCourseCategoryPHP ?>");
      },
      error:function(data)
      {
        alert("Insert failure");
      }
    })

    })

</script>
</body>

</html>
