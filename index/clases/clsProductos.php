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
    <a href=""><img style="width: 600px; height: 250px;position: relative;" class="img-responsive" id="imgSalida" width="50%" height="50%" src="<?php echo $url_img; ?>" /></a>
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
         
            $id=$fila['id'];
            $nombre = $fila['nombre'];
            $descrip_b = $fila['descripcion_breve'];
            $url_img = str_replace("/app", " ", $fila['url_imagen']);
            $precio = $fila['precio'];

    $link="editar_productos.php?id_registrado=".$id_registrado."&id_producto=".$id;
            $i++;
          ?>
<div style="background-color: #EEEEEE; border-style: groove; align-items: center;"
    class="col-lg-4 col-md-4 col-sm-4 gallery">
    <a href=<?php echo $link;?>><img style="width: 600px; height: 250px;position: relative;" class="img-responsive"
            id="imgSalida" width="50%" height="50%" src="<?php echo $url_img; ?>" /></a>
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
    <form class="contact-form" method="POST" action="<?php echo $link;?>">
        <button style="background-color: #02B6ED; width: 100%; height: 50px" type="submit" class="btn btn-large">EDIT
            PRODUCT</button>
    </form>
    <br>
    <form class="contact-form" method="POST" action="">
        <button style="background-color: #02B6ED; " type="submit" class="btn btn-large">VIEW MESSAGES</button>
    </form>
</div>
<?php   
          
    }
    if($i==0){
        ?>
<h1>THERE ARE NO PRODUCTS TO SHOW</h1>
<h2>ADD NEW PRODUCTS</h2>
<?php
          }
 }
  
  
    public function extraer_productos_edit($id_producto)
    {
        
        $objeto = new Vlogin($this->request);
        $objeto->conexion();

        $consulta = "SELECT nombre, descripcion_breve, descripcion, url_imagen, precio,id_tipo FROM productos WHERE id='$id_producto' ";
        $ejecutar = mysqli_query($objeto->conn, $consulta);

        $i=0;
        while ($fila = mysqli_fetch_array($ejecutar)) {

            $nombre = $fila['nombre'];
            $descrip_b = $fila['descripcion_breve'];
            $descripcion=$fila['descripcion'];
            $url_img = str_replace("/app", " ", $fila['url_imagen']);
            $precio = $fila['precio'];
            $id_tipo=$fila['id_tipo'];
         
            $i++;
        ?>

<div class="form-group">
    <label for="name">Product Name*</label> <input type="name" name="name" class="form-control"
        placeholder="Name of Product" value="<?php echo $nombre; ?>">

</div>
<div class="form-group">
    <label for="descripcion_breve">Brief description of the product</label> <input type="text" name="descripcion_breve"
        class="form-control" placeholder="brief description of the product" value="<?php echo $descrip_b; ?>">

</div>
<div class="form-group">
    <label for="descripcion"></label>Product description<textarea class="form-control" name="descripcion"
        placeholder="Product description" rows="4" value=""><?php echo $descripcion; ?></textarea>

</div>
<div class="form-group">
    <label for="precio">Price</label><input type="text" name="precio" class="form-control" placeholder="Price"
        value="<?php echo $precio; ?>">

</div>
<?php
   include "clases/clstipos.php";
   $ob = new clstipos($_SERVER);
    ?>
<label for="tipo">Type</label>

<div class="form-group">
    <select class="form-control" name="tipo">
        <option value="null">SELECCIONE UNA CATEGORIA</option>
        <?php
             $ob->extraer_tipo_seleccionado($id_tipo);
            ?>
    </select>

</div>

<div class="form-group">
    <label for="file-input">Image</label> <input class="form-control" name="img" id="file-input" type="file" accept="image/*" value="<?php echo $fila['url_imagen']; ?>">
    <br />
    <img style="width: 300px; height: 300px" class="form-control" id="imgSalida" width="50%" height="50%"
        src=<?php echo $url_img; ?> />

</div>


<?php
    }
 }
 public function editar_producto($id_producto): bool
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
                    $actualizar_producto = "UPDATE productos SET nombre='".$name."',descripcion_breve='".$descripcion_breve."',descripcion='".$descripcion."',id_tipo=".$id_tipo.",url_imagen='".$img."',precio=".$precio." WHERE id=".intval($id_producto);
                    $ejecutar_producto =  mysqli_query($objeto->conn, $actualizar_producto);

                    $actualizar_fecha = "UPDATE fechas SET fecha_modificacion=CURRENT_TIME() WHERE id_producto=".$id_producto;
                    $ejecutar_fecha =  mysqli_query($objeto->conn, $actualizar_fecha);
var_dump($actualizar_producto);
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
}
 
?>