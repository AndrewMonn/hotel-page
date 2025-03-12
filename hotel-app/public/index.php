<?php include __DIR__ . '/../src/components/header.php'; ?>

<!-- Hero Banner -->
<div class="container-fluid text-center text-light">
<div class="filter">
    <h1 class="display-4">Bienvenido a Hotel Paradiso</h1>
    <p class="lead">Lujo y confort en cada estadía</p>
    <a href="reservation.php" class="btn btn-light btn-lg">Reserva Ahora</a>
</div>
</div>

<!-- Sección de Servicios -->
<div class="container my-5">
    <h2 class="text-center text-primary">Nuestros Servicios</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <img src="images/service1.jpg" class="card-img-top" alt="Spa">
                <div class="card-body">
                    <h5 class="card-title">Spa de Lujo</h5>
                    <p class="card-text">Relájate en nuestro exclusivo spa con masajes y sauna.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="images/service2.jpg" class="card-img-top" alt="Piscina">
                <div class="card-body">
                    <h5 class="card-title">Piscina Panorámica</h5>
                    <p class="card-text">Disfruta de una piscina con vista espectacular.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="images/service3.jpg" class="card-img-top" alt="Gastronomía">
                <div class="card-body">
                    <h5 class="card-title">Gastronomía Exclusiva</h5>
                    <p class="card-text">Saborea platos gourmet preparados por chefs de renombre.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../src/components/footer.php'; ?>
