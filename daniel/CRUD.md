# CRUD del Sistema

Este proyecto usa un CRUD para administrar la informacion principal del negocio de internet. CRUD significa:

- `C`reate: crear registros nuevos
- `R`ead: ver o listar registros
- `U`pdate: editar registros existentes
- `D`elete: eliminar registros

## Modulos que usan CRUD

### Paquetes
Permite registrar, ver, editar y eliminar los planes de internet.

### Clientes
Permite administrar los datos de los clientes que compran los paquetes.

### Usuarios
Permite gestionar las cuentas que ingresan al sistema.

### Ventas
Permite registrar cada venta con cliente, paquete, usuario, cupon y estado.

## Rutas importantes

### ` / `
Muestra la landing page publica del sistema.

### ` /login `
Abre el formulario de inicio de sesion.

### ` /dashboard `
Muestra el panel principal despues de iniciar sesion.

### ` /paquetes/ver `
Lista los paquetes disponibles.

### ` /paquetes/registrar `
Abre el formulario para crear un paquete nuevo.

### ` /clientes/ver `
Lista los clientes registrados.

### ` /clientes/registrar `
Abre el formulario para registrar un cliente nuevo.

### ` /usuarios/ver `
Lista los usuarios del sistema.

### ` /usuarios/registrar `
Abre el formulario para crear un usuario nuevo.

### ` /ventas/ver `
Lista las ventas registradas.

### ` /ventas/registrar `
Abre el formulario para registrar una venta nueva.

### ` /logout `
Cierra la sesion y regresa a la pagina principal.

