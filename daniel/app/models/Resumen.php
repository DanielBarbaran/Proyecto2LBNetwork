<?php
require_once __DIR__ . '/../core/Database.php';
class Resumen{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getConnection();
    }
    public function contarUsuarios(){
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM usuario");
        $stmt->execute();
        return $stmt->fetch();
    }
    public function contarPaquetes(){
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM paquete");
        $stmt->execute();
        return $stmt->fetch();
    }
    public function contarClientes(){
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM cliente");
        $stmt->execute();
        return $stmt->fetch();
    }
}

