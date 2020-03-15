<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Registro</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
 


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">


</head>

<body >
    <div  class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="centered">Register Form</h2>

          <form class="contact-form php-mail-form" role="form" action="" method="POST">

            <div class="form-group">
              <label for="name">Nombre* </label><input type="name" name="name" class="form-control"  placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
              <div class="validate"></div>
            </div>
            <div class="form-group">
             <label for="email">Email*</label> <input type="email" name="email" class="form-control"  placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <label for="password">New Password*</label><input type="password" name="password" class="form-control"  placeholder="Please enter your new password" data-rule="minlen:4" data-msg="Please enter a valid password with at least 4 characters">
              <div class="validate"></div>
            </div>
            <div class="form-group">
             <label for="confirm_password">Confirm Password*</label> <input type="password" name="confirm_password" class="form-control"  data-rule="minlen:4"  placeholder="Please cornfirm your new password"  data-msg="Please re-enter your new password">
              <div class="validate"></div>
            </div>

            <div >
              <button type="submit" name="registrar" class="btn btn-large">Register</button>
            </div>
<?php
if(isset($_POST['registrar'])){

  ?>
  <div class="">Done, you are registered!</div>
  <?php
}

?>
          </form>

        </div>
      </div>
    </div>
  

  

  <div style="margin-top: 270px" id="copyrights">
    <div class="container">
      <p>
  
      </p>
      <div class="credits">
       
      </div>
    </div>
  </div>


  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/php-mail-form/validate.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
