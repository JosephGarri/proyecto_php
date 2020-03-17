<?php
 require "/app/Login/clases/VLogin.php";
class clsProductos{

protected $request;
public function __construct($request)
{
    $this->request=$request;
}
    public function agregar():bool{
        try{
            $objeto = new Vlogin($this->request);
            $objeto->conexion();
    
            $name=$_REQUEST['name'] ?? null;
            $descripcion_breve=$_REQUEST['descripcion_breve'] ?? null;
            $descripcion=$_REQUEST['descripcion'] ?? null;
            $precio=$_REQUEST['precio'] ?? null;
            $tipo=$_REQUEST['tipo'] ?? null;
            $img= __DIR__.DIRECTORY_SEPARATOR.'imgProductos'.DIRECTORY_SEPARATOR.$_FILES['img']['name'];
            $id_creador=1;
    
            
                $insertar = "INSERT INTO productos(nombre,descripcion_breve,descripcion,tipo,url_imagen,precio,id_creador) VALUES('$name','$descripcion_breve','$descripcion','$tipo','$img','$precio','$id_creador')";
                            $ejecutar =  mysqli_query($objeto->conn, $insertar);
                            if ($ejecutar) {
                                return true;
                            } else {
                                return false;
                            }
    
        }catch(Exception $e){
            var_dump($e);
        }
      
    }
}

?>