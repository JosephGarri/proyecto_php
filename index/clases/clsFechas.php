<?php
class clsFechas
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

    public function extraer_fecha($id_producto)
    {
        $this->conexion();
        $consulta = "SELECT fecha_creacion, fecha_modificacion FROM fechas WHERE id_producto='$id_producto' ";
        $ejecutar = mysqli_query($this->conn, $consulta);

        $i = 0;
        while ($fila = mysqli_fetch_array($ejecutar)) {

            $fecha_creacion = $fila['fecha_creacion'];
            $fecha_modificacion = $fila['fecha_modificacion'];

            $i++;
?>
            <div class="form-group">
                <label for="name"> Creation date: </label>
                <br>
                <label namespace="name"><?php echo $fecha_creacion; ?></label>
            </div>
            <div class="form-group">
                <label for="name"> Modification date: </label>
                <br>
                <label namespace="name"><?php echo $fecha_modificacion; ?></label>
            </div>
<?php
        }
    }
}
?>