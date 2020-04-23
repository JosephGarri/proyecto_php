<?php
require "clases/clsUsuarios.php";
class clsMensajes
{

    protected $request;
    protected $conn;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function conexion()
    {
        $this->conn = mysqli_connect("database", "root", "", "DBTienda");

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function guardar_mensaje($id_producto, $id_emisor): bool
    {

        $this->conexion();

        $mensaje = $_REQUEST['txtmessage'] ?? null;

        if (ltrim($mensaje) == "") {
            return false;
        } else {
            $insertar_mensaje = "INSERT INTO mensajes(mensaje,id_producto,id_emisor) VALUES('$mensaje','$id_producto','$id_emisor')";
            $ejecutar_mensaje =  mysqli_query($this->conn, $insertar_mensaje);
            var_dump($ejecutar_mensaje);
            if ($ejecutar_mensaje) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function mostrar_mensajes($id_producto){
        $ob=new clsUsuarios($_SERVER);
        $this->conexion();
        $consulta = "SELECT mensaje, id_emisor FROM mensajes WHERE id_producto='$id_producto'";
        $ejecutar = mysqli_query($this->conn, $consulta);

        $i = 0;
        while ($fila = mysqli_fetch_array($ejecutar)) {

            $mensaje = $fila['mensaje'];
            $id_emisor = $fila['id_emisor'];

            $i++;
?>
            <div style="background-color: #EEEEEE; border-style: groove; text-align: left ;" class="col-lg-10 col-lg-offset-2 gallery">
                <div class="form-group">
                    <label>
                        <p>MESSAGE:</p> <?php echo $mensaje; ?>
                    </label>
                    <br>
                    <?php
                    $ob->extraer_usuario($id_emisor);
                    ?>
                </div>
            </div>
<?php
        }

    }
}
