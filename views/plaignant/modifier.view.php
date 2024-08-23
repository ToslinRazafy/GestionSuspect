<?php 
    ob_start()
?>
        <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Formulaire pour le plaignant</h5>
        <a href="<?= URL ?>plaignant" class="btn btn-secondary">voir les plaignants</a>
    </div>
    <form method="post" action="<?= URL ?>plaignant/modifierValidation/<?= $plaignant->getIdPlaignant()  ?>">
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nom" required value="<?= $plaignant->getNom() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Prenom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="prenom" value="<?= $plaignant->getPrenom() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Surnom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="surnom" value="<?= $plaignant->getSurnom() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">CIN</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="cin" value="<?= $plaignant->getCin() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="adresse" value="<?= $plaignant->getAdresse() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Contact</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="contact" value="<?= $plaignant->getContact() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Contact</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="profession" value="<?= $plaignant->getProfession() ?>">
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
          <button type="submit" class="btn btn-primary" name="Modifierplaignant">Modifier</button>
        </div>
      </div>

    </form>
  </div>
</div>

</div>

</div>
<?php
    $title = "Plaignant";
    $secondtitle = "Modifier un plaignant";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>