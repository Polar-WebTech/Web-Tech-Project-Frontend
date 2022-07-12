<?php
  require './config/url.php';
?>

<html lang="en">

<head>
<?php include 'head.php'?>
  <title>Update Course</title>

  <style>
    .table_course tr
    {

      height: 50px;

    }
    .table_course td{
        padding: 10px;
    }
    .table_course td select:hover,.table_course td input[type=file]:hover
    {
      font-size: large;
      color: blue;
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
      // $("#header").load("header.html");
      $("table").hide();
      $("input").hide();
      // document.getElementsByTagName("form")[0].action=ToUpdateCoursePHP;
      document.getElementsByTagName("form")[1].action="<?php echo $ToViewTopCoursePHP?>";

    })
    var id=getParameter('id');
    $.when(
      console.log("<?php echo $ToCourse?>/"+id),
    $.ajax({

      type:"GET",
      url:"<?php echo $ToCourse?>/"+id,

      success: function(result,status,xhr)
      {



    var course=JSON.parse(result);


    document.getElementById("courseid").value=course.courseid;
    document.getElementById("hiddencourseid").value=course.courseid;
    document.getElementById("title").innerHTML=course.title;
    document.getElementById("language").value=course.language;
    document.getElementById("duration").value=course.duration;
    document.getElementById("description").value=course.description;
    document.getElementById("image").src='data:image;base64,'+course.image;
    document.getElementById("categoryid").value=course.categoryid;

      }
    }),
    $.ajax({
      type:"GET",
      url:"<?php echo $ToCategory?>",

      success: function(result,status,xhr)
      {


      var categorylist=JSON.parse(result);

      var content="";
      for (var i=0;i<categorylist.length;i++)
      {
        content=content+"<option value='"+categorylist[i].id+"'>"+categorylist[i].description+"</option>";
      }
     document.getElementById("categoryid").innerHTML=content;

      }
    }),

  ).done(function(){
      $("#loader").hide();
      $("table").show();
      $("input").show();
    })



  </script>
</head>

<body>

<?php include 'headerWithNavigation.php' ?>
  <main id="main">




    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
      <div class="section-title">
          <h2>Update Course</h2>

        </div>

        <div id="loader"></div>

<form  method="POST" enctype="multipart/form-data" id="form">
  <input type="hidden"  id="hiddencourseid" name="hiddencourseid"  >
    <table class="table_course">
        <tr>
  <th width="300px"><label for="courseid">Course ID:</label></th>
  <td><input type="text"  id="courseid" name="courseid" disabled ></td>
</tr>

  <tr>
  <th><label for="title"> Course Title:</label></th>
  <td><textarea id="title" name="title" rows="6" cols="50"></textarea></td>
  </tr>
    <tr>
  <th><label for="language"> Programming language used:</label></th>
  <td><input type="text" id="language" name="language" ></td>
    </tr>
    <tr>
  <th><label for="duration"> Course Duration:</label></th>
  <td><input type="number" id="duration" name="duration" step="0.01" ></td>
    </tr>
    <tr>
  <th><label for="description"> Course Description:</label></th>
  <td><textarea id="description" name="description" rows="6" cols="50" ></textarea></td>
    </tr>
    <tr>

 <th rowspan="2"> <label for="image"> Course Image:</label></th>
  <td><div style="border:1px solid black;display:flex;justify-content:center;">
<img id="image" style='width:auto;height:auto;' class='img-fluid' alt='' >

</div></td>
    </tr>
    <tr>

        <td><input type="file" id="imagefile" name="imagefile"  accept="image/*"><b>Upload an image</b></td>
    </tr>
    <tr>
        <th rows="2"><label for="category"> Course Category:</label></th>
        <td>
          <select name="categoryid" id="categoryid" required >



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

<div >
      <form method="post">
        <input class="btn btn-outline-secondary rounded-pill" type="submit" value="Return To Previous Page"  >

      </form>
      </div>

      </div>

      </div>

    </section><!-- End Portfolio Section -->

<script>

  var form=$("#form");
       form.submit(function(e)
        {
          e.preventDefault();
          var formData = new FormData($("#form")[0]);
          $.ajax({

            type:"POST",
      // url:"<?php echo $ToCourse?>/"+id,
      url:"<?php echo $ToCourse?>/"+id,

      data:formData,
      // enctype: 'multipart/form-data',
      processData: false,
    contentType: false,
    cache: false,

      success:function(data)
      {

        console.log(data);

        alert("Update successfully");
        window.location.replace("<?php echo $ToUpdateCoursePHP?>?id="+id);

      },
      error:function(data)
      {
        console.log(data);
        alert("Update failure");
      }
          })

        })
</script>
</body>

</html>
