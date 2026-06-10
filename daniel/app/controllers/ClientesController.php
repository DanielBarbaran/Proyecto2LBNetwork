<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Cliente.php';
class ClientesController extends Controller {
    public function index(): void {
        header('Location: ' . BASE_URL . '/clientes/ver');
        exit;
    }
    public function ver(): void {
        $this->requireAuth();
        $modelo = new Cliente();
        $clientes = $modelo->obtenerClientes();
        $this->view('clientes/index', [
            'usuario' => $_SESSION['usuario'],
            'clientes' => $clientes
        ]);
    }
    public function registrar(): void {
        $this->requireAuth();
        $modelo = new Cliente();
        $clientes = $modelo->obtenerClientes();
        $this->view('clientes/registrar', [
            'usuario' => $_SESSION['usuario'],
            'clientes' => $clientes
        ]);
    }
    public function guardar(): void {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = new Cliente();
            $modelo->registrar($_POST['nombre'], $_POST['documento'], $_POST['telefono']);
            header('Location: ' . BASE_URL . '/clientes/registrar');
            exit;
        }
    }
    public function editar($id): void {
        $this->requireAuth();
        $modelo = new Cliente();
        $clientes = $modelo->obtenerClientes();
        $actual = null;
        foreach ($clientes as $cliente) {
            if ((string)$cliente['id_cliente'] === (string)$id) {
                $actual = $cliente;
                break;
            }
        }
        $this->view('clientes/editar', [
            'usuario' => $_SESSION['usuario'],
            'cliente' => $actual
        ]);
    }
    public function actualizar($id): void {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = new Cliente();
            $modelo->actualizar($id, $_POST['nombre'], $_POST['documento'], $_POST['telefono']);
            header('Location: ' . BASE_URL . '/clientes/ver');
            exit;
        }
    }
    public function eliminar($id): void {
        $this->requireAuth();
        $modelo = new Cliente();
        $modelo->eliminar($id);
        header('Location: ' . BASE_URL . '/clientes/ver');
        exit;
    }
}
