<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuario - <?= TITLE_BUSINESS ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/dashboard.css">
</head>
<body>
<?php require_once __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>
<main class="main-panel">
    <nav class="breadcrumb">
        <span>Inicio</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Registrar usuario</span>
    </nav>
    <div class="main-content">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="<?= BASE_URL ?>/usuarios/guardar" class="row g-3">
                    <div class="col-md-4"><label class="form-label">Usuario</label><input type="text" name="nombre_usuario" class="form-control" required></div>
                    <div class="col-md-4"><label class="form-label">Contraseña</label><input type="password" name="clave" class="form-control" required></div>
                    <div class="col-md-3">
                        <label class="form-label">Rol</label>
                        <select name="roles" class="form-select">
                            <option value="admin">Admin</option>
                            <option value="superadmin">Superadmin</option>
                        </select>
                    </div>
                    <div class="col-md-1 d-grid"><label class="form-label invisible">Acción</label><button class="btn btn-primary" type="submit">Registrar</button></div>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>

