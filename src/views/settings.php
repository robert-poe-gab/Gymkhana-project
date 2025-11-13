<!DOCTYPE html>
<html lang="ca">
<?php include("../src/views/components/head.php") ?>
<?php include("../src/views/components/navbarMobile.php") ?>
<?php include("../src/views/components/navbarMobileButton.php") ?>
<?php include("../src/views/components/sidebar.php") ?>

<body>

    <main class="container mt-5">
        <div id="editUser" class="position-fixed row align-items-center text-center z-1" style="top: 8vh;">
            <h1 class="fw-bold">Editar perfil</h1>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">

                <form action="index.php?r=saveSettings" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= isset($user['id']) ? htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') : ''; ?>" />

                    <div class="text-center mb-4">
                        <img id="previewImageUser"
                            src="<?= !empty($user['profile_image']) ? '/uploads/' . htmlspecialchars($user['profile_image']) : '/public/assets/img/default-avatar.png'; ?>"
                            alt="Imatge de perfil"
                            class="rounded-circle shadow"
                            style="width: 120px; height: 120px; object-fit: cover;" />
                    </div>
                    <div class="mb-3">
                        <label for="profile_image" class="form-label">Canviar imatge</label>
                        <input class="form-control" type="file" name="profile_image" id="profile_image" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($user['name'] ?? '', ENT_QUOTES) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="last_name">Cognoms</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="<?= htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nickname">Nom d'usuari</label>
                        <input type="text" name="nickname" id="nickname" class="form-control" value="<?= htmlspecialchars($user['nickname'] ?? '', ENT_QUOTES) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email'] ?? '', ENT_QUOTES) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="password">Contrasenya nova</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Deixa buit si no vols canviar-la">
                    </div>
                    <div class="mb-3">
                        <label for="repeatPassword">Repetir contrasenya</label>
                        <input type="password" name="repeatPassword" id="repeatPassword" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Desar canvis</button>
                </form>
            </div>
        </div>

    <script>
    const fileInput = document.getElementById('profile_image');
    const previewImageUser = document.getElementById('previewImageUser');
    fileInput.addEventListener('change', e => {
        const file = e.target.files[0];
        if (file) previewImageUser.src = URL.createObjectURL(file);
    });
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
</body>
</html>