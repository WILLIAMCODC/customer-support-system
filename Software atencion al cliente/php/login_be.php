<?php
session_start();

include 'conexion_be.php';
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena_hash = hash('sha512', $contrasena);

// Consulta para verificar si el correo y la contraseña coinciden en la base de datos
$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");

if(mysqli_num_rows($validar_login) > 0 ){
    $usuario = mysqli_fetch_assoc($validar_login);
    $contrasena_bd = $usuario['contrasena'];

    // Verificar si la contraseña ingresada coincide con la contraseña almacenada (en hash)
    if (hash_equals($contrasena_bd, $contrasena_hash)) {
        $_SESSION['usuario'] = $correo;
        header("location: ../pagina_principal.php");
        exit;
    } else {
        echo '
            <script>
                alert("Contraseña incorrecta");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }
} else {
    echo '
        <script>
            alert("Correo no registrado");
            window.location = "../index.php";
        </script>
    ';
    exit;
}
?>
