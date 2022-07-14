<?php
  require './config/url.php';
?>
<html lang="en">

<head>
<?php include 'head.php'?>
  <title>View Course Category</title>

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
      document.getElementById("back").href="<?php echo $ToViewTopCoursePHP?>";
      document.getElementById("linkInsertCategory").href="<?php echo $ToInsertCategoryPHP?>";
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
          window.location.replace("<?php echo $ToViewCourseCategoryPHP ?>");
        },
        error: function(data)
        {
          alert ("Delete failure");
          window.location.replace("<?php echo $ToViewCourseCategoryPHP ?>");
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
        ulink.href="<?php echo $ToUpdateCategoryPHP?>"+"?id="+categorylist[i].id;
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
        <a id="back" href="" class="btn btn-outline-secondary rounded-pill">Return To Previous Page </a>

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