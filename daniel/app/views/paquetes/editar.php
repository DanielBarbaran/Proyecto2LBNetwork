<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar paquete - <?= TITLE_BUSINESS ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Editar paquete</h2>
    <form method="POST" action="<?= BASE_URL ?>/paquetes/actualizar/<?= (int)$paquete['id_paquete'] ?>">
        <div class="row g-3">
            <div class="col-md-4">
                <input type="text" name="nombre_paquete" class="form-control" value="<?= htmlspecialchars($paquete['nombre_paquete']) ?>" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="duracion" class="form-control" value="<?= htmlspecialchars($paquete['duracion']) ?>" required>
            </div>
            <div class="col-md-2">
                <input type="number" step="0.01" name="precio" class="form-control" value="<?= htmlspecialchars($paquete['precio']) ?>" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">Guardar</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

