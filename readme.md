# Sistema de Gestión de Servicios de Internet – LBNETWORK

Sistema web para la administración de clientes, planes de internet, pagos y soporte técnico. Desarrollado como proyecto del curso de Java Web en SENATI.

---

## Descripción del negocio

**Nombre:** LBNETWORK S.R.L  
**RUC:** 20611412925  
**Giro:** Telecomunicaciones – Servicio de Internet  
**Tamaño:** Pequeña empresa  

**Contexto:**  
Empresa dedicada a brindar servicio de internet residencial en hogares, ofreciendo diferentes planes según la velocidad. Realiza instalaciones, gestiona pagos mensuales y brinda soporte técnico ante fallas del servicio.

**Justificación:**  
Se necesita un sistema digital para gestionar clientes, servicios y pagos, evitando registros manuales y mejorando el control de la información.

---

## Identificación del problema y solución

**Problema:**  
La gestión de clientes, pagos y servicios se realiza de forma manual o desorganizada, lo que genera errores, pérdida de información y dificultad para el seguimiento de servicios activos y pagos.

**Solución tecnológica:**  
Desarrollar un sistema web con Java Spring Boot y MySQL que permita administrar clientes, planes, servicios, pagos y soporte técnico en tiempo real.

---

## Requerimientos Funcionales

| Código | Descripción |
|---|---|
| RF01 | El sistema debe registrar clientes nuevos |
| RF02 | El sistema debe guardar los datos personales del cliente |
| RF03 | El sistema debe registrar los planes de internet disponibles |
| RF04 | El sistema debe asignar un plan de internet a un cliente |
| RF05 | El sistema debe registrar la instalación del servicio en el domicilio del cliente |
| RF06 | El sistema debe registrar los pagos mensuales del servicio |
| RF07 | El sistema debe consultar el historial de pagos de los clientes |
| RF08 | El sistema debe registrar solicitudes de soporte técnico |
| RF09 | El sistema debe mostrar los servicios activos de los clientes |
| RF10 | El sistema debe generar reportes de clientes y pagos |

---

## Requerimientos No Funcionales

| Código | Tipo | Descripción |
|---|---|---|
| RNF01 | Seguridad | Acceso mediante usuario y contraseña |
| RNF02 | Seguridad | Protección de datos de clientes |
| RNF03 | Rendimiento | Tiempo de respuesta menor a 5 segundos |
| RNF04 | Acceso | Solo personal autorizado |
| RNF05 | Respaldo | Copias de seguridad de la base de datos |
| RNF06 | Usabilidad | Interfaz fácil de usar |
| RNF07 | Disponibilidad | Sistema disponible para consultas administrativas |

---


## Base de Datos

El sistema cuenta con 5 tablas principales:

| Tabla | Descripción |
|---|---|
| CLIENTE | Información de los clientes |
| PLAN | Planes de internet |
| SERVICIO | Servicios contratados |
| PAGO | Registro de pagos |
| SOPORTE_TECNICO | Registro de incidencias |

---
 
### Dagrama Entidad Relacion (DER)
![Diagrama Entidad Relacion](https://github.com/emiaj0978/LBNETWORK/blob/main/frontend/image%20copy%203.png)

### Modelo Relacional (MR)
![Modelo Relacional](https://github.com/emiaj0978/LBNETWORK/blob/main/frontend/image%20copy%202.png)

---

### Script de Base de Datos

```sql
CREATE DATABASE sistema_servicios;
USE sistema_servicios;

-- CLIENTE
CREATE TABLE CLIENTE (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    ruc VARCHAR(20),
    telefono VARCHAR(15),
    direccion TEXT
);

-- PLAN
CREATE TABLE PLAN (
    id_plan INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    velocidad VARCHAR(20),
    precio DECIMAL(10,2)
);

-- SERVICIO
CREATE TABLE SERVICIO (
    id_servicio INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    id_plan INT,
    fecha_instalacion DATE,
    estado VARCHAR(20),
    FOREIGN KEY (id_cliente) REFERENCES CLIENTE(id_cliente),
    FOREIGN KEY (id_plan) REFERENCES PLAN(id_plan)
);

-- PAGO
CREATE TABLE PAGO (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    id_servicio INT,
    fecha_pago DATE,
    monto DECIMAL(10,2),
    FOREIGN KEY (id_servicio) REFERENCES SERVICIO(id_servicio)
);

-- USUARIO
CREATE TABLE USUARIO (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    rol VARCHAR(20)
);

-- EMPLEADO
CREATE TABLE EMPLEADO (
    id_empleado INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    FOREIGN KEY (id_usuario) REFERENCES USUARIO(id_usuario)
);

-- ASISTENCIA
CREATE TABLE ASISTENCIA (
    id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
    id_empleado INT,
    fecha DATE,
    hora_entrada TIME,
    hora_salida TIME,
    estado VARCHAR(20),
    FOREIGN KEY (id_empleado) REFERENCES EMPLEADO(id_empleado)
);
INSERT INTO usuario (username, password, rol)
VALUES ('admin', '1234', 'admin');

INSERT INTO CLIENTE (nombre, apellido, ruc, telefono, direccion) VALUES
('Juan', 'Pérez', '12345678', '900111111', 'Av. Perú 123'),
('María', 'Gómez', '87654321', '900222222', 'Jr. Lima 456');

INSERT INTO PLAN (nombre, velocidad, precio) VALUES
('Hogar', '30 Mbps', 45.00),
('Premium', '100 Mbps', 80.00);

INSERT INTO SERVICIO (id_cliente, id_plan, fecha_instalacion, estado) VALUES
(1, 1, '2024-01-10', 'activo'),
(2, 2, '2024-01-12', 'activo');
ALTER TABLE EMPLEADO 
ADD dni VARCHAR(15),
ADD celular VARCHAR(15),
ADD cargo VARCHAR(50),
ADD fecha_registro DATE;

-- Usuario para el empleado
INSERT INTO USUARIO (username, password, rol)
VALUES ('empleado1', '1234', 'empleado');

-- Empleado completo
INSERT INTO EMPLEADO 
(id_usuario, nombre, apellido, dni, celular, cargo, fecha_registro)
VALUES 
(1, 'Carlos', 'Lopez', '12345678', '987654321', 'Vendedor', CURDATE());

-- Otro ejemplo
INSERT INTO USUARIO (username, password, rol)
VALUES ('empleado2', '1234', 'empleado');

INSERT INTO EMPLEADO 
(id_usuario, nombre, apellido, dni, celular, cargo, fecha_registro)
VALUES 
(2, 'Ana', 'Torres', '87654321', '912345678', 'Administrador', CURDATE());

---
 
### Imagenes del problema
![imagenes del problema]()

### Imagenes del negocio 
![imagenes del negocio](https://github.com/DanielBarbaran/Proyecto2LBNetwork/blob/main/img/image.png)

---
