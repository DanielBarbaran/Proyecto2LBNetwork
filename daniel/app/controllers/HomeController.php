<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Paquete.php';
class HomeController extends Controller {
    public function index(): void {
        $modelo = new Paquete();
        $paquetes = $modelo->obtenerParaLanding();
        $this->view('home/landing', [
            'paquetes' => $paquetes
        ]);
    }
}

