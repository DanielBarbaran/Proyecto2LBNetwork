<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas - <?= TITLE_BUSINESS ?></title>
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
        <span id="breadcrumb-page">Ventas</span>
    </nav>
    <div class="main-content">
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Paquete</th>
                            <th>Precio</th>
                            <th>Cupón</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ventas as $venta): ?>
                        <tr>
                            <td><?= (int)$venta['id_venta'] ?></td>
                            <td><?= htmlspecialchars($venta['cliente']) ?></td>
                            <td><?= htmlspecialchars($venta['nombre_paquete']) ?></td>
                            <td>S/ <?= number_format((float)$venta['precio'], 2) ?></td>
                            <td><?= htmlspecialchars($venta['codigo_cupon']) ?></td>
                            <td><?= htmlspecialchars($venta['estado']) ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>/ventas/editar/<?= (int)$venta['id_venta'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="<?= BASE_URL ?>/ventas/eliminar/<?= (int)$venta['id_venta'] ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>

