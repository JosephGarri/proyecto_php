<?php
class clstipos
{


    protected $request;
   protected $conn;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function conexion(){
        $this->conn = mysqli_connect("database", "root", "", "DBTienda");
    
        if (!$this->conn) {
          die("Connection failed: " . mysqli_connect_error());
        } 
      }
    public function extraer_tipo()
    {
        
      $this->conexion();
        $consulta = "SELECT * FROM tipos";
        $ejecutar = mysqli_query($this->conn, $consulta);
        $i=0;
        while ($datos = mysqli_fetch_array($ejecutar)) {
            $id = $datos['id'];
            $descripcion = $datos['descripcion'];
            $i++;
            ?>
           <option value=<?php echo $id;?>><?php echo $descripcion;?></option>
           <?php
        }
   

    }
    public function extraer_tipo_seleccionado($id_tipo)
    {
        
      $this->conexion();
        $consulta = "SELECT * FROM tipos";
        $ejecutar = mysqli_query($this->conn, $consulta);
        $i=0;
        while ($datos = mysqli_fetch_array($ejecutar)) {
            $id = $datos['id'];
            $descripcion = $datos['descripcion'];
            $i++;
            ?>
           <option value="<?php echo $id;?>" <?php if($id==$id_tipo){?>selected <?php  } ?>><?php echo $descripcion;?></option>
           <?php
        }
   

    }
}
?>