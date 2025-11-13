<div class="d-none d-md-block d-flex flex-column min-vh-100 p-0 border-end border-primary" >
    <div class="">
    <div class="d-flex flex-column flex-grow-1 justify-content-between px-3 pt-2">
            <a href="/index.php" class="d-flex align-items-center pb-3 text-gradient">
                <span class="ps-5 fs-1 d-none d-sm-inline text-gradient"><strong>GYMKHANA</strong></span>
            </a>
            
            <ul class="nav flex-column align-items-start px-3 pt-3 w-100">

                <hr class="border-top border-secondary opacity-50 w-100 my-2">

                <p class="alt-text-color ps-4"><strong>MENÚ</strong></p>
                <li class="nav-item mb-2 w-100">
                <a href="/index.php" class="nav-link text-black d-flex align-items-center fs-4">
                    <i class="fa-solid fa-house me-2 fs-4"></i> Inici
                </a>
                </li>

                <?php if (!isset($_SESSION['user'])): ?>
                <li class="nav-item mb-2 w-100">
                <a href="/index.php?r=login" class="nav-link text-black d-flex align-items-center fs-4">
                    <i class="fa-solid fa-right-to-bracket me-2 fs-4"></i> Inicia sessió
                </a>
                </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item mb-2 w-100">
                <a href="/index.php?r=alerts" class="nav-link text-black d-flex align-items-center fs-4">
                    <i class="fa-solid fa-bell me-2 fs-4"></i> Alertes
                </a>
                </li>
                <li class="nav-item mb-2 w-100">
                <a href="/index.php?r=userProfile" class="nav-link text-black d-flex align-items-center fs-4">
                    <i class="fa-solid fa-user me-2 fs-4"></i> Perfil
                </a>
                </li>
                <?php endif; ?>

                <hr class="border-top border-secondary opacity-50 w-100 my-2">

                <li class="nav-item mb-2 w-100">
                <a href="/index.php?r=petjada" class="nav-link text-black d-flex align-items-center fs-4">
                    <i class="fa-solid fa-paw me-2  fs-4"></i> Petjada de carboni
                </a>
                </li>
                <li class="nav-item mb-2 w-100">
                <a href="/index.php?r=ODS" class="nav-link text-black d-flex align-items-center fs-4">
                    <i class="fa-solid fa-scale-balanced me-2  fs-4"></i> ODS
                </a>
                </li>

                <hr class="border-top border-secondary opacity-50 w-100 my-2">

                <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == '1'): ?>
                <p class="alt-text-color ps-4"><strong>ADMIN</strong></p>
                <li class="nav-item mb-2 w-100">
                <a href="/index.php?r=adminUser" class="nav-link text-black d-flex align-items-center fs-4">
                    <i class="fa-solid fa-user-gear me-2 fs-4"></i> Administrar usuaris
                </a>
                </li>
                <li class="nav-item mb-2 w-100">
                <a href="/index.php?r=createGymkhana" class="nav-link text-black d-flex align-items-center fs-4">
                    <i class="fa-solid fa-square-plus me-2 fs-4"></i> Crear gimcana
                </a>
                </li>
                <li class="nav-item mb-2 w-100">
                <a href="/index.php?r=administrateComs" class="nav-link text-black d-flex align-items-center fs-4">
                    <i class="fa-solid fa-comment-dots me-2 fs-4"></i> Administrar coms
                </a>
                </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['user'])): ?>
                <hr class="border-top border-secondary opacity-50 w-100 my-2">

                <li class="nav-item w-100 position-bottom">
                    <a href="/index.php?r=logOut" class="nav-link text-black d-flex align-items-center fs-4">
                        <i class="fa-solid fa-right-from-bracket me-2 fs-4"></i> Tancar sessió
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>