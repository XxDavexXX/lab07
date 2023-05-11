<?php 
    if(isset($_POST["id"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio07");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $id = $_POST["id"];
        $sql ="UPDATE libros SET estado=0 WHERE id_autor='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "El Libro ha sido eliminado correctamente.";
          } else {
            echo "Ha ocurrido un error al intentar eliminar el Libro.";
          }

          
        desconectar($xc);
    }
?>