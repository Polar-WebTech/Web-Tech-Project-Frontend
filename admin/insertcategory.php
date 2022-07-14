<?php
  require './config/url.php';
?>
<html lang="en">

<head>
<?php include 'head.php'?>
  <title>Insert Course Category</title>

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
