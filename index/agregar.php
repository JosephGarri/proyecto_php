<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Instant - Bootstrap Personal Template</title>
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
          <li><a href="/index/shop.php">Shop</a></li>
          <li class="active"><a href="/index/productos.php">My products</a></li>
          <li><a href="/index/works.php" class="smoothscroll">Works</a></li>
          <li><a href="/index/contact.php" class="smoothscroll">Contact</a></li>
          <li style="margin-left: 200px"><a href="/Login/login.php" class="smoothscroll">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="centered">Register Products</h2>

                    <form class="contact-form " role="form" method="POST">

                        <div class="form-group">
                            <label for="name">Product Name*</label> <input type="name" name="name" class="form-control"
                                placeholder="Name of Product">
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion_breve">Brief description of the product</label> <input type="text"
                                name="descripcion_breve" class="form-control"
                                placeholder="brief description of the product">
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion"></label>Product description<textarea class="form-control"
                                name="descripcion" placeholder="Product description" rows="4"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <label for="precio">Price</label><input type="text" name="precio" class="form-control"
                                placeholder="Price">
                            <div class="validate"></div>
                        </div>
                        <label for="tipo">Type</label>

                        <div class="form-group">
                            <select class="form-control" name="tipo">
                                <option value="null" selected>SELECCIONE UNA CATEGORIA</option>
                                <option value="electronico">ELECTRONICO</option>
                                <option value="cocina">COCINA</option>
                                <option value="ropa">ROPA</option>
                                <option value="otros">OTROS</option>
                            </select>
                            <div class="validate"></div>
                        </div>
                       
                        <div class="form-group">
                           <label for="file-input">Image</label> <input class="form-control" name="file-input" id="file-input" type="file" accept="image/*" />
                            <br />
                            <img  style="width: 300px; height: 300px" class="form-control" id="imgSalida" width="50%" height="50%" src="" />
                            <div class="validate"></div>
                        </div>



                        <div class="loading"></div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>

                        <div class="form-send">
                            <button type="submit" class="btn btn-large">Register product</Regibutton>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div id="copyrights">
        <div class="container">
            <p>

            </p>
            <div class="credits">

            </div>
        </div>
    </div>
    <!-- / copyrights -->

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/php-mail-form/validate.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
    <script src="js/imagen.js"></script>

</body>

</html>