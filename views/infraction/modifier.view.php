<?php 
    ob_start()
?>
        <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Formulaire pour l'infraction</h5>
        <a href="<?= URL ?>infraction" class="btn btn-secondary">voir les infractions</a>
    </div>
    <form method="post" action="<?= URL ?>infraction/modifierValidation/<?= $infracation->getIdInfraction() ?>">
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Identifiant de l'infraction</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="id" required value="<?= $infracation->getIdInfraction() ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="date" required value="<?= $infracation->getDate() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Lieu</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="lieu" required value="<?= $infracation->getLieu() ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <textarea class="form-control" style="height: 100px" name="description" required value="<?= $infracation->getDescription() ?>"><?= $infracation->getDescription() ?></textarea>
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Categorie de l'infraction</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="categorie" required>
            <option>Choissiez la categorie</option>

            <?php foreach($categories as $categorie):?>
              <option value="<?= $categorie->getNom()?>" <?php if($infracation->getCategorie() == $categorie->getNom()) echo 'selected';  ?> ><?= $categorie->getNom()?></option>
            <?php endforeach ;?>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-sm-8">
          <button type="submit" class="btn btn-primary" name="Modifier">Modifier</button>
        </div>
      </div>

    </form>
  </div>
</div>

</div>
<?php
    $title = "Infraction";
    $secondtitle = "Modifier un infraction";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>