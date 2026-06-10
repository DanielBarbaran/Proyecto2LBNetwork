<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Resumen.php';
require_once __DIR__ . '/../models/Venta.php';
class DashboardController extends Controller {
    public function index(): void {
        $this->requireAuth();
        $resumen = new Resumen();
        $venta = new Venta();
        $this->view('dashboard/index', [
            'usuario' => $_SESSION['usuario'],
            'totalUsuarios' => $resumen->contarUsuarios(),
            'totalPaquetes' => $resumen->contarPaquetes(),
            'totalClientes' => $resumen->contarClientes(),
            'totalVentasHoy' => $venta->contarVentasHoy()
        ]);
    }
}
