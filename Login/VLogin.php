<?php
class VLogin
{
    protected $request;
    
    public function __construct($request)
    {
        $this->request = $request;
    }
    private function conexion():mysqli
    {
        $conn = mysqli_connect("database", "root", "", "DBTienda");

        if (!$conn) {
         return die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
    public function verificar(): bool
    {

        $email = $_POST['email'] ?? null;
        $password = $_POST['pass'] ?? null;
        if ($email == 'joseph.rd09@gmail.com' && $password == '1234') {
            return  false;
        } else {
            return true;
            header('Location: index.php');
        }
    }
}
