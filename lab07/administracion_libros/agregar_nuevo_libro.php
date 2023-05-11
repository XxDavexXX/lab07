
<?php 
    if(isset($_POST["autor"]) && isset($_POST["titulo"]) && isset($_POST["anio"]) && isset($_POST["url_ubicacion"]) && isset($_POST["especialidad"])&& isset($_POST["editorial"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio07");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $autor = $_POST["autor"];
        $titulo = $_POST["titulo"];
        $anio = $_POST["anio"];
        $url_ubicacion = $_POST["url_ubicacion"];
        $especialidad = $_POST["especialidad"];
        $editorial = $_POST["editorial"];

        $sql ="INSERT INTO libros (id_autor, titulo, anio, url_ubicacion,especialidad,editorial) VALUES ('$autor','$titulo','$anio', '$url_ubicacion', '$especialidad', '$editorial')";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "-Se ah agregado el nuevo Libro con exito.<br>-Puedes cerrar la ventana.<br>-Refresca la tabla.";

          } else {
            echo "Ha ocurrido un error al intentar eliminar el libro.";
          }

          
        desconectar($xc);
    }
?>
