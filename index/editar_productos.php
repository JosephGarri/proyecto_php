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
    <?php
      require 'clases/clsProductos.php';       // se trae el archivo de la clase
      $objeto = new clsProductos($_SERVER);  
      $inserto = false;
      $_POST['vacios'] = false;
    if (isset($_POST['insertar'])) {
        if ('POST' == $_SERVER['REQUEST_METHOD']) { //verifica el request
           // instancia la clase del archivo php con el request$
             $inserto=$objeto->editar_producto($_GET['id_producto']);
        }
    }

    ?>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index/shop.php?id_registrado=<?php echo $_GET['id_registrado']; ?>">RETURN</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/index/shop.php?id_registrado=<?php echo $_GET['id_registrado']; ?>">Shop</a></li>
                    <li class="active"><a href="/index/productos.php?id_registrado=<?php echo $_GET['id_registrado']; ?>">My
                            products</a></li>
                    <li><a href="/index/works.php?id_registrado=<?php echo $_GET['id_registrado']; ?>" class="smoothscroll">Works</a></li>
                    <li><a href="/index/contact.php?id_registrado=<?php echo $_GET['id_registrado']; ?>" class="smoothscroll">Contact</a></li>
                    <li style="margin-left: 200px"><a href="/Login/login.php" class="smoothscroll">Logout</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <div id="contact" onclick="ocultar()">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="centered">Edit Products</h2>

                    <form enctype="multipart/form-data" class="contact-form " role="form" method="POST">
                        <?php
                        if ($inserto) {
                        ?>
                            <div data-symbol="&#10004;" class="alert alert-success" role="alert" id="alerta">
                                <h4>product Edited successfully ✔ </h4>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($_POST['vacios']) {
                        ?>
                            <div class="alert alert-warning" id="alerta" role="alert">
                                <h4>❌ ENTER ALL THE DATA</h4>
                            </div>
                        <?php
                        }
                        $objeto->extraer_productos_edit($_GET['id_producto']);
                        ?>
                       

                        <div class="form-send">
                            <button type="submit" name="insertar" class="btn btn-large">Edit product</Regibutton>
                        </div>
                        <div class="form-send">
                            <button type="submit" name="eliminar" class="btn btn-large">Delete product</Regibutton>
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

    <script languague="javascript">
        function ocultar() {

            div = document.getElementById('alerta');
            div.style.display = 'none';

        }
    </script>
    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/php-mail-form/validate.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
    <script src="js/imagen.js"></script>

</body>

</html>