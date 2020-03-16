<?php

class VLogin
{
    protected $request;
    
    
    public function __construct($request)
    {
        $this->request = $request;
    }
  
  
    public function verificar(): bool
    {
        $conn = mysqli_connect("database", "root", "", "DBTienda");

        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        } 

        $email = $_REQUEST['email'] ?? null;
        $password = $_REQUEST['pass'] ?? null;

        $consulta = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
        $ejecutar = mysqli_query($conn, $consulta);

        $i = 0;
        $BDid =null;
        $BDpassword=null;
        $BDemail=null;
        while ($fila = mysqli_fetch_array($ejecutar)) {
            $BDid = $fila['id'];
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
