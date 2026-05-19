<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LB NETWORK</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .hero {
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .section {
            padding: 70px 0;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .card:hover {
            transform: translateY(-10px);
            transition: 0.3s;
        }

        footer {
            background: #0a0a0a;
            color: white;
            padding: 20px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">LB NETWORK</a>

        <div class="ms-auto">
            <a href="<?php echo BASE_URL; ?>/login" class="btn btn-warning">Iniciar Sesión</a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero text-center">
    <div class="container">
        <h1>LB NETWORK</h1>
        <p class="mt-3">Internet rápido, estable y sin interrupciones</p>
        <a href="#planes" class="btn btn-light btn-lg mt-4">Ver Planes</a>
    </div>
</section>

<!-- PLANES -->
<section id="planes" class="section text-center">
    <div class="container">
        <h2 class="mb-5">Nuestros Planes</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="card p-4">
                    <h4>Plan Hogar</h4>
                    <p>30 Mbps</p>
                    <h3>S/ 45</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4">
                    <h4>Plan Premium</h4>
                    <p>100 Mbps</p>
                    <h3>S/ 80</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4">
                    <h4>Plan Empresarial</h4>
                    <p>300 Mbps</p>
                    <h3>S/ 120</h3>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- BENEFICIOS -->
<section class="section bg-light text-center">
    <div class="container">
        <h2 class="mb-5">¿Por qué elegir LB NETWORK?</h2>

        <div class="row">
            <div class="col-md-4">
                <h5>⚡ Alta velocidad</h5>
                <p>Conexión estable para streaming y trabajo</p>
            </div>

            <div class="col-md-4">
                <h5>🛠 Soporte 24/7</h5>
                <p>Siempre disponibles para ayudarte</p>
            </div>

            <div class="col-md-4">
                <h5>💰 Precios accesibles</h5>
                <p>Planes para todos los bolsillos</p>
            </div>
        </div>
    </div>
</section>

<!-- CONTACTO -->
<section class="section text-center">
    <div class="container">
        <h2>Contáctanos</h2>
        <p>📞 987 654 321</p>
        <p>📍 Pucallpa, Perú</p>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center">
    <p>© <?php echo date('Y'); ?> LB NETWORK - Todos los derechos reservados</p>
</footer>

</body>
</html>