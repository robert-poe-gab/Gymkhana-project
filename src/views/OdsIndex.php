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
        <div id="searchBar" class="position-relative z-n1 row align-items-center text-center" style="top: 18vh; left: 0vh;">
          <h1 class="fw-bold">ODS</h1>
        </div>
        <main class="container-fluid bg-hero-mobile full-height" style="margin-top: 180px; border-radius: 30px 30px 0 0; padding-top: 20px;">
          <section class="container py-2">
            <div class="row col-lg-6 col-sm-12 ">
              <p class="text-body-secondary">
                Els ODS són un conjunt de 17 objectius globals aprovats per les Nacions Unides dins l’Agenda 2030.
              </p>
            </div>
          </section>

          <section class="container py-2">
            <div class="row g-4">
              <?php foreach($ods as $key => $value) { ?>
                <div class="col-6 col-lg-12 mb-3">
                  <div class="card h-100 border-0 shadow-sm ods-card">
                    <div class="card-body d-flex flex-column flex-lg-row align-items-center align-items-lg-start gap-3">
                      
                      <img class="img-fluid border rounded-4"
                          style="width: 120px; height: auto;"
                          src="<?php echo $aODS[$value['id_ods']]; ?>"
                          alt="ODS <?php echo $value['id_ods']; ?>">

                      <div class="flex-grow-1 d-flex flex-column">
                        <h5 class="card-title fw-bold text-center text-lg-start">
                          ODS <?php echo $value["id_ods"]; ?>: <?php echo $value["title"]; ?>
                        </h5>
                        <p class="text-center text-lg-start"><?php echo $value["description"]; ?></p>
                        <div class=" text-center text-lg-start mt-auto gap-2">
                          <button class="btn btn-outline-primary btn-secondary"
                                  data-bs-toggle="modal"
                                  data-bs-target="#staticBackdrop"
                                  data-bs-ods="<?php echo $value['id_ods']; ?>">
                            Ver
                          </button>

                          <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == '1'): ?>
                            <button class="btn btn-outline-primary btn-secondary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdropEdit"
                                    data-bs-ods="<?php echo $value['id_ods']; ?>">
                              Editar
                            </button>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </section>
        </main>
      </div>
  </div>

  <!-- View modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body" id="modalContent"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit modal -->
  <div class="modal fade" id="staticBackdropEdit" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="staticBackdropEditLabel">Editar ODS</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
        </div>
        <form id="editOdsForm" action="index.php" method="POST">
          <input type="hidden" name="r" value="OdsUpdate" />
          <input type="hidden" id="editOdsId" name="id" value="" />
          <div class="modal-body">
            <div class="mb-3">
              <label for="description" class="form-label"><strong>Descripció</strong></label>
              <textarea type="text" class="form-control" id="description" name="description" value="" disabled></textarea>
            </div>
            <div class="mb-3">
              <label for="editor" class="form-label"><strong>Metas</strong></label>
              <div id="edit-toolbar">
                <span class="ql-formats">
                  <select class="ql-header">
                    <option selected></option>
                    <option value="1"></option>
                    <option value="2"></option>
                  </select>
                  <button class="ql-bold"></button>
                  <button class="ql-italic"></button>
                  <button class="ql-underline"></button>
                  <button class="ql-list" value="ordered"></button>
                  <button class="ql-list" value="bullet"></button>
                  <button class="ql-link"></button>
                  <button class="ql-image"></button>
                  <button class="ql-clean"></button>
                </span>
              </div>

              <div id="editor" style="height: 300px; background: white;"></div>

              <input type="hidden" id="text" name="text">
            </div>
          </div>

          <div class="modal-footer d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" onclick="prepareQuillContent()" class="btn btn-primary">Desar canvis</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script>
    function prepareQuillContent() {
      if (editQuill) {
        document.getElementById('text').value = editQuill.getSemanticHTML();
      }
    }
  </script>

  <script>
    const ods = <?php echo json_encode($ods, JSON_UNESCAPED_UNICODE); ?>;
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/ods.js"></script>
  <!-- Cookie Consent -->
  <script type="module" src="./js/cookieconsent-config.js"></script>
</body>
</html>
