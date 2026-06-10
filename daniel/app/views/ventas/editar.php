<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar venta - <?= TITLE_BUSINESS ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Editar venta</h2>
    <form method="POST" action="<?= BASE_URL ?>/ventas/actualizar/<?= (int)$venta['id_venta'] ?>">
        <div class="row g-3">
            <div class="col-md-3">
                <select name="id_cliente" class="form-select" required>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= (int)$cliente['id_cliente'] ?>" <?= ((int)$cliente['id_cliente'] === (int)$venta['id_cliente']) ? 'selected' : '' ?>><?= htmlspecialchars($cliente['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="id_paquete" class="form-select" required>
                    <?php foreach ($paquetes as $paquete): ?>
                        <option value="<?= (int)$paquete['id_paquete'] ?>" <?= ((int)$paquete['id_paquete'] === (int)$venta['id_paquete']) ? 'selected' : '' ?>><?= htmlspecialchars($paquete['nombre_paquete']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3"><input type="text" name="codigo_cupon" class="form-control" value="<?= htmlspecialchars($venta['codigo_cupon']) ?>" required></div>
            <div class="col-md-2">
                <select name="estado" class="form-select">
                    <option value="vendido" <?= $venta['estado'] === 'vendido' ? 'selected' : '' ?>>Vendido</option>
                    <option value="activo" <?= $venta['estado'] === 'activo' ? 'selected' : '' ?>>Activo</option>
                    <option value="vencido" <?= $venta['estado'] === 'vencido' ? 'selected' : '' ?>>Vencido</option>
                </select>
            </div>
            <div class="col-md-1"><button class="btn btn-primary w-100" type="submit">OK</button></div>
        </div>
    </form>
</div>
</body>
</html>

