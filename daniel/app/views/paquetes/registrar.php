<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar paquete - <?= TITLE_BUSINESS ?></title>
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
        <span id="breadcrumb-page">Registrar paquete</span>
    </nav>
    <div class="main-content">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="<?= BASE_URL ?>/paquetes/guardar" class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Paquete</label>
                        <input type="text" name="nombre_paquete" class="form-control" placeholder="30Minutos" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Duración</label>
                        <input type="text" name="duracion" class="form-control" placeholder="30 minutos" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control" placeholder="1.00" required>
                    </div>
                    <div class="col-md-2 d-grid">
                        <label class="form-label invisible">Acción</label>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>

