<?php 
    if(isset($_POST["id_autor"]) && isset($_POST["libro_id"]) && isset($_POST["titulo"]) && isset($_POST["anio"]) && isset($_POST["url_ubicacion"]) && isset($_POST["especialidad"]) && isset($_POST["editorial"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","laboratorio07");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $id = $_POST["libro_id"];
        $id_autor = $_POST["id_autor"];
        $titulo = $_POST["titulo"];
        $anio = $_POST["anio"];
        $url_ubicacion = $_POST["url_ubicacion"];
        $especialidad = $_POST["especialidad"];
        $editorial = $_POST["editorial"];

        $sql ="UPDATE libros SET id_autor='$id_autor',titulo='$titulo',anio='$anio',url_ubicacion='$url_ubicacion',especialidad='$especialidad',editorial='$editorial' WHERE libro_id='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "-El Libro ha sido editado correctamente.<br>-Puedes cerrar la ventana estimado usuario.<br>-Puedes recargar la Tabla";
          } else {
            echo "Ha ocurrido un error al intentar editado el Libro.";
          }

          
        desconectar($xc);
    }
?>