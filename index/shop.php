<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Index</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">


</head>

<body>


  <!-- Static navbar -->
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/index/shop.php">RETURN</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="/index/shop.php">Shop</a></li>
          <li><a href="/index/productos.php">My products</a></li>
          <li><a href="/index/works.php" class="smoothscroll">Administration</a></li>
          <li style="margin-left: 200px"><a href="/Login/login.php" class="smoothscroll">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>


  <div id="headerwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <h4>HELLO PEOPLE, WELCOME TO</h4>
          <h1>TECH ZONE STORE</h1>
          <h4>DONDE TUS COMPRAS LLEGAN VOLANDO POR LO RAPIDOS QUE SOMOS</h4>
        </div>
      </div>
    </div>
    <!-- /container -->
  </div>

  <section id="works"></section>
  <div class="container">
    <div class="row centered mt mb">
      <form class="contact-form " role="form" method="POST">
        <?php
        include "clases/clstipos.php";
        $ob = new clstipos($_SERVER);
        ?>
        <label for="tipo">SEARCH</label>

        <div class="form-group">
          <select class="form-control" name="tipo" onchange="">
            <option value="null">SELECCIONE UNA CATEGORIA</option>
            <?php
            $ob->extraer_tipo_seleccionado($id_tipo);
            ?>
          </select>

        </div>

      </form>
      <h1>PRODUCTS</h1>
      <?php
      include "clases/clsProductos.php";
      $ob = new clsProductos($_SERVER);
      $ob->extraer_productos();
      ?>
    </div>
  </div>

  <div id="copyrights">
    <div class="container">

      <div class="credits">

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