<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Empleado.php';

class EmpleadosController extends Controller {

    // 👉 LISTAR EMPLEADOS
    public function index(): void {
        $this->reporte();
    }

    public function reporte(): void {
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        $modelo = new Empleado();
        $empleados = $modelo->obtenerEmpleados();

        $this->view('empleados/reportes', [
            'usuario' => $_SESSION['usuario'],
            'empleados' => $empleados
        ]);
    }

    public function reportes(): void {
        $this->reporte();
    }

    // 👉 REGISTRAR EMPLEADO (FORM + GUARDADO)
    public function registro(): void {
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // 🔥 SI ENVÍA FORMULARIO
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $datos = [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'dni' => $_POST['dni'],
                'celular' => $_POST['celular'],
                'cargo' => $_POST['cargo'],
                'fecha_registro' => date('Y-m-d')
            ];

            $modelo = new Empleado();
            $modelo->registrar($datos);

            // 🔁 Redirige después de guardar
            header("Location: " . BASE_URL . "/empleados");
            exit();
        }

        // 👉 MOSTRAR FORMULARIO
        $this->view('empleados/registro', [
            'usuario' => $_SESSION['usuario']
        ]);
    }

    public function registrar(): void {
        $this->registro();
    }
}