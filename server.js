const express = require('express');
const cors = require('cors');
const sqlite3 = require('sqlite3').verbose();
const PDFDocument = require('pdfkit');

const app = express();
const port = process.env.PORT || 5000;

app.use(cors());
app.use(express.json());

// Conexión a la base de datos
const db = new sqlite3.Database('./database.sqlite', (err) => {
  if (err) {
    console.error('Error al conectar con la base de datos', err.message);
  } else {
    console.log('Conectado a la base de datos SQLite');
    initDatabase();
  }
});

// Inicializar la base de datos
function initDatabase() {
  db.run(`CREATE TABLE IF NOT EXISTS empleados (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT,
    apellido TEXT,
    email TEXT,
    puesto TEXT,
    fecha_contratacion DATE
  )`);

  db.run(`CREATE TABLE IF NOT EXISTS solicitudes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    puesto TEXT,
    descripcion TEXT,
    estado TEXT,
    fecha_solicitud DATE
  )`);
}

// Rutas API
app.post('/api/empleados', (req, res) => {
  const { nombre, apellido, email, puesto } = req.body;
  const fecha_contratacion = new Date().toISOString().split('T')[0];

  db.run(
    'INSERT INTO empleados (nombre, apellido, email, puesto, fecha_contratacion) VALUES (?, ?, ?, ?, ?)',
    [nombre, apellido, email, puesto, fecha_contratacion],
    function (err) {
      if (err) {
        res.status(400).json({ error: err.message });
        return;
      }
      res.status(