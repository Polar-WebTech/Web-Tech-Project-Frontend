
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
  <!-- <link href="./assets/demo/demo.css" rel="stylesheet" /> -->
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
  integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
  crossorigin=""></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://smtpjs.com/v3/smtp.js"></script>

</head>

<body class="login-page sidebar-collapse">

  <div class="page-header header-filter" style="background-image: url('./assets/img/bg2.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="https://itsensei.herokuapp.com/api/user" id="registrationForm">
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
                  <input type="text" id="userid" name="userid" class="form-control" required placeholder="User ID..">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" id="name" name="name" class="form-control" required placeholder="Name...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" id="email" name="email" class="form-control" required placeholder="Email..">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password"  id="password"  class="form-control" required placeholder="Password.." >
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>


                
                  <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" required placeholder="Confirm Password.." >
                </div>
              </div>
              <div class="footer text-center">
              </div>
              <input id="sbmtBtn" type="submit" class="btn btn-primary btn-link btn-wd btn-lg" value="Register" >
             <a href="login.php" class="btn btn-primary btn-link btn-wd btn-lg">Back</a>

              </div>
            </form>


            
          </div>
        </div>
      </div>
    </div>

  </div>

</body>

  <!--   Core JS Files   -->
  <script src="./assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>


<script>

  document.getElementById("sbmtBtn").addEventListener('click',function(event){

  event.preventDefault();

  var userid = document.getElementById("userid").value.trim();
  var name = document.getElementById("name").value.trim();
  var email = document.getElementById("email").value.trim();
  var password = document.getElementById("password").value.trim();
  var confirmpassword = document.getElementById("confirmpassword").value.trim();

  var password_matches = (password === confirmpassword);

  var xhr = new XMLHttpRequest();
  xhr.open("GET","https://itsensei.herokuapp.com/api/user/"+userid);
  xhr.send();

  xhr.onload = function(){
    var user = JSON.parse(xhr.responseText);

    var emptyArray = [];

    if(!(xhr.responseText === JSON.stringify(emptyArray))){


      alert('User ID already registered!');
      window.location.replace = "Registration.php";

    }
    else{

          if(!password_matches){

            alert('Password does not match!');
            window.location.replace = "Registration.php";

          }
          else{

                $(document).ready(function(){

                  var frm = $('#registrationForm');

                  $.ajax({
                      type: frm.attr('method'),
                      url: frm.attr('action'),
                      data: frm.serialize(),
                      success: function (data) {
                          alert('Account Registered Successfully.');
                          window.location.replace("login.php");
                      },
                      error: function (data) {
                          alert('An error occurred.');
                          console.log(data);
                      },
                  });

                });
          }
        
    }

  }

});


</script>


  <!-- <script src="./assets/js/core/popper.min.js" type="text/javascript"></script> -->
  <!-- <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script> -->
  <!-- <script src="./assets/js/plugins/moment.min.js"></script> -->
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <!-- <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script> -->
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <!-- <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script> -->
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <!-- <script src="./assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script> -->


</html>
