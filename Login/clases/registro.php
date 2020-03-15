<?php

class clsRegistro
{
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function ingresar_usuario(): bool
    {
        if (isset($_POST['registrar'])) {

            $name=$_REQUEST['name'];
            $email=$_REQUEST['email'];
            $pass=$_REQUEST['password'];
            $tipo='cliente';

            $conn = mysqli_connect("database", "root", "", "DBTienda");
            var_dump($conn);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            else{
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
