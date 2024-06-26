<?php

include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $consulta = "SELECT id_usuario FROM usuarios";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $id_usuario = $fila['id_usuario'];
    } else {
       
        die('Error en la consulta');
    }

    $nombre_gacha = $_POST['nombre_gacha'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $mensaje = $_POST['mensaje'];

    $query = "INSERT INTO formulario (nombre_gacha, nombre_usuario, mensaje, id_usuario) 
              VALUES('$nombre_gacha', '$nombre_usuario', '$mensaje', '$id_usuario')";

   
    if (mysqli_query($conexion, $query)) {
        
        header("location: ../pagina_principal.php");
        exit(); 
    } 
}

// Cerrar la conexión
mysqli_close($conexion);

?>

