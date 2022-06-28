
<?php
include ('config/setting.php');
include ('config/db.php');
require_once ('config/function.php');



if(isset($_POST['email'])){
    mysqli_select_db($conn,$database);
    $email_reg=$_POST['email'];
    $sql="select * from tbl_user where email='".$email_reg."'";
    $details=mysqli_query($conn,$sql);
    if (mysqli_num_rows($details)>0) {

        $OTP= rand(1000000, 9999999);


          $sql2="UPDATE `tbl_user` set `OTP`='".$OTP."' where `Email`='".$email_reg."'";
          $result=mysqli_query($conn,$sql2);



        echo "<script>alert ('Your OTP is ".$OTP."')</script>";
        echo "<script>window.location.href='ResetPassword.php?email=".$email_reg."'</script>";
    }
    else{
        $message="Sorry! no account associated with this email";
        echo "<script>alert ('".$message."')</script>";
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
    Login
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
    <div class="container" >
      <div class="row" >
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="ForgetPassword.php">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Forget Password</h4>

              </div>
              <div style="display:flex;justify-content:center;padding-left:15px;padding-right:15px;">
              <p style="padding:5px;text-align:left;font-family:serif;font-weight:bold;font-size:large;color:grey;">Enter the email address associated with your account and we'll send an email that contains an OTP to your email.</p>
              </div>

              <div class="card-body">

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="text" name="email" class="form-control"  placeholder="Email address.." required >
                </div>

              </div>


              <div style="display: flex; justify-content:center;">
              <input type="submit" value="Reset Password" class="btn btn-primary btn-link btn-wd btn-lg"  >

              <input type="button" value="Back" class="btn btn-primary btn-link btn-wd btn-lg" id="btnForget" onClick="document.location.href='login.php'" />
              </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

  </div>


</html>
