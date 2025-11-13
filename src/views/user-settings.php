<!DOCTYPE html>
<html lang="es">

<?php include("../src/views/components/head.php") ?>

<body class="d-flex vh-100 bg-light">
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card text-center shadow-sm p-3" style="width: 22rem;">
            <img src="<?=$link ?>" class="rounded-circle mx-auto mt-3" alt="Foto de perfil"
                width="120">
            <h5 class="card-title mb-0"> <?=$userData['name'] . $userData['last_name']?> </h5>
            <div class="card-body">
                <p class="text-muted"> <?=$userData['email']?> </p>
                <p class="mb-1"><strong>Email:</strong> <?=$userData['email']?> </p>
                <p class="mb-1"><strong>Miembro desde:</strong> <?=$userData['created_at']?> </p>
                <a href="/index.php?r=settings&id=<?= $user['id'] ?>" class="btn btn-primary btn-sm mt-3">Editar perfil</a>
            </div>
        </div>
    </div>



</body>

</html>