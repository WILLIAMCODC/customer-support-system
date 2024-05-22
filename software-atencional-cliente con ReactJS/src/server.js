import express from 'express';
const express = require('express');
const app = express();

app.get('/', (req, res) => {
  res.send('Prueba 1 respuesta servidor');
});

app.listen(3009);
