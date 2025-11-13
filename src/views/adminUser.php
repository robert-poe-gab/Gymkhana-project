<!DOCTYPE html>
<html lang="ca">
<?php include("../src/views/components/head.php") ?>


<body>
    <div class="main-content"><div class="position-fixed top-0 start-0 h-100 d-none d-md-block">
      <?php include("../src/views/components/sidebar.php") ?>
    </div>

    <?php include("../src/views/components/navbarMobile.php") ?>
    <?php include("../src/views/components/navbarMobileButton.php") ?>
    <?php include("../public/assets/img/ods.php"); ?>
    <div class="position-relative z-n1 row align-items-center text-center" style="top: 8vh; left: 0vh;">
      <h1 class="fw-bold">Administrar usuaris</h1>
    </div>
    <main class="container-fluid bg-hero-mobile" style="margin-top: 80px; border-radius: 30px 30px 0 0; padding-top: 20px;">
      <section class="container py-2">
        <div class="row g-4">
          <div class="col-12 mb-3">
            

            <div class="card h-100 border-0 shadow-sm ods-card w-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h5 class="card-title fw-bold mb-0">Llista d'usuaris</h5>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddUser">
                    Crear usuari
                  </button>
                </div>  
                <table class="table table-hover align-middle">
                  <thead class="table-light">
                    <tr>
                      <th>Email</th>
                      <th>Nom</th>
                      <th>Cognom</th>
                      <th>Nickname</th>
                      <th class="mx-auto p-2">Administrador</th>
                      <th></th>
                    </tr>
                  </thead>
                  

                  <tbody>
                    <?php foreach ($users as $u) { ?>
                      <tr>
                        <td><?= htmlspecialchars($u['email']) ?></td>
                        <td><?= htmlspecialchars($u['name']) ?></td>
                        <td><?= htmlspecialchars($u['last_name'] ?? '')?></td>
                        <td><?= htmlspecialchars($u['nickname'] ?? '')?></td>
                        <td>
                          <?= $u['isAdmin'] ? '<span class="badge bg-success">Admin</span>' : '<span class="badge bg-info">User</span>' ?>
                        </td>
                        <td>
                          <button 
                            class="btn btn-sm btn-outline-primary toggle-edit" 
                            type="button" 
                            data-target="#users<?= $u['id'] ?>"
                          >
                            Editar
                          </button>

                          <button type="button" class="btn btn-sm btn-outline-danger" 
                                  data-bs-toggle="modal" 
                                  data-bs-target="#deleteUserModal" 
                                  data-username="<?= htmlspecialchars($u['nickname']) ?>" 
                                  data-userid="<?= $u['id'] ?>">
                              Eliminar
                          </button>

                        </td>
                      </tr>

                      <!-- Collapse -->
                      <tr>
                        <td colspan="6" class="p-0">
                          <div class="collapse" id="users<?= $u['id'] ?>">
                            <div class="border rounded p-3 bg-light mt-2">
                              <form method="POST" action="index.php" enctype="multipart/form-data">
                                <input type="hidden" name="r" value="UserUpdate">
                                <input type="hidden" name="id" value="<?= $u['id'] ?>">

                                <div class="row g-3">
                                  <div class="col-md-6">
                                    <label class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($u['name']) ?>">
                                  </div>
                                  <div class="col-md-6">
                                    <label class="form-label">Cognom</label>
                                    <input type="text" class="form-control" name="last_name" value="<?= htmlspecialchars($u['last_name'] ?? '') ?>">
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
                            </div>
                          </div>
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

  <!-- Modal delete user-->

  <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" action="index.php">
          <input type="hidden" name="r" value="UserDelete">
          <input type="hidden" name="id" id="deleteUserId">
          <div class="modal-header">
            <h5 class="modal-title">Confirmar eliminación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <p id="deleteUserMessage">Estas seguro que quieres eliminar este usuario?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal add user -->
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

  <script src="./js/deleteUser.js"></script>
  <script src="./js/toggleEdit.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
