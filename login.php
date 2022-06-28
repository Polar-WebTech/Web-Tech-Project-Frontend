
<?php
$useridcookieu="loginuser";
$useridcookiep="loginpass";
require_once('config/function.php');
include ('config/checkSessionLogin.php');



if (!empty(isset($_GET['userid']))) {
    $status=logincheck(trim($_GET['userid']),trim($_GET['password']));


    if ($status==1){

        $_SESSION['userID']=$_GET['userid'];
        $_SESSION['password']=$_GET['password'];
        $userid=$_GET['userid'];
        $userpass=$_GET['password'];
        setcookie($useridcookieu,$userid,time()+(3*86400),"/");
        setcookie($useridcookiep,$userpass,time()+(3*86400),"/");

        goto2("admin/adminIndex.php","Login Successful");
    }
    else{
        goto2("login.php","Login Fail");
    }


} else{


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
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="GET" action="login.php">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Login </h4>

              </div>

              <div class="card-body">

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="userid" class="form-control"  placeholder="User ID.." required >
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password"   class="form-control" placeholder="Password.." required >
                </div>
              </div>
              <div style="display: flex; justify-content:center;">
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg" id="buttonlogin">Login</button>
                <input type="button" value="Register" class="btn btn-primary btn-link btn-wd btn-lg" id="btnRegister"  onClick="document.location.href='Registration.php'" />

              </div>

              <div style="display: flex; justify-content:center;">
              <input type="button" value="Forget Password" class="btn btn-primary btn-link btn-wd btn-lg" id="btnForget" onClick="document.location.href='ForgetPassword.php'" />
              </div>
              <div style="display: flex; justify-content:center;">
              <input type="button" value="Delete Cookies" class="btn btn-primary btn-link btn-wd btn-lg" id="btnCookie" onClick="document.location.href='config/deletecookie.php'" />
              </div>
              </div>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

  </div>


</html>
