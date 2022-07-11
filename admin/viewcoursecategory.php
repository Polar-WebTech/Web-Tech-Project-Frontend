<?php
  require './config/url.php';
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <title>View Course Category</title>
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
       td,th
      {
          font-size: larger;
          padding: 20px;

      }
    </style>
    <script>
      window.addEventListener("load",function()
    {
      // $("#header").load("header.html");
      $("a").hide();
      document.getElementsByTagName("form")[0].action="<?php echo $ToViewTopCourseHTML?>";
      document.getElementById("linkInsertCategory").href="<?php echo $ToInsertCategoryHTML?>";
    })

    function deleteCategory(id)
    {
      if (confirm("Are you sure to delete this category")==true)
      {
        $.ajax({
        type:"delete",
        url:"<?php echo $ToCategory ?>"+"/"+id,
        success: function(data)
        {
          alert ("Delete successfully");
          window.location.replace("<?php echo $ToViewCourseCategoryHTML ?>");
        },
        error: function(data)
        {
          alert ("Delete failure");
          window.location.replace("<?php echo $ToViewCourseCategoryHTML ?>");
        }
      });
      }
      else
      {

      }

    }
    $.when(
        $.ajax({
      type:"GET",
      url:"<?php echo $ToCategory?>",

      success: function(result,status,xhr)
      {

      var categorylist=JSON.parse(result);
      var table=document.getElementById("category").getElementsByTagName('tbody')[0];
      console.log(table);
      var insertrow=document.getElementById("insertrow");

      for (var i=0;i<categorylist.length;i++)
      {
        var row=table.insertRow();
        var cell1=row.insertCell();
        var cell1textnode=document.createTextNode(categorylist[i].id);
        cell1.appendChild(cell1textnode);
        var cell2=row.insertCell();
        var cell2textnode=document.createTextNode(categorylist[i].description);
        cell2.appendChild(cell2textnode);
        var cell3=row.insertCell();

        var ulink=document.createElement("a");
        ulink.href="<?php echo $ToUpdateCategoryHTML?>"+"?id="+categorylist[i].id;
        var updatelink=document.createElement("button");


        updatelink.className="btn btn-outline-primary";
        var updateTextnode=document.createTextNode("Update");
        updatelink.append(updateTextnode);
        ulink.append(updatelink);
        cell3.appendChild(ulink);
        var cell4=row.insertCell();

        var deletelink=document.createElement("button");

        deletelink.type="submit";

        deletelink.setAttribute("onclick", 'return deleteCategory("'+categorylist[i].id+'")');
        deletelink.className="btn btn-outline-danger";
        var deleteTextnode=document.createTextNode("Delete");
        deletelink.append(deleteTextnode);
        cell4.appendChild(deletelink);



      }


      }
    }),

      ).done(function()
      {
        $("#loader").hide();
        $("a").show();
      })

    </script>
</head>

<body>

  <div id="header"></div>
  <main id="main">





    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Edit Course Category</h2>

        </div>
        <div id="loader"></div>
        <table id="category">
          <thead>
            <tr>
              <th>Category ID</th>
              <th>Description</th>

          </tr>
          </thead>

            <tbody>

            </tbody>
            <tfoot>
              <tr id="insertrow">
                <td></td>
                <td ><a id="linkInsertCategory" href="" class="btn btn-outline-success">Insert Category </a></td>
            </tr>
            </tfoot>




        </table>


        <br>

        <div >
      <form method="post">
        <input class="btn btn-outline-secondary rounded-pill" type="submit" value="Return To Previous Page"  >

      </form>
      </div>

<script>


</script>




      </div>

    </section><!-- End Portfolio Section -->


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