CREATE DATABASE IF NOT EXISTS registro_db;

USE registro_db;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    documento VARCHAR(20) NOT NULL,
    genero VARCHAR(20) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    contrasena VARCHAR(255) NOT NULL
);