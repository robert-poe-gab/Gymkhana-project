<!DOCTYPE html>
<html lang="ca">

<?php include("../src/views/components/head.php") ?>


<body>
    <div class="row ">      
        <div class="main-content"><div class="position-fixed top-0 start-0 h-100 d-none d-md-block">
            <?php include("../src/views/components/sidebar.php") ?>
        </div>

        <div class="main-content d-block d-md-none">
                <?php include("../src/views/components/navbarMobile.php") ?>
                <?php include("../src/views/components/navbarMobileButton.php") ?>
                <?php include("../public/assets/img/ods.php"); ?>
        </div>
            <div id="searchBar" class="position-fixed row align-items-center text-center" style="top: 8vh;">
                <h1 class="fw-bold">Crear gimcana</h1>
            </div>
            <div class="container row align-items-center d-flex align-items-start z-1 pb-4 border-hero pc-div-width mx-auto bg-hero-mobile"
                style="margin-top: 180px; min-height: 50vh; padding-top: 20px;">
                <div class="col-lg-8" style="height: 40vh;">
                <form action="/index.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="r" value="saveGymkhana">

                    <div class="mb-3 text-start">
                        <label for="title" class="form-label"><strong>Nom</strong></label>
                        <input class="form-control bg-dark border-black rounded-pill" id="title" placeholder="ex: La gimcana de Dalí..." name="title"
                            required>
                    </div>
                    
                    <div class="mb-3 text-start">
                        <label for="datetime" class="form-label"><strong>Data</strong></label>
                        <input class="form-control bg-dark border-black rounded-pill" id="datetime" name="datetime" type="text"
                            placeholder="Selecciona data i hora" required>
                    </div>

                    <div class="mb-3 text-start">
                        <label for="description" class="form-label"><strong>Descripció</strong></label>
                        <input class="form-control bg-dark border-black rounded-pill" id="description" placeholder="L'objectiu de la gimcana és..."
                            name="description" required>
                    </div>

                    <div class="mb-3 text-start">
                        <label for="location" class="form-label"><strong>Ubicació</strong></label>
                        <input class="form-control bg-dark border-black rounded-pill" id="location" placeholder="ex: 42.273672, 2.964773" name="location"
                            required>
                    </div>

                    <div class="mb-3 text-start">
                        <div class="text-between">
                            <label for="quests" class="form-label"><strong>Proves</strong></label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-plus-icon lucide-map-plus"><path d="m11 19-1.106-.552a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0l4.212 2.106a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619V12"/><path d="M15 5.764V12"/><path d="M18 15v6"/><path d="M21 18h-6"/><path d="M9 3.236v15"/></svg>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-lg-4" style="height: 40vh;">
                    <div class="mb-3 text-start">
                        <label for="imageGim" class="form-label"><strong>Imatge</strong></label>
                        <input class="form-control bg-dark border-black rounded-pill" type="file" name="imageGim" id="imageGim" accept="image/*">
                    </div>
                    <div class="text-center mb-4">
                                <img id="previewImage"
                                    src="./assets/img/default-gimcana.png"
                                    alt="Imatge de la gimcana"
                                    class="rounded-5 shadow image-size"
                                    style="object-fit: cover;" />  
                    </div>
                    </div>

                    <div class="alert alert-danger  <?php if(!isset($_GET["error"]) || $_GET["error"] == "2") echo "d-none" ?>">
                        Ubicació incorrecta.
                    </div>

                    <div class="d-flex justify-content-center gap-2 pt-3 col-12 col-lg-2 mx-auto">
                        <input type="button" class="btn btn-primary" value="Cancelar" onClick="javascript:history.go(-1)">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/flatpickerCalendar.js"></script>
    <script src="./js/imgPreview.js"></script>

</body>

</html>