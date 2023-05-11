
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-center">
                SIMULADOR EN PROCESO
            </a>
        </div>
    </nav>

    <hr>
    <div style='width:100%;display:flex;justify-content:center;align-items:center;margin-top:10px;'>
        <h5 style='width:90%;height:60px;'><div height='10' style='margin-right:10px;' class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div>Listado de Autores -> Puedes Administrarlos</h5>
    </div>

<?php 
    function conectar(){
        $xc = mysqli_connect('localhost',"root","","laboratorio07");
        return $xc;
    }

    function desconectar($xc){
        mysqli_close($xc);
    }


    $xc = conectar();
    $sql = "SELECT * FROM autores Where estado = 1";
    $res = mysqli_query($xc,$sql);
    desconectar($xc);
    $num = 1;
    echo "<div style='width:100%;display:flex;justify-content:center;'>";
    echo "<table style='width:90%;' class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Nombre</th>";
    echo "<th scope='col'>Apellidos</th>";
    echo "<th scope='col'>Acciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($filas=mysqli_fetch_array($res))
    {
        $nombre = $filas['nombre'];
        $apellido_paterno = $filas['apellido_paterno'];
        $apellido_materno = $filas['apellido_materno'];
        echo " <tr>";
        echo "<th scope='row'>".$num."</th>";
        echo "<td>".$nombre."</td>";
        echo "<td>".$apellido_paterno." ".$apellido_materno."</td>";
        echo "<td><button id='doc".$num."' style='margin-right:10px;' class='btn btn-success' onclick='abrirFormulario(".$num.")'>Editar</button><button id='doc".$num."' style='margin-right:10px;' class='btn btn-danger' onclick ='eliminar_autor(".$num.")'>Eliminar</a></button>";
        echo "</tr>";
        $num++;
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
?>
    <div style='display:flex;'>
        <button style='margin-left:60px;' onclick='recargar_page()' type="button" class="btn btn-primary">Recargar Tabla</button>
        <button style='margin-left:10px;' class='btn btn-warning' onclick='abrirFormulario_agregar()'>+ Autor</button>
    </div>

    <hr>
    
    
    
    <div style='width:100%;height:60px;background-color:#ccc;'></div>
    <hr>
    <div style='width:100%;display:flex;justify-content:center;align-items:center;margin-top:10px;'>
        <h5 style='width:90%;height:60px;'><div height='10' style='margin-right:10px;' class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>Listado de Libros -> Puedes vincularlos con Autores -> Agrega tus libros preferidos</h5>
    </div>

<?php 

    $xc = conectar();
    $sql = "SELECT * FROM libros 
            INNER JOIN autores ON (autores.autor_id = libros.id_autor)
            WHERE libros.estado = 1";
    $res = mysqli_query($xc,$sql);
    desconectar($xc);
    $num = 1;
    echo "<div style='width:100%;display:flex;justify-content:center;'>";
    echo "<table style='width:90%;' class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Autor</th>";
    echo "<th scope='col'>Titulo</th>";
    echo "<th scope='col'>Año</th>";
    echo "<th scope='col'>Libro Digital</th>";
    echo "<th scope='col'>Especialidad</th>";
    echo "<th scope='col'>Editorial</th>";
    echo "<th scope='col'>Acciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while($filas=mysqli_fetch_array($res))
    {
        $nombre = $filas['nombre'];
        $apellido_paterno = $filas['apellido_paterno'];
        $apellido_materno = $filas['apellido_materno'];
        $titulo = $filas['titulo'];
        $anio = $filas['anio'];
        $url_ubicacion = $filas['url_ubicacion'];
        $especialidad = $filas['especialidad'];
        $editorial = $filas['editorial'];
        echo " <tr>";
        echo "<th scope='row'>".$num."</th>";
        echo "<th scope='row'>".$nombre." ".$apellido_paterno." ".$apellido_materno."</th>";
        echo "<td>".$titulo."</td>";
        echo "<td>".$anio."</td>";
        echo "<td><a style='margin-right:10px;background:purple;border:2px solid purple;color:#fff;' class='btn' target='_blank' href='".$url_ubicacion."'>Leer Libro</a></td>";
        echo "<td>".$especialidad."</td>";
        echo "<td>".$editorial."</td>";
        echo "<td><button id='doc".$num."' style='margin-right:10px;' class='btn btn-success' onclick='abrirFormulario_libros(".$num.")'>Editar</button><button id='doc".$num."' style='margin-right:10px;' class='btn btn-danger' onclick ='eliminar_libro(".$num.")'>Eliminar</a></button>";
        echo "</tr>";
        $num++;
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
?>
    <div style='display:flex;'>
        <button style='margin-left:60px;' onclick='recargar_page_libro()' type="button" class="btn btn-primary">Recargar Tabla</button>
        <button style='margin-left:10px;' class='btn btn-warning' onclick='abrirFormulario_agregar_libro()'>+ Libro</button>
    </div>

    <hr>



</body>
<script>
    
    function eliminar_libro(x){
        var id = x;
        let xhr = new XMLHttpRequest();
        console.log(id);
        xhr.open("POST", "../administracion_libros/eliminar_libro.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        location.reload();
    }

    function abrirFormulario_libros(x) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../administracion_libros/form_editar_libro.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + x);
        var ventana = window.open("../administracion_libros/form_editar_libro.php?x=" + x, "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
    }
    
    function abrirFormulario_agregar_libro() {
        let xhr = new XMLHttpRequest();
        var ventana = window.open("../administracion_libros/form_new_libro.php", "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
    }
    
    function recargar_page_libro(){
        location.reload();
    }
    
    function eliminar_autor(x){
        var id = x;
        let xhr = new XMLHttpRequest();
        console.log(id);
        xhr.open("POST", "eliminar_autor.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        location.reload();
    }

    function abrirFormulario(x) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "formulario_editar_autores.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + x);
        var ventana = window.open("formulario_editar_autores.php?x=" + x, "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
    }   
    
    function abrirFormulario_agregar() {
        let xhr = new XMLHttpRequest();
        var ventana = window.open("formulario_news_autor.php", "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
    }
    
    function recargar_page(){
        location.reload();
    }
</script>
<style>

</style>
</html>
