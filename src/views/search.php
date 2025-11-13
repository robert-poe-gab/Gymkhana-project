<!DOCTYPE html>
<html lang="ca">
<?php include("../src/views/components/head.php") ?>

<body>
    <?php include("../src/views/components/navbarMobile.php") ?>
    <?php include("../src/views/components/navbarMobileButton.php") ?>
    <div class="main-content"><div class="position-fixed top-0 start-0 h-100 d-none d-md-block">
        <?php include("../src/views/components/sidebar.php") ?>
    </div>
    <div class="position-relative z-n1 row align-items-center text-center" style="top: 8vh; left: 0vh;">
        <h1 class="fw-bold">Cercar gimcana</h1>
        <div class="mb-3 text-start w-50 mx-auto">
            <input type="text" id="buscador" name="title" class="form-control rounded-pill text-secondary"
                placeholder="Cercar gimcana...">
        </div>
    </div>

    <div class="container py-3 bg-light full-height z-1"
        style="margin-top: 180px; border-radius: 30px 30px 0 0; padding-top: 20px;" id="results">
        <div class="row" id="resultsRow">
            <?php foreach ($gymkhanas as $gymkhana) { ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4 gymkhana-card">
                    <div class="card shadow-sm border-0 rounded-4 h-100 card-hover">
                        <a href="index.php?r=viewGymkhana&id=<?= $gymkhana['id_gimcana'] ?>"
                            class="card-body text-decoration-none d-block">
                            <div class="d-flex align-items-center mb-2">
                                <div class="card-body d-flex flex-column justify-content-between" style="width: 60%;">
                                    <?php
                                    $startDate = new DateTime($gymkhana['start_date'], new DateTimeZone('Europe/Madrid'));
                                    $endDate = new DateTime($gymkhana['end_date'], new DateTimeZone('Europe/Madrid'));
                                    ?>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="text-center me-3">
                                            <div class="fw-bold fs-4 text-info">
                                                <?= $startDate->format('j'); ?>
                                            </div>
                                            <div class="text-uppercase text-muted">
                                                <?= strtoupper($startDate->format('M')); ?>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="card-title mb-1 gimkhana-title"><?= htmlspecialchars($gymkhana['title']); ?></h5>
                                            <small class="text-muted">
                                                Del <?= $startDate->format('j'); ?> al <?= $endDate->format('j'); ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($gymkhana['image'])) { ?>
                                    <div class="position-relative" style="width: 40%;">
                                        <img src="<?= $gymkhana['image']; ?>"
                                            alt="Imatge de <?= $gymkhana['title']; ?>"
                                            class="img-fluid w-100 object-fit-cover rounded-4">
                                    </div>
                                <?php } ?>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div id="noResults" class="text-center text-muted mt-5 d-none">
            <i class="bi bi-search fs-2"></i>
            <p class="mt-2">No s’han trobat gimcanes.</p>
        </div>
    </div>

    <script src="./js/searchGymkhana.js"></script>

</body>
</html>
