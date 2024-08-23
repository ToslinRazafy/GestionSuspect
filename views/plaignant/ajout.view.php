<?php 
    ob_start();
    $url1 = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);
?>
        <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <?php
      if(isset($url1[2]) && $url1[2] === "erreur"){
        echo "
          <div class='alert alert-danger alert-dismissible fade show mt-2' role='alert'>
            <i class='bi bi-exclamation-octagon me-1'></i>
            Le plaignant existe deja
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
          <script>
            setTimeout(() => {
              document.querySelector('.alert').remove();
            }, 3000);
          </script>
        ";
      }
    ?>
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Formulaire pour le plaignant</h5>
        <a href="<?= URL ?>plaignant" class="btn btn-secondary">voir les plaignants</a>
    </div>
    <form method="post" action="<?= URL ?>plaignant/ajoutValidation">
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Identifiant de l'plaignant</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="id" required>
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nom" required>
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Prenom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="prenom">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Surnom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="surnom">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">CIN</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="cin">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="adresse">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Contact</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="contact">
        </div>
      </div> 
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Profession</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="profession">
        </div>
      </div> 
      <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" id="gridRadios1" value="M" checked>
            <label class="form-check-label" for="gridRadios1">
              Masculin
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" id="gridRadios2" value="F">
            <label class="form-check-label" for="gridRadios2">
                Feminin
            </label>
          </div>
        </div>
      </fieldset>
      <div class="row mb-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="Ajouterplaignant">Ajouter</button>
        </div>
      </div>

    </form>
  </div>
</div>

</div>
<?php
    $title = "plaignant";
    $secondtitle = "Ajouter un plaignant";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>