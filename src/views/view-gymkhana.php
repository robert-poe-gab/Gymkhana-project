<!DOCTYPE html>
<html lang="ca">

<?php include("../src/views/components/head.php") ?>
<?php include("../src/views/components/navbarMobile.php") ?>
<?php include("../src/views/components/navbarMobileButton.php") ?>

<body>

    <div id="title" class="position-fixed p-2 d-block d-md-none z-n1;" style="top: 80px; left: 20px;">
        <h1 class="fw-bold"><?= $gymkhana['title'] ?></h1>
    </div>
    <div class="container bg-light full-height z-1"
        style="margin-top: 180px; border-radius: 30px 30px 0px 0px; padding-top: 20px;">
        <section>
            <p class="text-body-secondary text-sm-start">
                <?= $gymkhana['description']?>
            </p>
            <div id="map" class="rounded-4 mx-2" style="height: 300px; width: auto;"
                data-location="<?= $gymkhana['location'] ?>"
                data-quests="<?= $quests ?>"></div>
            <date><?= $gymkhana['start_date'] ?></date>
            <date><?= $gymkhana['end_date'] ?></date>
        </section>

    </div>

</body>
<script src="./js/leafletMap.js"></script>

</html>