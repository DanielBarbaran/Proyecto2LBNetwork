# LBNETWORK PERU SRL
Aplicación web para el registro y gestión de ventas de paquetes de internet Wifi, desarrollada en **PHP puro con arquitectura MVC desde cero**, **programación orientada a objetos**, **PDO** y **MariaDB / MySQL** como base de datos.

## Problemática
El registro de ventas para clientes suele realizarse de manera poco organizada, lo que dificulta llevar un control claro de los paquetes vendidos, los clientes atendidos y los códigos entregados. Esta falta de orden puede generar errores en el cobro, duplicidad de registros, pérdida de información y un manejo ineficiente del servicio, especialmente cuando hay alta demanda. Además, al no contar con una herramienta visual e intuitiva, el proceso puede volverse confuso tanto para el personal como para los clientes.

## Solución
Desarrollar una plataforma web orientada al registro de la venta de paquetes para clientes, permitiendo un mejor manejo y control de cada transacción realizada. El sistema ofrece una interfaz intuitiva y responsive, facilitando la navegación desde distintos dispositivos y mejorando la experiencia de uso. Con ello, se podrá registrar de forma ordenada cada venta, consultar los paquetes disponibles, administrar clientes y controlar los usuarios que registran la información.

## Alcance
- Login y cierre de sesión
- Dashboard con resumen general
- CRUD de paquetes
- CRUD de clientes
- CRUD de usuarios
- Registro de ventas
- Landing page informativa
- Tabla de paquetes, duración y precios

## Stack
| Capa | Tecnología |
|---|---|
| Backend | PHP 8+ |
| Base de datos | MariaDB / MySQL |
| Frontend | HTML5, CSS3, JavaScript, Bootstrap |
| Iconos | Font Awesome |
| Fuente | Poppins |
| Arquitectura | MVC desde cero |

## Arquitectura
El proyecto está organizado bajo el patrón **MVC**:

- `Controllers` procesan las peticiones
- `Models` se conectan a la base de datos
- `Views` muestran la interfaz al usuario

La navegación se maneja con sesiones PHP para proteger las rutas privadas del panel administrativo.

## Flujo del sistema
1. El usuario ingresa a la landing page o al login
2. El sistema valida credenciales
3. Si la sesión es correcta, se redirige al dashboard
4. Desde el panel se administran paquetes, clientes, usuarios y ventas
5. Al cerrar sesión, se elimina la sesión y se redirige a la página principal

## Estructura del proyecto
```text
daniel/
|-- app/
|   |-- config/
|   |-- controllers/
|   |-- core/
|   |-- models/
|   |-- views/
|-- public/
|   |-- css/
|   |-- js/
|   |-- img/
|   |-- video/
|-- database.sql
|-- .env
|-- README.md
```

## Base de datos
```sql
CREATE DATABASE daniel_wifi;
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
  telefono VARCHAR(30) NULL
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
```

## Datos de prueba
```sql
INSERT INTO usuario (nombre_usuario, clave, roles) VALUES
('admin', 'admin', 'superadmin');

INSERT INTO paquete (nombre_paquete, duracion, precio) VALUES
('30Minutos', '30 minutos', 1.00),
('1Hora', '1 hora', 2.00),
('2Horas', '2 horas', 4.00),
('3Dias', '3 dias', 9.00),
('30Dias', '30 dias', 80.00);

INSERT INTO cliente (nombre, documento, telefono) VALUES
('Juan Perez', '12345678', '987654321'),
('Maria Torres', '87654321', '912345678'),
('Carlos Rojas', '45678912', '933221144');

INSERT INTO venta (id_cliente, id_paquete, usuario_registro, codigo_cupon, estado) VALUES
(1, 1, 1, 'DANIEL123', 'vendido'),
(2, 2, 1, 'WIFI456', 'activo'),
(3, 3, 1, 'LB789', 'vencido');
```

## Instalación
1. Copia `.env.example` a `.env`
2. Configura `APP_URL` y los datos de base de datos
3. Crea la base `daniel_wifi`
4. Ejecuta el archivo `database.sql`
5. Abre el proyecto desde `http://localhost/daniel`

## Credenciales de acceso
- Usuario: `admin`
- Clave: `admin`

## Rutas principales
- `/` - landing page
- `/login` - inicio de sesión
- `/dashboard` - panel principal
- `/paquetes/ver` - listado de paquetes
- `/clientes/ver` - listado de clientes
- `/usuarios/ver` - listado de usuarios
- `/ventas/ver` - listado de ventas
- `/logout` - cierre de sesión
