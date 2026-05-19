<?php
require_once __DIR__ . '/../core/Database.php';

class Login {
    private PDO $db;

    public function __construct(){
        $this->db = Database::getConnection();
    }

    public function login(string $nombreUsuario, string $clave): array|false {

        // ✅ CORREGIDO: username en lugar de usuario
        $sql = "SELECT * FROM usuario WHERE username = :usuario";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'usuario' => $nombreUsuario
        ]);

        $usuario = $stmt->fetch();

        // ✅ Comparación directa (porque tu password NO está encriptado)
        if ($usuario && $clave === $usuario['password']) {
            return $usuario;
        }

        return false;
    }
}