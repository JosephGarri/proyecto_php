<?php
 require "Vlogin.php";
class clsRegistro
{
    protected $request;
    public $objeto = new Vlogin($_POST);


    public function __construct($request)
    {
        $this->request = $request;
    }
   
    public function ingresar_usuario(): bool
    {
    $this->objeto->conexion();

            $name=$_REQUEST['name'];
            $email=$_REQUEST['email'];
            $pass=$_REQUEST['pass1'];
            $tipo='cliente';

                $consulta = "SELECT * FROM users WHERE email='$email'";
                $ejecutar = mysqli_query($this->objeto->conn, $consulta);
        
                $i = 0;
                $BDemail=null;
                while ($fila = mysqli_fetch_array($ejecutar)) {
                
                    $BDemail = $fila['email'];
        
                    $i++;
                        }
                //   var_dump($ejecutar);
                if ($email==$BDemail) {
                    $_REQUEST['email_existe']=true;
                    return false;
                } else {
                    $insertar = "INSERT INTO users(name, email,password,tipo) VALUES('$name','$email','$pass','$tipo')";
                    $ejecutar =  mysqli_query($this->objeto->conn, $insertar);
                    if ($ejecutar) {
                        return true;
                    } else {
                        return false;
                    }
                    
                }


             
            

           
        
    }
    
}
