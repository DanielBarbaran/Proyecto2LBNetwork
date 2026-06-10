<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario - <?= TITLE_BUSINESS ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Editar usuario</h2>
    <form method="POST" action="<?= BASE_URL ?>/usuarios/actualizar/<?= (int)$usuarioData['id_usuario'] ?>">
        <div class="row g-3">
            <div class="col-md-4"><input type="text" name="nombre_usuario" class="form-control" value="<?= htmlspecialchars($usuarioData['nombre_usuario']) ?>" required></div>
            <div class="col-md-4"><input type="password" name="clave" class="form-control" placeholder="Nueva contraseña si deseas cambiarla"></div>
            <div class="col-md-3">
                <select name="roles" class="form-select">
                    <option value="admin" <?= $usuarioData['roles'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="superadmin" <?= $usuarioData['roles'] === 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
                </select>
            </div>
            <div class="col-md-1"><button class="btn btn-primary w-100" type="submit">OK</button></div>
        </div>
    </form>
</div>
</body>
</html>

