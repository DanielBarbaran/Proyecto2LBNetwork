<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Usuario.php';
class UsuariosController extends Controller {
    public function index(): void {
        header('Location: ' . BASE_URL . '/usuarios/ver');
        exit;
    }
    public function ver(): void {
        $this->requireAuth();
        $modelo = new Usuario();
        $usuarios = $modelo->obtenerUsuarios();
        $this->view('usuarios/index', [
            'usuario' => $_SESSION['usuario'],
            'usuarios' => $usuarios
        ]);
    }
    public function registrar(): void {
        $this->requireAuth();
        $modelo = new Usuario();
        $usuarios = $modelo->obtenerUsuarios();
        $this->view('usuarios/registrar', [
            'usuario' => $_SESSION['usuario'],
            'usuarios' => $usuarios
        ]);
    }
    public function guardar(): void {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = new Usuario();
            $modelo->registrar($_POST['nombre_usuario'], $_POST['clave'], $_POST['roles']);
            header('Location: ' . BASE_URL . '/usuarios/registrar');
            exit;
        }
    }
    public function editar($id): void {
        $this->requireAuth();
        $modelo = new Usuario();
        $usuarios = $modelo->obtenerUsuarios();
        $actual = null;
        foreach ($usuarios as $usuario) {
            if ((string)$usuario['id_usuario'] === (string)$id) {
                $actual = $usuario;
                break;
            }
        }
        $this->view('usuarios/editar', [
            'usuario' => $_SESSION['usuario'],
            'usuarioData' => $actual
        ]);
    }
    public function actualizar($id): void {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = new Usuario();
            $modelo->actualizar($id, $_POST['nombre_usuario'], $_POST['clave'], $_POST['roles']);
            header('Location: ' . BASE_URL . '/usuarios/ver');
            exit;
        }
    }
    public function eliminar($id): void {
        $this->requireAuth();
        $modelo = new Usuario();
        $modelo->eliminar($id);
        header('Location: ' . BASE_URL . '/usuarios/ver');
        exit;
    }
}
