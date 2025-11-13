<!DOCTYPE html>
<html lang="es">

<?php include("../src/views/components/head.php") ?>


<body class="d-flex justify-content-center align-items-center vh-100 bg-gradient">

    <div class="login-container text-center p-4" style="max-width: 400px; width: 100%;">
        <h1 class="mb-4">Inicia sessió</h1>


        <div class="alert alert-danger <?php if(!isset($_GET["error"]) || !in_array($_GET["error"], ["1","2"])) echo "d-none" ?>">
            Credencials incorrectes. Torna-ho a provar.
        </div>

        <form action="/index.php?r=ctrlDoLogin" method="POST">
            <input type="hidden" name="r" value="doLogin">

            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email"
                    class="form-control rounded-pill text-secondary" placeholder="Email" required>
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Contrasenya</label>
                <input type="password" id="password" name="password" class="form-control rounded-pill bs-terciary"
                    placeholder="Contrasenya" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Continuar</button>
                <a href="/index.php?r=register" type="submit" class="btn btn-secondary">Registra't</a>
                <a href="/index.php" type="submit" class="link-underline">Entrar sense iniciar sessió</a>
            </div>
        </form>
    </div>
</body>
