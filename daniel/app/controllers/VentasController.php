<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Venta.php';
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../models/Paquete.php';
class VentasController extends Controller {
    public function index(): void {
        header('Location: ' . BASE_URL . '/ventas/ver');
        exit;
    }
    public function ver(): void {
        $this->requireAuth();
        $ventas = new Venta();
        $clientes = new Cliente();
        $paquetes = new Paquete();
        $this->view('ventas/index', [
            'usuario' => $_SESSION['usuario'],
            'ventas' => $ventas->obtenerVentas(),
            'clientes' => $clientes->obtenerClientes(),
            'paquetes' => $paquetes->obtenerPaquetes()
        ]);
    }
    public function registrar(): void {
        $this->requireAuth();
        $ventas = new Venta();
        $clientes = new Cliente();
        $paquetes = new Paquete();
        $this->view('ventas/registrar', [
            'usuario' => $_SESSION['usuario'],
            'ventas' => $ventas->obtenerVentas(),
            'clientes' => $clientes->obtenerClientes(),
            'paquetes' => $paquetes->obtenerPaquetes()
        ]);
    }
    public function guardar(): void {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $venta = new Venta();
            $venta->registrar($_POST['id_cliente'], $_POST['id_paquete'], $_SESSION['usuario']['id_usuario'], $_POST['codigo_cupon'], $_POST['estado']);
            header('Location: ' . BASE_URL . '/ventas/registrar');
            exit;
        }
    }
    public function editar($id): void {
        $this->requireAuth();
        $venta = new Venta();
        $clientes = new Cliente();
        $paquetes = new Paquete();
        $ventas = $venta->obtenerVentas();
        $actual = null;
        foreach ($ventas as $item) {
            if ((string)$item['id_venta'] === (string)$id) {
                $actual = $item;
                break;
            }
        }
        $this->view('ventas/editar', [
            'usuario' => $_SESSION['usuario'],
            'venta' => $actual,
            'clientes' => $clientes->obtenerClientes(),
            'paquetes' => $paquetes->obtenerPaquetes()
        ]);
    }
    public function actualizar($id): void {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $venta = new Venta();
            $venta->actualizar($id, $_POST['id_cliente'], $_POST['id_paquete'], $_POST['codigo_cupon'], $_POST['estado']);
            header('Location: ' . BASE_URL . '/ventas/ver');
            exit;
        }
    }
    public function eliminar($id): void {
        $this->requireAuth();
        $venta = new Venta();
        $venta->eliminar($id);
        header('Location: ' . BASE_URL . '/ventas/ver');
        exit;
    }
}
