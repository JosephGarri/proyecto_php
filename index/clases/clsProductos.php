<?php
require "/app/Login/clases/VLogin.php";
class clsProductos
{
    public $id_producto = 0;
    protected $request;
   



    public function __construct($request)
    {
        $this->request = $request;
    }
    public function extraer_ultimo()
    {
        $objeto = new Vlogin($this->request);
        $objeto->conexion();

        $consulta = "SELECT MAX(id) FROM productos LIMIT 1";
        $ejecutar_consulta = mysqli_query($objeto->conn, $consulta);
        while ($fila = mysqli_fetch_array($ejecutar_consulta)) {
            $this->id_producto = $fila['MAX(id)'];
        }
    }


    public function agregar($id_registrado): bool
    {
        try {
            $objeto = new Vlogin($this->request);
            $objeto->conexion();

            $name = $_REQUEST['name'] ?? null;
            $descripcion_breve = $_REQUEST['descripcion_breve'] ?? null;
            $descripcion = $_REQUEST['descripcion'] ?? null;
            $precio = $_REQUEST['precio'] ?? null;
            $id_tipo = intval($_REQUEST['tipo'] ?? null);
            $img = __DIR__ . DIRECTORY_SEPARATOR . 'imgProductos' . DIRECTORY_SEPARATOR . $_FILES['img']['name'];


            if ($name == "" || $descripcion_breve == "" || $descripcion == "" || $precio == "" || $id_tipo == "null" || $img == __DIR__ . DIRECTORY_SEPARATOR . 'imgProductos' . DIRECTORY_SEPARATOR) {
                $_POST['vacios'] = true;
                return false;
            } else {
                if (move_uploaded_file($_FILES['img']['tmp_name'], $img)) {
                    $insertar_producto = "INSERT INTO productos(nombre,descripcion_breve,descripcion,id_tipo,url_imagen,precio,id_creador) VALUES('$name','$descripcion_breve','$descripcion','$id_tipo','$img','$precio','$id_registrado')";
                    $ejecutar_producto =  mysqli_query($objeto->conn, $insertar_producto);

                    $this->extraer_ultimo();
                    $ultimo = intval($this->id_producto);

                    $insertar_fecha = "INSERT INTO fechas(fecha_creacion,fecha_modificacion,id_producto) VALUES(CURRENT_TIME(),CURRENT_TIME(),'$ultimo')";
                    $ejecutar_fecha =  mysqli_query($objeto->conn, $insertar_fecha);



                    if ($ejecutar_producto == true && $ejecutar_fecha == true) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    echo "someting went wrong.\n";
                }
            }
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function extraer_productos()
    {
        $objeto = new Vlogin($this->request);
        $objeto->conexion();

        $consulta = "SELECT * FROM productos";
        $ejecutar = mysqli_query($objeto->conn, $consulta);
        $i = 0;
        while ($fila = mysqli_fetch_array($ejecutar)) {

         
            
            $id = $fila['id'];
            $nombre = $fila['nombre'];
            $descrip_b = $fila['descripcion_breve'];
            $url_img = str_replace("/app", " ", $fila['url_imagen']);
            $precio = $fila['precio'];
            $i++; 
            
            
?>
<div style="background-color: #EEEEEE; border-style: groove; align-items: center;"
    class="col-lg-4 col-md-4 col-sm-4 gallery">

    <a href=""><img style="width: 600px; height: 250px;position: relative;" class="img-responsive" id="imgSalida"
            width="50%" height="50%" src="<?php echo $url_img; ?>" /></a>
    <div class="form-group">
        <label>
            <p>PRODUCT NAME:</p> <?php echo $nombre; ?>
        </label>
        <br>
        <label>
            <p>BRIEF PRODUCT INFORMATION:</p> <?php echo $descrip_b; ?>
        </label>
        <br>
        <label>
            <p>PRICE:</p><?php echo "₡" . $precio; ?>
        </label>
        <br>
    </div>
    <form class="contact-form" method="POST" action="">
        <button style="background-color: #02B6ED; width: 100%; height: 50px" type="submit" class="btn btn-large">VIEW
            PRODUCT</button>
    </form>
    <br>
</div>
<?php
        }
        if ($i == 0) {
        ?>
<h1>THERE ARE NO PRODUCTS TO SHOW</h1>

<?php
        }
      

    }
    
    public function extraer_mis_productos($id_registrado)
    {
        $objeto = new Vlogin($this->request);
        $objeto->conexion();

        $consulta = "SELECT id, nombre, descripcion_breve, url_imagen, precio FROM productos WHERE id_creador='$id_registrado' ";
        $ejecutar = mysqli_query($objeto->conn, $consulta);
        $i=0;
        while ($fila = mysqli_fetch_array($ejecutar)) {
         
            $id =$fila['id'];
            $nombre = $fila['nombre'];
            $descrip_b = $fila['descripcion_breve'];
            $url_img = str_replace("/app", " ", $fila['url_imagen']);
            $precio = $fila['precio'];
    
            $i++;
          ?>

<div style="background-color: #EEEEEE; border-style: groove; align-items: center;"
    class="col-lg-4 col-md-4 col-sm-4 gallery">

    <a href=""><img style="width: 600px; height: 250px;position: relative;" class="img-responsive" id="imgSalida"
            width="50%" height="50%" src="<?php echo $url_img; ?>" /></a>
    <div class="form-group">
        <label>
            <p>PRODUCT NAME:</p> <?php echo $nombre; ?>
        </label>
        <br>
        <label>
            <p>BRIEF PRODUCT INFORMATION:</p> <?php echo $descrip_b; ?>
        </label>
        <br>
        <label>
            <p>PRICE:</p><?php echo "₡".$precio; ?>
        </label>
        <br>
    </div>
    <form class="contact-form" method="POST" action="">
        <button style="background-color: #02B6ED; width: 100%; height: 50px" type="submit" class="btn btn-large">EDIT
            PRODUCT</button>
    </form>
    <br>
    <form class="contact-form" method="POST" action="">
        <button style="background-color: #02B6ED; " type="submit" class="btn btn-large">VIEW MESSAGES</button>

    </form>

</div>

<?php   
          if($i==0){
            ?>
<h1>THERE ARE NO PRODUCTS TO SHOW</h1>
<h2>ADD NEW PRODUCTS</h2>
<?php
          }
    }
 }
  
  
    public function extraer_productos_edit($id_producto)
    {
        
        $objeto = new Vlogin($this->request);
        $objeto->conexion();

        $consulta = "SELECT id, nombre, descripcion_breve, descripcion, url_imagen, precio FROM productos WHERE id='$id_producto' ";
        $ejecutar = mysqli_query($objeto->conn, $consulta);
      
       
    }
}
 
?>