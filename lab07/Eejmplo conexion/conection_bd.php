<?php 
    function conectar(){
        $xc = mysqli_connect('localhost',"root","","laboratorio10");
        return $xc;
    }

    function desconectar($xc){
        mysqli_close($xc);
    }

    $xc = conectar();
    $sql = "SELECT * FROM alumnos";
    $res = mysqli_query($xc,$sql);
    desconectar($xc);
    $num = 1;
    while($filas=mysqli_fetch_array($res))
    {
        $id = $filas['codigo'];
        $nombres = $filas['nombres'];
        $apellidos = $filas['apellidos'];

        echo "<tr>";
        echo "<td>". $num. "</td>";
        echo "<td>". $nombres. "</td>";
        echo "<td>". $apellidos. "</td>";
        echo "<td><a class='btn btn-success' href='/editaralumno.php?id=$id'>Editar</a><a class='btn btn-danger' href='/eliminaralumno.php?id=$id' >Eliminar</a></td>";
        echo "</tr>";

        $num++;
    }

?>