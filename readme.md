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

-- Tabla CLIENTE
CREATE TABLE CLIENTE (
    id_cliente INT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    ruc VARCHAR(20),
    telefono VARCHAR(15),
    direccion TEXT
);

-- Tabla PLAN
CREATE TABLE PLAN (
    id_plan INT PRIMARY KEY,
    nombre VARCHAR(50),
    velocidad VARCHAR(20),
    precio DECIMAL(10,2)
);

-- Tabla SERVICIO
CREATE TABLE SERVICIO (
    id_servicio INT PRIMARY KEY,
    id_cliente INT,
    id_plan INT,
    fecha_instalacion DATE,
    estado VARCHAR(20)
);

-- Tabla PAGO
CREATE TABLE PAGO (
    id_pago INT PRIMARY KEY,
    id_servicio INT,
    fecha_pago DATE,
    monto DECIMAL(10,2)
);

-- Tabla SOPORTE_TECNICO
CREATE TABLE SOPORTE_TECNICO (
    id_soporte INT PRIMARY KEY,
    id_servicio INT,
    fecha_reporte DATETIME,
    descripcion TEXT,
    estado VARCHAR(20)
);


INSERT INTO CLIENTE VALUES
(1, 'Juan', 'Pérez', '12345678', '900111111', 'Av. Perú 123'),
(2, 'María', 'Gómez', '87654321', '900222222', 'Jr. Lima 456'),
(3, 'Carlos', 'López', '11223344', '900333333', 'Calle Arequipa 789'),
(4, 'Ana', 'Torres', '22334455', '900444444', 'Av. Amazonas 321'),
(5, 'Luis', 'Ramírez', '33445566', '900555555', 'Jr. Los Olivos 654');

INSERT INTO PLAN VALUES
(1, 'Básico', '10 Mbps', 30.00),
(2, 'Hogar', '30 Mbps', 45.00),
(3, 'Premium', '100 Mbps', 80.00),
(4, 'Ultra', '200 Mbps', 120.00);

INSERT INTO SERVICIO VALUES
(1, 1, 2, '2024-01-10', 'activo'),
(2, 2, 3, '2024-01-12', 'activo'),
(3, 3, 1, '2024-01-15', 'suspendido'),
(4, 4, 4, '2024-02-01', 'activo'),
(5, 5, 3, '2024-02-05', 'activo');

INSERT INTO PAGO VALUES
(1, 1, '2024-02-01', 45.00),
(2, 2, '2024-02-02', 80.00),
(3, 3, '2024-02-03', 30.00),
(4, 4, '2024-03-01', 120.00),
(5, 5, '2024-03-02', 80.00),
(6, 6, '2024-04-01', 120.00);

INSERT INTO SOPORTE_TECNICO VALUES
(1, 1, '2024-02-10 08:30:00', 'Conexión intermitente', 'pendiente'),
(2, 1, '2024-02-10 12:00:00', 'Conexión intermitente', 'en_proceso'),
(3, 1, '2024-02-11 09:15:00', 'Conexión intermitente', 'resuelto'),
(4, 2, '2024-02-12 10:00:00', 'Internet lento', 'pendiente'),
(5, 2, '2024-02-12 15:30:00', 'Internet lento', 'en_proceso'),
(6, 2, '2024-02-13 11:00:00', 'Internet lento', 'resuelto'),
(7, 4, '2024-03-01 11:20:00', 'Router dañado', 'pendiente'),
(8, 4, '2024-03-01 16:00:00', 'Router dañado', 'en_proceso'),
(9, 5, '2024-03-03 14:10:00', 'Cortes de señal', 'pendiente'),
(10, 5, '2024-03-04 09:00:00', 'Cortes de señal', 'resuelto');
```

---
 
### Imagenes del problema
![Diagrama Entidad Relacion]()

### Imagenes del negocio 
![Modelo Relacional](https://github.com/DanielBarbaran/Proyecto2LBNetwork/blob/main/img/image.png)

---