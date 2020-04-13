<?php
require "/app/Login/clases/VLogin.php";

class clstipos
{


    protected $request;
   

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function extraer_tipo()
    {
        $objeto = new Vlogin($this->request);
        $objeto->conexion();
        $consulta = "SELECT * FROM tipos";
        $ejecutar = mysqli_query($objeto->conn, $consulta);
        $i=0;
        while ($datos = mysqli_fetch_array($ejecutar)) {
            $id = $datos['id'];
            $descripcion = $datos['descripcion'];
            $i++;
            ?>
           <option value=<?php echo $id;?> selected><?php echo $descripcion;?></option>
           <?php
        }
   

    }
}
?>