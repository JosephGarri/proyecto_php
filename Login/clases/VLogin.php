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
        $password = $_REQUEST['pass'] ?? null;

        $consulta = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
        $ejecutar = mysqli_query($this->conn, $consulta);

        $i = 0;
       
        $BDpassword=null;
        $BDemail=null;
        while ($fila = mysqli_fetch_array($ejecutar)) {
           $_POST['id_registrado']= $fila['id'];

            $BDpassword = $fila['password'];
            $BDemail = $fila['email'];

            $i++;
                }
        //   var_dump($ejecutar);
        if ($email==$BDemail && $password==$BDpassword) {
            return  false;

        } else {
            return true;
            
        }
         
    }
}
