<?php
class Controller {
    protected function noCache(): void {
        if (!headers_sent()) {
            header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
            header('Cache-Control: post-check=0, pre-check=0', false);
            header('Pragma: no-cache');
            header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');
        }
    }

    protected function requireAuth(): void {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
    }

    protected function soloSuperAdmin(): void {
        if (($_SESSION['usuario']['roles'] ?? '') !== 'superadmin') {
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        }
    }

    protected function view(string $vista, array $datos = []): void {
        $this->noCache();
        extract($datos);
        require_once __DIR__ . '/../views/' . $vista . '.php';
    }
}
