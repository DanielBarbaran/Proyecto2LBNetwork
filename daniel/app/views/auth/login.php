<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?= TITLE_BUSINESS ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/login.css">
</head>
<body>
<div class="login-page">
    <div class="login-glow login-glow-one"></div>
    <div class="login-glow login-glow-two"></div>

    <div class="login-shell">
        <div class="login-card">
            <div class="login-form-panel">
                <div class="login-brand">
                    <span class="brand-pill"><i class="fa-solid fa-wifi"></i></span>
                    <div>
                        <h1><?= TITLE_BUSINESS ?></h1>
                    </div>
                </div>

                <div class="login-figure">
                    <i class="fa-solid fa-user-shield"></i>
                </div>

                <h3>Iniciar sesión</h3>
                <p class="login-subtitle">Accede al panel administrativo</p>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form method="POST" action="<?= BASE_URL ?>/login" class="login-form">
                    <div class="form-group">
                        <label class="form-label">Usuario</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="user" class="form-control" placeholder="Ingresa tu usuario" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Contraseña</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="pass" class="form-control" placeholder="Ingresa tu contraseña" required>
                        </div>
                    </div>

                    <button class="btn btn-login w-100 btn-lg" type="submit">
                        <i class="fa-solid fa-right-to-bracket me-2"></i>Iniciar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
