
<?php
include ('config/setting.php');
include ('config/db.php');
require_once ('config/function.php');


$visibilty="required";
$value="";
 $passwordvisibility=FALSE;
 mysqli_select_db($conn,$database);
 $email=$_GET['email'];
 $sql="select * from tbl_user where Email='".$email."'";
 $result=mysqli_query($conn,$sql);
if(isset($_GET['email'])){


    if (mysqli_num_rows($result)!=1) {

      goto2("login.php","Invalid link..Returning to the login page");
    }

}

if($_SERVER["REQUEST_METHOD"] == "POST"){




    $row=mysqli_fetch_assoc($result);
    if ($row['OTP']==$_POST['OTP'])
    {
      $visibilty="readonly";

      $value=$row['OTP'];
      $passwordvisibility=TRUE;
      $email=$_GET["email"];

    }
    else
    {
      echo "<script>alert('Invalid OTP');</script>";
    }

  if ( $passwordvisibility==TRUE)
  {
  if (isset($_POST['password1'])&&isset($_POST['password2']))
  {

    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
  if ($password2==$password1)
  {
    $result=mysqli_query($conn,$sql);


      if ($row['password']==$password1)
      {
        echo "<script>alert('Your new password have been used before. Please try another');</script>";
      }
      else
      {
      $OTP=$_POST['OTP'];
      $password=$password1;

      $sql2="UPDATE `tbl_user` set `password`='".$password."', `OTP`='' where `email`='".$email."'";

      mysqli_query($conn,$sql2);
      goto2("login.php","You have successfully updated your password");
      }
   }
  else
  {
      echo "<script> alert('Please makesure that both passwords are the same'); </script>";
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
            <form class="form" method="POST" action="ResetPassword.php?email=<?php echo $_GET['email'];?>">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Reset Password</h4>

              </div>


              <div class="card-body">

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="text" name="email" class="form-control"  value="<?php echo $_GET['email'] ?>" disabled >
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">sms</i>
                    </span>
                  </div>
                  <input type="text" name="OTP" class="form-control" placeholder="OTP.." <?php echo $visibilty ?> value="<?php echo $value ?>">
                </div>
                <?php
                if ($passwordvisibility)
                { ?>


                  <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password1"   class="form-control" placeholder="New Password.." required >
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password2"   class="form-control" placeholder="Confirm New Password.." required >
                </div>
               <?php  } ?>


              </div>


              <div style="display: flex; justify-content:center;">
              <?php
              if ($passwordvisibility==FALSE) {
                ?>
              <input type="submit" value="Verify OTP" name="verifyOTP" class="btn btn-primary btn-link btn-wd btn-lg"  >
              <?php }
              else {
              ?>
               <input type="submit" value="Confrim" name="confirm" class="btn btn-primary btn-link btn-wd btn-lg"  >
               <?php } ?>
              </form>

              <input type="button" value="Back" class="btn btn-primary btn-link btn-wd btn-lg"  onclick="window.location.href='login.php'">
          </div>
              </div>
              </div>


          </div>
        </div>
      </div>
    </div>

  </div>


</html>
