<?php 
require_once("../../config/conexion.php");
if(isset($_SESSION["usu_id"])){
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once("../MainHead/head.php");?>
    <title>Bienvenida</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

    <div class="page-content">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Bienvenido al Software de Atención al Cliente de Juegos Gachas</h1>
                <p>Aquí puedes gestionar tus tickets de atención al cliente de forma eficiente y rápida.</p>
                <p>Envía tus consultas o problemas y realiza un seguimiento de su estado en cualquier momento.</p>
            </div>
        </div>
    </div>

    <?php require_once("../MainJs/js.php");?>
    <script type="text/javascript" src="home.js"></script>

</body>
</html>

<?php 
} else {
    header("Location: ".Conectar::ruta()."index.php");
}
?>
