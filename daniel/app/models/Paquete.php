<?php
require_once __DIR__ . '/../core/Database.php';
class Paquete{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getConnection();
    }
    public function obtenerPaquetes():array {
        $sql = "SELECT * FROM paquete ORDER BY id_paquete DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function obtenerParaLanding():array {
        $sql = "SELECT nombre_paquete, duracion, precio FROM paquete ORDER BY id_paquete ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function registrar($nombre_paquete, $duracion, $precio){
        $sql = "INSERT INTO paquete (nombre_paquete, duracion, precio) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre_paquete, $duracion, $precio]);
    }
    public function actualizar($id, $nombre_paquete, $duracion, $precio){
        $sql = "UPDATE paquete SET nombre_paquete = ?, duracion = ?, precio = ? WHERE id_paquete = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre_paquete, $duracion, $precio, $id]);
    }
    public function eliminar($id){
        $sql = "DELETE FROM paquete WHERE id_paquete = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}

