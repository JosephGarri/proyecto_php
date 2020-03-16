<!DOCTYPE html>
<html lang="en">

<head>
  <title>Regist</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
</head>

<body style="background-image: url(/Login/images/back1.jpg)">

  <?php

  $name = "";
  $email = "";
  $pass1 = "";
  $pass2 = "";
  $inserto = false;
  $contras = false;
  $_REQUEST['email_existe'] = false;

  
  if (isset($_POST['registrar'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if ($pass1 == $pass2) {
      if ('POST' == $_SERVER['REQUEST_METHOD']) {
        require 'clases/registro.php';
        $registro = new clsRegistro($_SERVER);
        $inserto = $registro->ingresar_usuario();
        if( $_REQUEST['email_existe'] == true){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $pass1 = $_POST['pass1'];
          $pass2 = $_POST['pass2'];
        }else{
       $name = "";
        $email = "";
        $pass1 = "";
        $pass2 = "";
        }
      
      }
    } else {
      $contras = true;
    }
  }


  ?>



  <div class="limiter">
    <div class="container-login100">
      <div onclick="ocultar()" class="wrap-register100 p-l-55 p-r-55 p-t-65 p-b-54">
        <form class="login100-form validate-form" method="POST">
          <span class="login100-form-title p-b-49">
            Register form
          </span>

          <div class="wrap-input100 validate-input" data-validate="Type yor name">
            <span class="label-input100">Name*</span>
            <input class="input100" type="text" name="name" placeholder="Type your name" value="<?php echo $name; ?>">
            <span class="focus-input100" data-symbol="&#128100;"></span>
          </div>
          <div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
            <span class="label-input100">Email*</span>
            <input class="input100" type="email" name="email" placeholder="Type your email" value="<?php echo $email; ?>">
            <span class="focus-input100" data-symbol="&#64;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">New Password*</span>
            <input class="input100" type="password" name="pass1" id="pass1" placeholder="Type your new password" value="<?php echo $pass1; ?>">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Please confirm your Password">
            <span class="label-input100">Conrfirm your Password</span>
            <input class="input100" type="password" name="pass2" id="pass2" placeholder="Confirm your password please" value="<?php echo $pass2; ?>">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>

          <div class="text-right p-t-8 p-b-31">

          </div>
          <?php
          if ($_REQUEST['email_existe'] == true) {
          ?>
            <div class="alert alert-warning" id="alerta" role="alert">
              <h4>❌
                the email already exists</h4>
            </div>
          <?php
          }
          ?>
          <?php
          if ($contras == true) {
          ?>
            <div class="alert alert-warning" id="alerta" role="alert">
              <h4>❌Passwords do not match</h4>
            </div>
          <?php
          }
          ?>
          <?php
          if ($inserto == true) {
          ?>
            <div data-symbol="&#10004;" class="alert alert-success" role="alert" id="alerta">
              <h4> Registered user successfully ✔ </h4>
            </div>
          <?php

          }
          ?>
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>

              <button name="registrar" type="submit" class="login100-form-btn">
                Register
              </button>
            </div>
          </div>
          <div>
            <br>
            <div style="margin-left: 150px" class="midiv"><a href="login.php" data-symbol="">
                <h5>← return to login</h5>
              </a></div>
          </div>


        </form>
      </div>
    </div>
  </div>

  <script languague="javascript">
    function ocultar() {

      div = document.getElementById('alerta');
      div.style.display = 'none';

    }
  </script>


  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>

</html>