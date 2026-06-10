<?php
require_once __DIR__ . '/../core/Database.php';
class Venta{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getConnection();
    }
    public function obtenerVentas():array {
        $sql = "SELECT v.*, c.nombre AS cliente, p.nombre_paquete, p.precio
                FROM venta v
                INNER JOIN cliente c ON v.id_cliente = c.id_cliente
                INNER JOIN paquete p ON v.id_paquete = p.id_paquete
                ORDER BY v.id_venta DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function registrar($id_cliente, $id_paquete, $usuario_registro, $codigo_cupon, $estado){
        $sql = "INSERT INTO venta (id_cliente, id_paquete, usuario_registro, codigo_cupon, estado) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_cliente, $id_paquete, $usuario_registro, $codigo_cupon, $estado]);
    }
    public function actualizar($id, $id_cliente, $id_paquete, $codigo_cupon, $estado){
        $sql = "UPDATE venta SET id_cliente = ?, id_paquete = ?, codigo_cupon = ?, estado = ? WHERE id_venta = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_cliente, $id_paquete, $codigo_cupon, $estado, $id]);
    }
    public function eliminar($id){
        $sql = "DELETE FROM venta WHERE id_venta = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
    public function contarVentasHoy(){
        $sql = "SELECT COUNT(*) AS total FROM venta WHERE DATE(fecha_venta) = CURDATE()";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}

