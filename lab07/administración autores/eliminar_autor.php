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
        $sql ="UPDATE autores SET estado=0 WHERE autor_id='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "El actor ha sido eliminado correctamente.";
          } else {
            echo "Ha ocurrido un error al intentar eliminar el actor.";
          }

          
        desconectar($xc);
    }
?>