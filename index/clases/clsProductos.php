<?php
 require "/app/Login/clases/VLogin.php";
class clsProductos{
public $id_producto=0;
protected $request;
public function __construct($request)
{
    $this->request=$request;
}
public function extraer_ultimo(){
    $objeto = new Vlogin($this->request);
    $objeto->conexion();

    $consulta = "SELECT MAX(id) FROM productos LIMIT 1";
    $ejecutar_consulta = mysqli_query($objeto->conn,$consulta);
    $id_producto=0;
  
    while ($fila = mysqli_fetch_array($ejecutar_consulta)) {
      $this->id_producto=$fila['MAX(id)'];
             }
         
}
    public function agregar($id_registrado):bool{
        try{
            $objeto = new Vlogin($this->request);
            $objeto->conexion();
    
            $name=$_REQUEST['name'] ?? null;
            $descripcion_breve=$_REQUEST['descripcion_breve'] ?? null;
            $descripcion=$_REQUEST['descripcion'] ?? null;
            $precio=$_REQUEST['precio'] ?? null;
            $tipo=$_REQUEST['tipo'] ?? null;
            $img= __DIR__.DIRECTORY_SEPARATOR.'imgProductos'.DIRECTORY_SEPARATOR.$_FILES['img']['name'];
            $id_creador=$id_registrado;
    
            if(move_uploaded_file($_FILES['img']['tmp_name'], $img)){
                $insertar_producto = "INSERT INTO productos(nombre,descripcion_breve,descripcion,tipo,url_imagen,precio,id_creador) VALUES('$name','$descripcion_breve','$descripcion','$tipo','$img','$precio','$id_creador')";
                $ejecutar_producto =  mysqli_query($objeto->conn, $insertar_producto);

                $fecha_actual=parse_str(getdate());
                var_dump($fecha_actual);
                $this->extraer_ultimo();
               $ultimo=intval($this->id_producto);
         
                $insertar_fecha="INSERT INTO fechas(fecha_creacion,fecha_modificacion,id_producto) VALUES('$fecha_actual','$fecha_actual','$ultimo')";
                $ejecutar_fecha =  mysqli_query($objeto->conn, $insertar_fecha);


                
                if ($ejecutar_producto==true && $ejecutar_fecha==true) {
                    return true;
                } else {
                    return false;
                }
                }else{
                    echo "someting went wrong.\n"; 
                }
               
    
        }catch(Exception $e){
            var_dump($e);
        }
      
    }
}

?>