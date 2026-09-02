CREATE DATABASE IF NOT EXISTS DBLogin;
USE DBLogin;

CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    contact VARCHAR(100),
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    rol VARCHAR(20) NOT NULL DEFAULT 'usuario'
);

INSERT INTO users
(firstname, lastname, address, contact, email, password_hash, rol)
VALUES
('Juan', 'Pérez', 'Av. Ejemplo 123', '387 555-1111',
 'juan@gmail.com', 'HASH_DE_LA_CONTRASEÑA', 'usuario'),

('María', 'Gómez', 'Calle Principal 456', '387 555-2222',
 'maria@gmail.com', 'HASH_DE_LA_CONTRASEÑA', 'usuario'),

('Pedro', 'López', 'Barrio Centro', '387 555-3333',
 'pedro@gmail.com', 'HASH_DE_LA_CONTRASEÑA', 'admin');