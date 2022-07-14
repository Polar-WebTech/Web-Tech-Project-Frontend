
<?php
  require './config/url.php';
?>
<html lang="en">

<head>
<?php include 'head.php'?>
  <title>Insert Course</title>


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
