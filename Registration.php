<?php
require_once('config/setting.php');
require_once('config/db.php');
require_once('config/function.php');
?>

<?php

// If the values are posted, insert them into the database.
if (!empty(isset($_GET['userid']))) {
    $userid = $_GET['userid'];
    $email = $_GET['Email'];
    $name=$_GET['username'];
    $password = $_GET['password'];
    $cpassword = $_GET['confirmpassword'];

    mysqli_select_db($conn,"wpproject");


    $slquery = "SELECT count(userid) as L FROM tbl_user WHERE userid = '$userid'";
    $stmt = mysqli_query($conn,$slquery);

    $row=mysqli_fetch_assoc($stmt);

    if ($row['L']>=1){
       goto2("Registration.php","User existed");
    }
    else{
      $sql="select * from tbl_user where Email='".$email."'";
      $result=mysqli_query($conn,$sql);
      if (mysqli_num_rows($result)>0)
      {
        alert1("Email address existed");
      }
      else if($password != $cpassword) {
        alert1("Password invalid");
        }
        else
        {

          $sql2 = "INSERT INTO `tbl_user` (`userid`, `password`,`Name`, `Email`) VALUES ('".$userid."', '".$password."', '".$name."','".$email."')";
          $result = mysqli_query($conn,$sql2);

          if($result){
             goto2("login.php","User Created Successfully, Please login to continue.");

          }
        }
    }
   }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Register
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">

  <div class="page-header header-filter" style="background-image: url('./assets/img/bg2.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="get" action="">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Register</h4>

              </div>

              <div class="card-body">

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="userid" name="userid" class="form-control" required placeholder="User ID..">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="username" name="username" class="form-control" required placeholder="Name...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="Email" name="Email" class="form-control" required placeholder="Email..">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password"    class="form-control" required placeholder="Password.." >
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="confirmpassword"    class="form-control" required placeholder="Confirm Password.." >
                </div>
              </div>
              <div class="footer text-center">
              </div>
              <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg" >Register</button>
             <a href="login.php"> <button type="button" class="btn btn-primary btn-link btn-wd btn-lg" >back</button></a>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
</body>

</html>
