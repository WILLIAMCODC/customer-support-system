const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const PORT = 3000;

// Datos de usuarios (simulados, para este ejemplo)
let users = [];

// Middleware para analizar el cuerpo de las solicitudes
app.use(bodyParser.json());

// Ruta para registro de usuarios
app.post('/registro', (req, res) => {
  const { username, password } = req.body;
  
  // Verificar si el usuario ya existe
  const userExists = users.some(user => user.username === username);
  if (userExists) {
    return res.status(400).json({ message: 'El usuario ya existe' });
  }

  // Crear nuevo usuario
  const newUser = { username, password };
  users.push(newUser);
  res.status(201).json({ message: 'Usuario registrado exitosamente' });
});

// Ruta para inicio de sesión
app.post('/login', (req, res) => {
  const { username, password } = req.body;
  
  // Verificar si el usuario existe y las credenciales son correctas
  const user = users.find(user => user.username === username && user.password === password);
  if (!user) {
    return res.status(401).json({ message: 'Credenciales inválidas' });
  }

  res.status(200).json({ message: 'Inicio de sesión exitoso' });
});

// Iniciar el servidor
app.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
