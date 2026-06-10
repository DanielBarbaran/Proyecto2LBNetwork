<?php
$rutaActual = explode('/', trim($_GET['url'] ?? 'dashboard', '/'))[0] ?: 'dashboard';
?>
<aside class="sidebar">
    <div class="sidebar-logo">
        <i class="fa-solid fa-wifi"></i>
        <div>
            <div class="sidebar-title"><?= TITLE_BUSINESS ?></div>
            <div class="sidebar-subtitle">Panel administrativo</div>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="<?= BASE_URL ?>/dashboard" class="<?= $rutaActual === 'dashboard' ? 'activo' : '' ?>">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="<?= $rutaActual === 'paquetes' ? 'dropdown show' : 'dropdown' ?>">
            <a href="#" class="dropbtn <?= $rutaActual === 'paquetes' ? 'activo' : '' ?>">
                <i class="fa-solid fa-boxes-stacked"></i>
                <span>Paquetes</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?= BASE_URL ?>/paquetes/ver" class="<?= $rutaActual === 'paquetes' ? 'activo' : '' ?>">
                    <i class="fa-regular fa-eye"></i>
                    Ver
                </a>
                <a href="<?= BASE_URL ?>/paquetes/registrar">
                    <i class="fa-solid fa-circle-plus"></i>
                    Registrar
                </a>
            </div>
        </li>

        <li class="<?= $rutaActual === 'clientes' ? 'dropdown show' : 'dropdown' ?>">
            <a href="#" class="dropbtn <?= $rutaActual === 'clientes' ? 'activo' : '' ?>">
                <i class="fa-solid fa-users"></i>
                <span>Clientes</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?= BASE_URL ?>/clientes/ver" class="<?= $rutaActual === 'clientes' ? 'activo' : '' ?>">
                    <i class="fa-regular fa-eye"></i>
                    Ver
                </a>
                <a href="<?= BASE_URL ?>/clientes/registrar">
                    <i class="fa-solid fa-circle-plus"></i>
                    Registrar
                </a>
            </div>
        </li>

        <li class="<?= $rutaActual === 'ventas' ? 'dropdown show' : 'dropdown' ?>">
            <a href="#" class="dropbtn <?= $rutaActual === 'ventas' ? 'activo' : '' ?>">
                <i class="fa-solid fa-receipt"></i>
                <span>Ventas</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?= BASE_URL ?>/ventas/ver" class="<?= $rutaActual === 'ventas' ? 'activo' : '' ?>">
                    <i class="fa-regular fa-eye"></i>
                    Ver
                </a>
                <a href="<?= BASE_URL ?>/ventas/registrar">
                    <i class="fa-solid fa-circle-plus"></i>
                    Registrar
                </a>
            </div>
        </li>

        <li class="<?= $rutaActual === 'usuarios' ? 'dropdown show' : 'dropdown' ?>">
            <a href="#" class="dropbtn <?= $rutaActual === 'usuarios' ? 'activo' : '' ?>">
                <i class="fa-solid fa-user-gear"></i>
                <span>Usuarios</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?= BASE_URL ?>/usuarios/ver" class="<?= $rutaActual === 'usuarios' ? 'activo' : '' ?>">
                    <i class="fa-regular fa-eye"></i>
                    Ver
                </a>
                <a href="<?= BASE_URL ?>/usuarios/registrar">
                    <i class="fa-solid fa-circle-plus"></i>
                    Registrar
                </a>
            </div>
        </li>
        <li class="nav-logout">
            <a href="<?= BASE_URL ?>/logout" id="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Cerrar sesión</span>
            </a>
        </li>
    </ul>
</aside>

<script src="<?= BASE_URL ?>/public/js/dropdown.js"></script>
