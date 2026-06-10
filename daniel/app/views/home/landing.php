<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE_BUSINESS ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/landing.css">
</head>
<body>
    <div id="fadeOverlay"></div>

    <?php include __DIR__ . '/../layouts/header-home.php'; ?>

    <section class="stage">
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="<?php echo BASE_URL; ?>/public/video/video1.mp4" type="video/mp4">
        </video>

        <nav class="navbar" id="navbar">
            <a class="brand" href="#"><?php echo TITLE_BUSINESS; ?></a>
            <button class="menu-btn" id="menuBtn" aria-label="Abrir menú">
                <i class="bi bi-list"></i>
            </button>
        </nav>

        <div class="hero-content">
            <a href="<?php echo BASE_URL; ?>/login" class="cta-btn demo-trigger" id="verDemo">Ver demo</a>
        </div>

        <div class="scroll-indicator" id="scrollIndicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <section class="projects-section">
        <div class="project-card">
            <div class="project-img-wrap">
                <img src="<?php echo BASE_URL; ?>/public/img/img1.jfif" alt="Paquetes" class="project-img">
            </div>
            <h3 class="project-title">Paquete de Internet Wifi</h3>
            <p class="project-desc">Consulta la información de cada paquete disponible y administra la venta de forma centralizada.</p>
            <a href="<?php echo BASE_URL; ?>/paquetes/ver" class="project-link">Ver demo <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="project-card">
            <div class="project-img-wrap">
                <img src="<?php echo BASE_URL; ?>/public/img/img2.jfif" alt="Panel de control" class="project-img">
            </div>
            <h3 class="project-title">Panel de Control</h3>
            <p class="project-desc">Administra paquetes, clientes, ventas y usuarios desde un panel centralizado.</p>
            <a href="<?php echo BASE_URL; ?>/dashboard" class="project-link">Ver demo <i class="bi bi-arrow-right"></i></a>
        </div>
    </section>

    <?php include __DIR__ . '/../layouts/footer-home.php'; ?>
    <script src="<?php echo BASE_URL; ?>/public/js/landing.js"></script>
</body>
</html>

