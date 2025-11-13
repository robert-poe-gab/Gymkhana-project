<!DOCTYPE html>
<html lang="ca">
<?php include("../src/views/components/head.php") ?>
<?php include("../src/views/components/navbarMobile.php") ?>
<?php include("../src/views/components/navbarMobileButton.php") ?>

<body>
    <div id="title" class="position-fixed p-2 d-block d-md-none z-n1;" style="top: 80px; left: 20px;">
        <h1 class="fw-bold">Nombre</h1>
        <img 
          src="<?php echo $user['profile_image'] ? $user['profile_image'] : 'img/default_profile.png'; ?>" 
          alt="Foto de perfil" 
          class="rounded-circle" 
          width="60" height="60">
        <a></a>
    </div>

    <div class="container bg-light full-height z-1" style="margin-top: 180px; border-radius: 30px 30px 0px 0px; padding-top: 20px;">

        <form action="index.php?r=addComm" method="POST" class="mt-3">
            <input type="hidden" name="id_gimcana" value="<?= $gimcana['id_gimcana'] ?>">

            <div class="mb-3">
                <label for="comment">Comentari:</label>
                <textarea name="comment" id="comment" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="valoration">Valoració (1-5):</label>
                <input type="number" name="valoration" min="1" max="5" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary fixed-bottom m-5">Enviar comentari</button>
        </form>

    </div>
</body>
</html>
