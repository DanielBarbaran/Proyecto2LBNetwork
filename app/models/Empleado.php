<?php
require_once __DIR__ . '/../core/Database.php';

class Empleado {
    private PDO $db;

    public function __construct(){
        $this->db = Database::getConnection();
    }

    // ✅ Obtener empleados con todos los campos
    public function obtenerEmpleados(): array {
        $sql = "SELECT e.*, u.username 
                FROM EMPLEADO e
                INNER JOIN USUARIO u ON e.id_usuario = u.id_usuario";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✅ NUEVO: registrar empleado
    public function registrar($datos): bool {
        $sqlUsuario = "INSERT INTO USUARIO (username, password, rol)
                       VALUES (:username, :password, 'empleado')";

        $stmt = $this->db->prepare($sqlUsuario);
        $stmt->execute([
            'username' => $datos['username'],
            'password' => $datos['password']
        ]);

        $idUsuario = $this->db->lastInsertId();

        $sqlEmpleado = "INSERT INTO EMPLEADO 
            (id_usuario, nombre, apellido, dni, celular, cargo, fecha_registro)
            VALUES 
            (:id_usuario, :nombre, :apellido, :dni, :celular, :cargo, :fecha_registro)";

        $stmt = $this->db->prepare($sqlEmpleado);
        return $stmt->execute([
            'id_usuario' => $idUsuario,
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'dni' => $datos['dni'],
            'celular' => $datos['celular'],
            'cargo' => $datos['cargo'],
            'fecha_registro' => $datos['fecha_registro']
        ]);
    }
}