<?php
   require_once("../../config/conexion.php");
   session_start();
   session_destroy();
   
   $conectar = new Conectar();
   header("Location:".$conectar->ruta()."index.php");
   exit();
?>
