<div id="navbarMobile"  class="text-white position-fixed top-0 start-0 min-vh-100 p-3 d-flex flex-column justify-content-end col-12" 
    style=" transform: translateX(-100%); transition: transform 0.3s; z-index:1050;">
  <div class="text-end p-3">
    <button id="closeMenu" type="button"
        class="btn p-2 position-fixed top-0 start-0 m-3"
        aria-label="Clsoe">
        <i class="fa-solid fa-xmark fs-1"></i>
    </button>
  </div>  
<ul class="nav flex-column align-items-start px-3 pt-3 w-100">

    <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == '1'): ?>
    <li class="nav-item mb-2 w-100">
      <a href="/index.php?r=adminUser" class="nav-link text-black d-flex align-items-center fs-4">
          <i class="fa-solid fa-user-gear me-2 fs-4"></i> Administrar usuaris
      </a>
    </li>
    <li class="nav-item mb-2 w-100">
      <a href="/index.php?r=createGymkhana" class="nav-link text-black d-flex align-items-center fs-2">
        <i class="fa-solid fa-square-plus me-2 fs-2"></i> Crear gimcana
      </a>
    </li>
    <li class="nav-item mb-2 w-100">
      <a href="/index.php?r=administrateComs" class="nav-link text-black d-flex align-items-center fs-2">
        <i class="fa-solid fa-comment-dots me-2 fs-2"></i> Administrar coms
      </a>
    </li>
    <?php endif; ?>

    <hr class="border-top border-secondary opacity-50 w-100 my-2">

    <li class="nav-item mb-2 w-100">
      <a href="/index.php" class="nav-link text-black d-flex align-items-center fs-2">
        <i class="fa-solid fa-house me-2 fs-2"></i> Inici
      </a>
    </li>
    <?php if (!isset($_SESSION['user'])): ?>
    <li class="nav-item mb-2 w-100">
      <a href="/index.php?r=login" class="nav-link text-black d-flex align-items-center fs-2">
        <i class="fa-solid fa-right-to-bracket me-2 fs-2"></i> Inicia sessió
      </a>
    </li>
    <?php endif; ?>
    <?php if (isset($_SESSION['user'])): ?>
    <li class="nav-item mb-2 w-100">
      <a href="/index.php?r=alerts" class="nav-link text-black d-flex align-items-center fs-2">
        <i class="fa-solid fa-bell me-2 fs-2"></i> Alertes
      </a>
    </li>
    <li class="nav-item mb-2 w-100">
      <a href="/index.php?r=userProfile" class="nav-link text-black d-flex align-items-center fs-2">
        <i class="fa-solid fa-user me-2 fs-2"></i> Perfil
      </a>
    </li>
    <li class="nav-item mb-2 w-100">
      <a href="/index.php?r=logOut" class="nav-link text-black d-flex align-items-center fs-2">
        <i class="fa-solid fa-right-from-bracket me-2 fs-2"></i> Tancar sessió
      </a>
    </li>
    <?php endif; ?>

    <hr class="border-top border-secondary opacity-50 w-100 my-2">

    <li class="nav-item mb-2 w-100">
      <a href="/index.php?r=petjada" class="nav-link text-black d-flex align-items-center fs-2">
        <i class="fa-solid fa-paw me-2  fs-2"></i> Petjada de carboni
      </a>
    </li>
    <li class="nav-item mb-2 w-100">
      <a href="/index.php?r=ODS" class="nav-link text-black d-flex align-items-center fs-2">
        <i class="fa-solid fa-scale-balanced me-2  fs-2"></i> ODS
      </a>
    </li>
  </ul>
  <br><br>
</div>