<?php
 
class clsRegistro
{
    protected $request;
    public $conn;
    public function __construct($request)
    {
        $this->request = $request;
    }
   
    public function ingresar_usuario(): bool
    {
       
            $name=$_REQUEST['name'];
            $email=$_REQUEST['email'];
            $pass=$_REQUEST['pass1'];
            $tipo='cliente';

            $conn = mysqli_connect("database", "root", "", "DBTienda");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            else{
                $consulta = "SELECT * FROM users WHERE email='$email'";
                $ejecutar = mysqli_query($conn, $consulta);
        
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
                    $ejecutar =  mysqli_query($conn, $insertar);
                    if ($ejecutar) {
                        return true;
                    } else {
                        return false;
                    }
                    
                }


             
            }

           
        
    }
    
}
