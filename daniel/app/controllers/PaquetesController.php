<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Paquete.php';
class PaquetesController extends Controller {
    public function index(): void {
        header('Location: ' . BASE_URL . '/paquetes/ver');
        exit;
    }
    public function ver(): void {
        $this->requireAuth();
        $modelo = new Paquete();
        $paquetes = $modelo->obtenerPaquetes();
        $this->view('paquetes/index', [
            'usuario' => $_SESSION['usuario'],
            'paquetes' => $paquetes
        ]);
    }
    public function registrar(): void {
        $this->requireAuth();
        $modelo = new Paquete();
        $paquetes = $modelo->obtenerPaquetes();
        $this->view('paquetes/registrar', [
            'usuario' => $_SESSION['usuario'],
            'paquetes' => $paquetes
        ]);
    }
    public function guardar(): void {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = new Paquete();
            $modelo->registrar($_POST['nombre_paquete'], $_POST['duracion'], $_POST['precio']);
            header('Location: ' . BASE_URL . '/paquetes/registrar');
            exit;
        }
    }
    public function editar($id): void {
        $this->requireAuth();
        $modelo = new Paquete();
        $paquetes = $modelo->obtenerPaquetes();
        $actual = null;
        foreach ($paquetes as $paquete) {
            if ((string)$paquete['id_paquete'] === (string)$id) {
                $actual = $paquete;
                break;
            }
        }
        $this->view('paquetes/editar', [
            'usuario' => $_SESSION['usuario'],
            'paquete' => $actual
        ]);
    }
    public function actualizar($id): void {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modelo = new Paquete();
            $modelo->actualizar($id, $_POST['nombre_paquete'], $_POST['duracion'], $_POST['precio']);
            header('Location: ' . BASE_URL . '/paquetes/ver');
            exit;
        }
    }
    public function eliminar($id): void {
        $this->requireAuth();
        $modelo = new Paquete();
        $modelo->eliminar($id);
        header('Location: ' . BASE_URL . '/paquetes/ver');
        exit;
    }
}
