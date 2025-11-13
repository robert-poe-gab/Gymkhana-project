<!DOCTYPE html>
<html lang="es">

<?php include("../src/views/components/head.php") ?>


<body class="d-flex justify-content-center align-items-center bg-gradient">

    <div class="login-container text-center p-4" style="max-width: 400px; width: 100%;">
        <h1 class="mb-4">Registra't</h1>

        <form action="index.php" method="POST">
            <input type="hidden" name="r" value="doRegister">

            <div class="mb-3 text-start">
                <label for="nickname" class="form-label">Nom d'usuari</label>
                <input type="text" id="nickname" name="nickname" class="form-control rounded-pill text-secondary" placeholder="Nom d'usuari" required>
            </div>
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Nom</label>
                <input type="text" id="name" name="name" class="form-control rounded-pill text-secondary" placeholder="Nom" required>
            </div>
            <div class="mb-3 text-start">
                <label for="lastName" class="form-label">Cognoms</label>
                <input type="text" id="lastName" name="lastName" class="form-control rounded-pill bs-secondary" placeholder="Cognoms" required>
            </div>
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control rounded-pill text-secondary" placeholder="Email" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Contrasenya</label>
                <input type="password" id="password" name="password" class="form-control rounded-pill text-secondary" placeholder="Contrasenya" required>
            </div>
            <div class="mb-3 text-start">
                <label for="repeatPassword" class="form-label">Repetir contrasenya</label>
                <input type="password" id="repeatPassword" name="repeatPassword" class="form-control rounded-pill text-secondary" placeholder="Repetir contrasenya" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Continuar</button>
                <a href="index.php?r=login" class="btn btn-secondary">Iniciar sessió</a>
                <a href="/index.php" type="submit" class="link-underline">Entrar sense registar-te</a>
            </div>
        </form>
    </div>
</body>

</html>