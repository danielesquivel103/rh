-- Create the database (if not exists)
CREATE DATABASE IF NOT EXISTS contratos_db;

-- Use the database
USE contratos_db;

-- Create the empleados table
CREATE TABLE IF NOT EXISTS empleados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  puesto VARCHAR(100) NOT NULL,
  fecha_contratacion DATE NOT NULL
);

-- Create the solicitudes table
CREATE TABLE IF NOT EXISTS solicitudes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  puesto VARCHAR(100) NOT NULL,
  descripcion TEXT NOT NULL,
  estado VARCHAR(50) NOT NULL,
  fecha_solicitud DATE NOT NULL
);

-- Create the usuarios table for authentication
CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  rol VARCHAR(50) NOT NULL
);

-- Optional: Add some sample data
INSERT INTO empleados (nombre, apellido, email, puesto, fecha_contratacion)
VALUES 
  ('Juan', 'Pérez', 'juan.perez@example.com', 'Desarrollador', '2023-01-15'),
  ('María', 'García', 'maria.garcia@example.com', 'Diseñadora', '2023-02-01');

INSERT INTO solicitudes (puesto, descripcion, estado, fecha_solicitud)
VALUES 
  ('Gerente de Proyecto', 'Se busca gerente con 5 años de experiencia', 'Abierta', '2023-05-01'),
  ('Desarrollador Frontend', 'Experiencia en React y Vue.js', 'En revisión', '2023-05-05');

-- Insert a sample user (password is 'admin123' - in a real scenario, use password_hash())
INSERT INTO usuarios (username, password, nombre, rol)
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrador', 'admin');