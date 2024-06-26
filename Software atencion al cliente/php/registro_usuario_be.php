<?php

include 'conexion_be.php';



$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

//incriptacion de contraseña
$contrasena = hash('sha512', $contrasena);

$query = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) 
         VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";



// Verificar que el correo no se repita

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

if(mysqli_num_rows($verificar_correo) > 0){
    echo '
        <script> 
        alert("Este correo ya está registrado");
        window.location = "../index.php";
        </script>
    ';
    exit();
}

// Verificar que el nombre dusuario no se repita

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
        <script> 
        alert("Este usuario ya está registrado");
        window.location = "../index.php";
        </script>
    ';
    exit();
}


$ejecutar = mysqli_query ($conexion, $query);

if ($ejecutar){
    echo '
        <script>
            alert("Usuario registrado correctamente");
            window.location = "../index.php";
        </script>
    ';
}else{
    echo '
        <script>
            alert("Usuario no registrado, porfavor verifique que los datos esten introducidos correctamente");
            window.location = "../index.php";
        </script>
    ';
}

mysqli_close($conexion);

?>