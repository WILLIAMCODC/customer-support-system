<?php


session_start();

if(!isset($_SESSION['usuario'])){
  echo '
        <script>
            alert("Primero debes iniciar sesion");
            window.location = "index.php";
        </script>
    ';
    
    session_destroy();
    die();
    
}





?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ServicioPlusGachas</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="assets/imagenes/logo.png" alt="Logo de la Empresa">
    </div>
    <nav>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Servicios</a></li>
        <li><a href="php/cerrar_sesion.php">Cerrar Sesion </a></li>
      </ul>
    </nav>
  </header>
  <aside class="sidebar">
    <ul>
      <li><a href="#">Preguntas frecuentes</a></li>
      <li><a href=#>Nuestros juegos gachas</a></li>
      <li><a href="#"> Nuestra visión y misión </a></li>
    </ul>
  </aside>

  <main>
    <h1>Bienvenido a ServicioPlusGachas</h1>
    <p>Esta página está diseñada para ayudarte a resolver tus dudas sobre tus juegos gacha favoritos de la empresa PlusGachas. Simplemente completa el siguiente formulario con el nombre del juego gacha, tu nombre de usuario dentro el juego  y una descripción detallada de tu inquietud. Nos comprometemos a responder lo más rápido posible en la bandeja de tu correo electronico. También puedes visitar nuestra sección de preguntas frecuentes para verificar si tu duda ya ha sido resuelta.</p>
    
    <h2>Formulario</h2>
    <form id="contactForm" action="php/envio_formulario.php" method="POST">
      <label for="name">Nombre del juego gahca:</label>
      <input type="text" id="name" name="nombre_gacha" required><br><br>
      
      <label for="email">Nombre de usuario:</label>
      <input type="text" id="email" name="nombre_usuario" required><br><br>
      
      <label for="message">Mensaje:</label><br>
      <textarea id="message" name="mensaje" rows="4" required></textarea><br><br>
      
      <button type="submit">Enviar</button>
    </form>
  </main>

  <footer>
    <p>&copy; 2024 ServicioPlusGachas. Todos los derechos reservados.</p>
  </footer>

  <script src="assets/js/script_pagina_principal.js"></script>
</body>
</html>