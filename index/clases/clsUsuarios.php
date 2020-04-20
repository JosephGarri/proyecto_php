<?php
class clsUsuarios
{

    protected $request;
    protected $conn;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function conexion()
    {
        $this->conn = mysqli_connect("database", "root", "", "DBTienda");

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    public function extraer_usuario($id_usuario)
    {
        $this->conexion();
        $consulta = "SELECT name, email FROM users WHERE id='$id_usuario'";
        $ejecutar = mysqli_query($this->conn, $consulta);

        $i = 0;
        while ($fila = mysqli_fetch_array($ejecutar)) {

            $nombre = $fila['name'];
            $email = $fila['email'];

            $i++;
?>
            <label>
                <p>issuer name: </p> <?php echo $nombre; ?>
            </label>
            <br>
            <label>
                <p>Email: </p> <?php echo $email; ?>
            </label>

            <br>

            </div>
<?php
        }
    }
}
?>