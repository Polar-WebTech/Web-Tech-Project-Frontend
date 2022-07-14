<?php
  require './config/url.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
  td,th
  {
    padding: 10px;
  }
  input[type="submit"].save{
  background-color:greenyellow;
  color:blue;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;


}
input[type="submit"].save:hover{

  font-size: x-large;

}
  </style>

<?php include 'head.php'?>
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

<!-- ======= Header ======= -->
<body>
<?php include 'headerWithNavigation.php' ?>
<main id="main">

<!-- ======= profiles Section ======= -->
<section id="profiles" class="profiles">
  <div class="container">
  <div class="section-title">
    <h2>Edit Profile</h2>
  </div>

  <div class="row">
  <div class="col-lg-4 col-md-6 d-flex align-items-stretch">


  <?php
//   if (isset($_POST['websitename']))
//   {
//     $u = $_GET['id'];
//     $a = $_POST['websitename'];
//     $b = $_POST['slogan'];
//     $c = $_POST['about'];
//     $d = $_POST['user'];
//     $e = $_POST['instructor'];
//     $f = $_POST['hour'];
//     $g = $_POST['course'];

//     $sql = "UPDATE `tbl_profile` SET `Website_name` = '".$a."',  `Slogan` = '".$b."',`About_us` = '".$c."',`Active_users` = '".$d."',`Experience_instructors` = '".$e."',
//     `Total_hours` = '".$f."',`Number_courses` = '".$g."'
//     WHERE (`id` = '".$u."') LIMIT 1";

//     mysqli_select_db($conn, $database);
//     $result = mysqli_query($conn,$sql);

//    goto2("adminIndex.php","The profile is successfully edited");
//   }
//   else
// {


//     $sql="select * from tbl_profile";
//     mysqli_select_db($conn, $database);
//     $result = mysqli_query($conn, $sql);

//     $row = mysqli_fetch_assoc($result);
//     $u=$row['id'];
    ?>

    <form method="PUT" id="profileForm">

    <table >
    <tr>
      <th><label for="Website Name">Website Name</label></th>
      <th>:</th>
      <td><input type="text" id="websitename" name="name" value = "" required></td>
    </tr>
    <tr>
      <th><label for="Slogan"> Slogan</label></th>
      <th>:</th>
      <td><textarea id="slogan" rows="5px" cols="50px" name="slogan" required><?php //echo $row['Slogan']; ?></textarea></td>
    </tr>

    <tr>
      <th><label for="about"> About Us</label></th>
      <th>:</th>
      <td><textarea id="about_us" rows="8px" cols="100px" name="about_us" required><?php //echo $row['About_us']; ?></textarea></td>
    </tr>

    <tr>
      <th><label for="user"> Active Users</label></th>
      <th>:</th>
      <td><input type="number" id="active_users" name="active_users"  value = "<?php //echo $row['Active_users'] ?>"> </td>
    </tr>

    <tr>
      <th><label for="instructor"> Experience Instructors</label></th>
      <th>:</th>
      <td><input type="number" id="experience_instructors" name="experience_instructors"  value = "<?php //echo $row['Experience_instructors'] ?>"> </td>
    </tr>

    <tr>
      <th><label for="hour">Total Hours of Teaching Video</label></th>
      <th>:</th>
      <td><input type="number" id="total_hours" name="total_hours"  value = "<?php //echo $row['Total_hours'] ?>"> </td>
    </tr>

    <tr>
      <th><label for="course">Number of Courses</label></th>
      <th>:</th>
      <td><input type="number" id="no_courses" name="no_courses"  value = "<?php //echo $row['Number_courses'] ?>"> </td>
    </tr>

    <tr>
      <td></td>
      <td><input type="hidden" id="id" name="id" value = ""></td>
      <td> <input class="btn btn-outline-success" type="submit" value="Save" id="save"></td>
    </tr>
    </form>
    <tr>
      <td>
      <form action="<?php echo $ToAdminIndexPHP ?>">

      <input class="btn btn-outline-secondary rounded-pill" type="submit" value="Return To Previous Page">
</form>
      </td>
      <td></td>
      <td></td>
    </tr>
    </table>



  <?php // } ?>
  </div>
  </div>

  </div>
</section>


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
<!-- Javascript to read profile data -->
<script>

document.getElementById("profileForm").setAttribute("action","<?php echo $ToProfile ?>"+"/1");

var xml = new XMLHttpRequest();
xml.open('get','<?php echo $ToProfile ?>');

xml.send();

xml.onload = function(){

  var profileData = JSON.parse(xml.responseText);

  document.getElementById("id").value = profileData[0].id;
  document.getElementById("websitename").value = profileData[0].name;
  document.getElementById("slogan").value = profileData[0].slogan;
  document.getElementById("about_us").value = profileData[0].about_us;
  document.getElementById("active_users").value = profileData[0].active_users;
  document.getElementById("experience_instructors").value = profileData[0].experience_instructors;
  document.getElementById("total_hours").value = profileData[0].total_hours;
  document.getElementById("no_courses").value = profileData[0].no_courses;
}


</script>
<!-- Javascript to update profile data -->
<script>
  var frm = $('#profileForm');

  frm.submit(function (e) {

      e.preventDefault();

      $.ajax({
          type: frm.attr('method'),
          url: frm.attr('action'),
          data: frm.serialize(),
          success: function (data) {
              alert('The profile is successfully edited.');
              window.location.replace("<?php echo $ToAdminIndexPHP ?>");
          },
          error: function (data) {
              console.log('An error occurred.');
              console.log(data);
          },
      });
  });

</script>

</html>