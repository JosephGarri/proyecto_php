<?php
 require "/app/Login/clases/VLogin.php";
class clsProductos{
public $id_producto=0;
protected $request;
public $ejecutar;

public function __construct($request)
{
    $this->request=$request;
}
public function extraer_ultimo(){
    $objeto = new Vlogin($this->request);
    $objeto->conexion();

    $consulta = "SELECT MAX(id) FROM productos LIMIT 1";
    $ejecutar_consulta = mysqli_query($objeto->conn,$consulta);
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
           
    
            if($name==""||$descripcion_breve==""||$descripcion==""||$precio==""||$tipo=="null"||$img==""){
                $_POST['vacios']=true;
                return false;
            }
            else{
                 if(move_uploaded_file($_FILES['img']['tmp_name'], $img)){
                $insertar_producto = "INSERT INTO productos(nombre,descripcion_breve,descripcion,tipo,url_imagen,precio,id_creador) VALUES('$name','$descripcion_breve','$descripcion','$tipo','$img','$precio','$id_registrado')";
                $ejecutar_producto =  mysqli_query($objeto->conn, $insertar_producto);

                $this->extraer_ultimo();
               $ultimo=intval($this->id_producto);
         
                $insertar_fecha="INSERT INTO fechas(fecha_creacion,fecha_modificacion,id_producto) VALUES(CURRENT_TIME(),CURRENT_TIME(),'$ultimo')";
                $ejecutar_fecha =  mysqli_query($objeto->conn, $insertar_fecha);


                
                if ($ejecutar_producto==true && $ejecutar_fecha==true) {
                    return true;
                } else {
                    return false;
                }
                }else{
                    echo "someting went wrong.\n"; 
                }
            }
           
               
        }catch(Exception $e){
            var_dump($e);
        }
      
    }

    public function extraer_productos():array{
        
        $objeto = new Vlogin($this->request);
        $objeto->conexion();
    
        $consulta ="SELECT * FROM productos";
        $this->ejecutar = mysqli_query($objeto->conn, $consulta);
        $fila = mysqli_fetch_array($this->ejecutar);
        

        if($fila==null){
            return [];
        }

        return $fila;
    
    }
    
    public function extraer_mis_productos($id_registrado):array{
        $objeto = new Vlogin($this->request);
        $objeto->conexion();

        $consulta ="SELECT id, nombre, descripcion_breve, url_imagen, precio FROM productos WHERE id_creador='$id_registrado' ";
        $this->ejecutar = mysqli_query($objeto->conn, $consulta);
        $fila = mysqli_fetch_array($this->ejecutar);
        if($fila==null){
            return [];
        }
        return $fila;

    }


    public function extraer_productos_edit($id_producto):array{
        $objeto = new Vlogin($this->request);
        $objeto->conexion();

        $consulta ="SELECT id, nombre, descripcion_breve, descripcion, url_imagen, precio FROM productos WHERE id='$id_producto' ";
        $this->ejecutar = mysqli_query($objeto->conn, $consulta);
        $fila = mysqli_fetch_array($this->ejecutar);
        if($fila==null){
            return [];
        }
        return $fila;

    }
}
