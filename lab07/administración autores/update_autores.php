<?php 
    if(isset($_POST["nombre"]) && isset($_POST["apellido_paterno"]) && isset($_POST["apellido_materno"])&& isset($_POST["id"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio07");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido_paterno = $_POST["apellido_paterno"];
        $apellido_materno = $_POST["apellido_materno"];

        $sql ="UPDATE autores SET nombre='$nombre',apellido_paterno='$apellido_paterno',apellido_materno='$apellido_materno' WHERE autor_id='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "-El autor ha sido editado correctamente.<br>-Puedes cerrar la ventana estimado usuario.<br>-Puedes recargar la Tabla";
          } else {
            echo "Ha ocurrido un error al intentar editado el autor.";
          }

          
        desconectar($xc);
    }
?>