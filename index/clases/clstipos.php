<?php
require "/app/Login/clases/VLogin.php";

class clstipos
{


    protected $request;
    public $ejecutar;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function extraer_tipo(): array
    {
        $objeto = new Vlogin($this->request);
        $objeto->conexion();
        $consulta = "SELECT * FROM tipos";
        $this->ejecutar = mysqli_query($objeto->conn, $consulta);
        $fila = mysqli_fetch_array( $this->ejecutar);

        return $fila;
    }
}
