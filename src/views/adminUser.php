<!DOCTYPE html>
<html lang="ca">
<?php include("../src/views/components/head.php") ?>

<body>
  <div class="row">
    <div>
      <div class="position-fixed top-0 start-0 h-100 d-none d-md-block">
        <?php include("../src/views/components/sidebar.php") ?>
      </div>

      <?php include("../src/views/components/navbarMobile.php") ?>
      <?php include("../src/views/components/navbarMobileButton.php") ?>
      <?php include("../public/assets/img/ods.php"); ?>

      <div id="searchBar" class="position-relative z-n1 row align-items-center text-center" style="top: 8vh; left: 0vh;">
        <h1 class="fw-bold">Administrar usuaris</h1>
      </div>

      <main class="container-fluid bg-hero-mobile" style="margin-top: 80px; border-radius: 30px 30px 0 0; padding-top: 20px;">
        <section class="container py-2">
          <div class="row g-4">
            <div class="col-12 mb-3">
              <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAddUser">
                Crear usuari
              </button>

              <div class="card h-100 border-0 shadow-sm ods-card">
                <div class="card-body">
                  <h5 class="card-title fw-bold">Llista d'usuaris</h5>

                  <table class="table table-hover align-middle">
                    <thead class="table-light">
                      <tr>
                        <th>Email</th>
                        <th>Nom</th>
                        <th>Cognom</th>
                        <th>Nickname</th>
                        <th>Administrador</th>
                        <th>Accions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $u => $value) { 
                        //if(!is_array($u)) continue?>
                        <tr data-bs-toggle="collapse" data-bs-target="#user<?= $u['id'] ?>" aria-expanded="false" style="cursor: pointer;">
                          <td><?= htmlspecialchars($u['email']) ?></td>
                          <td><?= htmlspecialchars($u['name']) ?></td>
                          <td><?= htmlspecialchars($u['last_name']) ?></td>
                          <td><?= htmlspecialchars($u['nickname']) ?></td>
                          <td>
                            <?= $u['isAdmin'] ? '<span class="badge bg-info">Admin</span>' : '<span class="badge bg-danger">Admin</span>' ?>
                          </td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#users<?= $u['id'] ?>">Editar</button>
                          </td>
                        </tr>

                        <!-- Fila oculta para editar -->
                        <tr class="collapse" id="users<?= $u['id'] ?>">
                          <td colspan="6">
                            <form method="POST" action="index.php" enctype="multipart/form-data" class="border rounded p-3 bg-light">
                              <input type="hidden" name="r" value="UserUpdate">
                              <input type="hidden" name="id" value="<?= $u['id'] ?>">

                              <div class="row g-3">
                                <div class="col-md-6">
                                  <label class="form-label">Nom</label>
                                  <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($u['name']) ?>">
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Cognom</label>
                                  <input type="text" class="form-control" name="last_name" value="<?= htmlspecialchars($u['last_name']) ?>">
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Nickname</label>
                                  <input type="text" class="form-control" name="nickname" value="<?= htmlspecialchars($u['nickname']) ?>">
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Email</label>
                                  <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($u['email']) ?>">
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Contrasenya</label>
                                  <input type="password" class="form-control" name="password" placeholder="Nova contrasenya (opcional)">
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Imatge de perfil</label>
                                  <input type="file" class="form-control" name="profile_image">
                                </div>
                                <div class="col-md-6">
                                  <label class="form-label">Administrador</label>
                                  <select class="form-select" name="isAdmin">
                                    <option value="0" <?= $u['isAdmin'] ? '' : 'selected' ?>>No</option>
                                    <option value="1" <?= $u['isAdmin'] ? 'selected' : '' ?>>Sí</option>
                                  </select>
                                </div>
                              </div>

                              <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-success">Guardar canvis</button>
                              </div>
                            </form>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>
        </section>
      </main>
    </div>
  </div>

  <!-- Modal per afegir usuari -->
  <div class="modal fade" id="modalAddUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form action="index.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="r" value="UserAdd">
          <div class="modal-header">
            <h5 class="modal-title">Crear nou usuari</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tancar"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Cognom</label>
                <input type="text" name="last_name" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Nickname</label>
                <input type="text" name="nickname" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Contrasenya</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Imatge de perfil</label>
                <input type="file" name="profile_image" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Administrador</label>
                <select class="form-select" name="isAdmin">
                  <option value="0">No</option>
                  <option value="1">Sí</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Crear usuari</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
