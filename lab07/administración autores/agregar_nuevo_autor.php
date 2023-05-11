
<?php 
    if(isset($_POST["nombre"]) && isset($_POST["apellidop"]) && isset($_POST["apellidom"]) ) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio07");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];

        $sql ="INSERT INTO autores (nombre, apellido_paterno, apellido_materno) VALUES ('$nombre','$apellidop','$apellidom')";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "-Se ah agregado el nuevo Autor con exito.<br>-Puedes cerrar la ventana.<br>-Refresca la tabla.";

          } else {
            echo "Ha ocurrido un error al intentar eliminar el autor.";
          }

          
        desconectar($xc);
    }
?>
