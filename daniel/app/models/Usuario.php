<?php
require_once __DIR__ . '/../core/Database.php';
class Usuario{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getConnection();
    }
    public function obtenerUsuarios():array {
        $sql = "SELECT id_usuario, nombre_usuario, roles FROM usuario ORDER BY id_usuario DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function registrar($nombre_usuario, $clave, $roles){
        $sql = "INSERT INTO usuario (nombre_usuario, clave, roles) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre_usuario, password_hash($clave, PASSWORD_DEFAULT), $roles]);
    }
    public function actualizar($id, $nombre_usuario, $clave, $roles){
        $sql = "UPDATE usuario SET nombre_usuario = ?, roles = ? WHERE id_usuario = ?";
        $stmt = $this->db->prepare($sql);
        if (!empty($clave)) {
            $sql = "UPDATE usuario SET nombre_usuario = ?, clave = ?, roles = ? WHERE id_usuario = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$nombre_usuario, password_hash($clave, PASSWORD_DEFAULT), $roles, $id]);
        }
        return $stmt->execute([$nombre_usuario, $roles, $id]);
    }
    public function eliminar($id){
        $sql = "DELETE FROM usuario WHERE id_usuario = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}

