import express from 'express';
import bcrypt from 'bcrypt';
import User from '../models/User.js';

const app = express();

// Ruta de Registro
app.post('/api/users/register', async (req, res) => {
  const { username, password } = req.body;

  try {
    // Verificar si el usuario ya existe
    const existingUser = await User.findOne({ username });
    if (existingUser) {
      return res.status(400).json({ message: 'El usuario ya existe' });
    }

    // Hashear la contraseña
    const hashedPassword = await bcrypt.hash(password, 10);

    // Crear un nuevo usuario
    const user = new User({ username, password: hashedPassword });
    await user.save();

    res.status(201).json({ message: 'Usuario registrado con éxito' });
  } catch (error) {
    res.status(500).json({ message: 'Error en el registro de usuario' });
    console.error(error);
  }
});

// Ruta de Inicio de Sesión
app.post('/api/users/login', async (req, res) => {
  const { username, password } = req.body;

  try {
    // Verificar si el usuario existe
    const user = await User.findOne({ username });
    if (!user) {
      return res.status(400).json({ message: 'Usuario o contraseña incorrectos' });
    }

    // Verificar la contraseña
    const isMatch = await bcrypt.compare(password, user.password);
    if (!isMatch) {
      return res.status(400).json({ message: 'Usuario o contraseña incorrectos' });
    }

    res.status(200).json({ message: 'Autenticación satisfactoria' });
  } catch (error) {
    res.status(500).json({ message: 'Error en la autenticación' });
    console.error(error);
  }
});

export default app;

