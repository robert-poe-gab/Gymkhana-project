<!DOCTYPE html>
<html lang="ca">
<?php include("../src/views/components/head.php") ?>
<?php include("../src/views/components/navbarMobile.php") ?>
<?php include("../src/views/components/navbarMobileButton.php") ?>

<body class="bg-primary">

<div id="title" class="position-fixed p-2 d-block d-md-none z-n1;" style="top: 80px; left: 20px;">
    <h1 class="fw-bold text-gradient">GYMKHANA</h1>
    <h3 class="fw-bold text-info">Recents</h3>
</div>

<div class="container bg-light full-height z-1" style="margin-top: 180px; border-radius: 30px 30px 0px 0px; padding-top: 20px;">
    <div class="alert alert-danger  <?php if(!isset($_GET["error"]) || (int)$_GET["error"] != 1) echo "d-none" ?>">
        Aquesta gimcana no existeix, prova un altre id.
    </div>
    <?php

    /*$db = $container->get("odsp2");

    $sql = "SELECT fecha, estado, nombre, ubicacion FROM gimcanas ORDER BY fecha DESC";
    $gimcanas = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);*/

    // Simulation
    $gimcanas = [
        ['fecha' => '2025-10-17', 'estado' => 'ACTIVA', 'nombre' => 'Gimcana tusna', 'ubicacion' => 'La gran Cullera'],
        ['fecha' => '2025-11-21', 'estado' => 'ACTIVA', 'nombre' => 'Gimcana misteriosa', 'ubicacion' => 'València'],
        ['fecha' => '2026-02-05', 'estado' => 'ACTIVA', 'nombre' => 'Gimcana del mar', 'ubicacion' => 'Cullera Beach'],
        ['fecha' => '2026-03-12', 'estado' => 'ACTIVA', 'nombre' => 'Gimcana sorpresa', 'ubicacion' => 'El Saler'],
    ];

    foreach ($gimcanas as $gimcana):
        $fecha = strtotime($gimcana['fecha']);
        $dia = date('j', $fecha);
        $mes = strtoupper(date('M', $fecha));
    ?>
    
    <div class="row align-items-center mb-4">
        <!-- Dates -->
        <div class="col-2 text-center">
            <div class="fw-bold fs-4 text-info"><?= $dia ?></div>
            <div class="text-uppercase text-muted"><?= $mes ?></div>
            <div class="vr p-0"></div>
        </div>

        <!-- Gymkhana card -->
        <div class="col-10">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <span class="badge text-primary border border border-radius mb-2"><?= $gimcana['estado'] ?></span>
                    <h5 class="card-title mb-1"><?= htmlspecialchars($gimcana['nombre']) ?></h5>
                    <p class="card-text text-muted mb-0">
                        <i class="bi bi-geo-alt"></i> <?= htmlspecialchars($gimcana['ubicacion']) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<script src="/js/search.js"></script>
</body>
</html>