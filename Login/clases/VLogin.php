<?php

class VLogin
{
    protected $request;
    public $conn;
    public $id_registrado;
    
    
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
 
  
    public function verificar(): bool
    {
     
       $this->conexion();

        $email = $_REQUEST['email'] ?? null;
        $password =md5($_REQUEST['pass']) ?? null;

        $consulta = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $ejecutar = mysqli_query($this->conn, $consulta);

        $i = 0;
        while ($fila = mysqli_fetch_array($ejecutar)) {
           $_SESSION['id_usuario']= $fila['id'];
           $_SESSION['tipo_usuario']=$fila['tipo'];
            $i++;
                
        if ($password===$fila['password']) {
            return  false;
        } else {
          session_destroy();
            return true;
        }
     
        }
        if($i==0){
          return true;
          session_destroy();
        }
    }
}
