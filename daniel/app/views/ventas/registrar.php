<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar venta - <?= TITLE_BUSINESS ?></title>
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
        <span id="breadcrumb-page">Registrar venta</span>
    </nav>
    <div class="main-content">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="<?= BASE_URL ?>/ventas/guardar" class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Cliente</label>
                        <select name="id_cliente" class="form-select" required>
                            <option value="">Seleccione</option>
                            <?php foreach ($clientes as $cliente): ?>
                                <option value="<?= (int)$cliente['id_cliente'] ?>"><?= htmlspecialchars($cliente['nombre']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Paquete</label>
                        <select name="id_paquete" class="form-select" required>
                            <option value="">Seleccione</option>
                            <?php foreach ($paquetes as $paquete): ?>
                                <option value="<?= (int)$paquete['id_paquete'] ?>"><?= htmlspecialchars($paquete['nombre_paquete']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Cupón</label>
                        <input type="text" name="codigo_cupon" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select">
                            <option value="vendido">Vendido</option>
                            <option value="activo">Activo</option>
                            <option value="vencido">Vencido</option>
                        </select>
                    </div>
                    <div class="col-md-1 d-grid">
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

