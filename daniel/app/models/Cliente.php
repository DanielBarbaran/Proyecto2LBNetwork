<?php
require_once __DIR__ . '/../core/Database.php';
class Cliente{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getConnection();
    }
    public function obtenerClientes():array {
        $sql = "SELECT * FROM cliente ORDER BY id_cliente DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function registrar($nombre, $documento, $telefono){
        $sql = "INSERT INTO cliente (nombre, documento, telefono) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $documento, $telefono]);
    }
    public function actualizar($id, $nombre, $documento, $telefono){
        $sql = "UPDATE cliente SET nombre = ?, documento = ?, telefono = ? WHERE id_cliente = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $documento, $telefono, $id]);
    }
    public function eliminar($id){
        $sql = "DELETE FROM cliente WHERE id_cliente = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}

