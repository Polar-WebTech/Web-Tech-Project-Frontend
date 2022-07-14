
<?php
  require './config/url.php';
?>
<html lang="en">

<head>
<?php include 'head.php'?>
  <title>Update Course Category</title>

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
