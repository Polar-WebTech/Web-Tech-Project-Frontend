
<?php
  require './config/url.php';
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Course Category</title>
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
    .table_course td{
        padding: 10px;
    }

  </style>
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
        window.addEventListener("load",function()
    {

      $("table").hide();

      document.getElementsByTagName("form")[1].action="<?php echo $ToViewCourseCategoryPHP?>";

    })
    var id=getParameter('id');
    $.when(
      $.ajax({
          type:"GET",
          complete:function()
          {
            $("#loader").hide();
      $("table").show();

          }
          ,
          url:"<?php echo $ToCategory?>/"+id,
          success:function(result,status,xhr)
          {



            var category=JSON.parse(result);


            document.getElementById("hiddencategoryid").value=category[0].id;
            document.getElementById("categoryid").value=category[0].id;
            document.getElementById("description").value=category[0].description;


          }
        })


    )
    console.log("<?php echo $ToCategory?>"+"/"+id);

  </script>
</head>

<body>


  <main id="main">




    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
      <div class="section-title">
          <h2>Update Category</h2>

        </div>

        <div id="loader"></div>
<form  method="POST" id="form">
 <input type="hidden"  id="hiddencategoryid" name="hiddencategoryid" >

    <table class="table_course">
        <tr>
  <th width="300px"><label for="categoryid">Category ID:</label></th>
  <td><input type="text"  id="categoryid" name="categoryid" disabled ></td>
</tr>
<tr>
  <th width="300px"><label for="description">Description:</label></th>
  <td><textarea id="description" name="description" rows="6" cols="50" required></textarea></td>
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
          $.ajax({

            type:"POSt",
            url:"<?php echo $ToCategory?>"+"/"+id,
            data:form.serialize(),
            success:function(data)
            {
              alert("Update successfully");
              window.location.replace("<?php echo $ToUpdateCategoryPHP?>"+"?id="+id);

            },
            error:function(data)
            {
              alert("Update failure");
              window.location.replace("<?php echo $ToUpdateCategoryPHP?>"+"?id="+id);
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

      </div>

    </section><!-- End Portfolio Section -->


</body>

</html>
