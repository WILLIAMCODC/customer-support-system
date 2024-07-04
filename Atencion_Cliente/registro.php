

<?php
require_once("config/conexion.php");

if (isset($_POST["enviar"]) && $_POST["enviar"] == "si") {
    require_once("models/Registro.php");
    $usu_nom = $_POST['usu_nom'];
    $usu_ape = $_POST['usu_ape'];
    $usu_correo = $_POST['usu_correo'];
    $usu_pass = $_POST['usu_pass'];

    $usuario = new Usuario();
    // Aquí debes pasar las variables correctas a la función register
    $usuario->register($usu_nom,  $usu_ape, $usu_correo,  $usu_pass);
}
?>









<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Registrarse</title>

    <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="img/favicon.png" rel="icon" type="image/png">
    <link href="img/favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">

    <style>
        .btn-sign-up {
            background-color: blue;
            border-color: blue;
        }
    </style>
</head>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" method="POST" action="Registro.php">
                    <div class="sign-avatar no-photo">&plus;</div>
                    <header class="sign-title">Registrarse</header>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nombre" id="usu_nom" name="usu_nom" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Apellido" id="usu_ape" name="usu_ape" required/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Correo" id="usu_correo" name="usu_correo" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Contrasena" id="usu_pass" name="usu_pass" required/>
                    </div>
                    <input type="hidden" name="enviar" value="si"> 
                    <button type="submit" class="btn btn-rounded">Registrarse</button>
                    <p class="sign-note">¿Ya tienes una cuenta? <a href="index.php">Iniciar Sesion</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="public/js/lib/jquery/jquery.min.js"></script>
    <script src="public/js/lib/tether/tether.min.js"></script>
    <script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
    <script src="public/js/app.js"></script>
</body>
</html>
