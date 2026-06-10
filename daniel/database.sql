CREATE DATABASE IF NOT EXISTS daniel_wifi;
USE daniel_wifi;

CREATE TABLE usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre_usuario VARCHAR(120) NOT NULL UNIQUE,
  clave VARCHAR(255) NOT NULL,
  roles ENUM('admin','superadmin') DEFAULT 'admin'
);

CREATE TABLE paquete (
  id_paquete INT AUTO_INCREMENT PRIMARY KEY,
  nombre_paquete VARCHAR(80) NOT NULL,
  duracion VARCHAR(80) NOT NULL,
  precio DECIMAL(10,2) NOT NULL
);

CREATE TABLE cliente (
  id_cliente INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(120) NOT NULL,
  documento VARCHAR(20) NOT NULL UNIQUE,
  telefono VARCHAR(30)
);

CREATE TABLE venta (
  id_venta INT AUTO_INCREMENT PRIMARY KEY,
  fecha_venta DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  id_cliente INT NOT NULL,
  id_paquete INT NOT NULL,
  usuario_registro INT NOT NULL,
  codigo_cupon VARCHAR(80) NOT NULL,
  estado ENUM('vendido','activo','vencido') DEFAULT 'vendido',
  FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente) ON DELETE CASCADE,
  FOREIGN KEY (id_paquete) REFERENCES paquete(id_paquete) ON DELETE CASCADE,
  FOREIGN KEY (usuario_registro) REFERENCES usuario(id_usuario) ON DELETE CASCADE
);

INSERT INTO usuario (nombre_usuario, clave, roles) VALUES
('admin', 'admin', 'superadmin');

INSERT INTO paquete (nombre_paquete, duracion, precio) VALUES
('30Minutos', '30 minutos', 1.00),
('1Hora', '1 hora', 2.00),
('2Horas', '2 horas', 4.00),
('3Dias', '3 días', 9.00),
('30Dias', '30 días', 80.00);

INSERT INTO cliente (nombre, documento, telefono) VALUES
('Juan Perez', '12345678', '987654321'),
('Maria Torres', '87654321', '912345678'),
('Carlos Rojas', '45678912', '933221144');

INSERT INTO venta (id_cliente, id_paquete, usuario_registro, codigo_cupon, estado) VALUES
(1, 1, 1, 'DANIEL123', 'vendido'),
(2, 2, 1, 'WIFI456', 'activo'),
(3, 3, 1, 'LB789', 'vencido');
