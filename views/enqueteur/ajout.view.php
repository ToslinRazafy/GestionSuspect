<?php 
    ob_start()
?>
        <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Formulaire pour l'enqueteur</h5>
        <a href="<?= URL ?>enqueteur" class="btn btn-secondary">voir les enqueteur</a>
    </div>
    <form method="post" action="<?= URL ?>enqueteur/ajoutValidation" enctype="multipart/form-data">
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Identifiant de l'enqueteur</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="id" required>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Identifiant du service</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="service" required>
            <option selected>Choissiez le service</option>
            <?php for($i = 0; $i < count($services); $i++):?>
            <option value="<?= $services[$i]->getIdService(); ?>"><?= $services[$i]->getIdService(); ?></option>
            <?php endfor ;?>
          </select>
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nom" required>
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Garde</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="grade" required>
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Contact</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="contact" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="image" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="image" name="image">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="AjouterInfraction">Ajouter</button>
        </div>
      </div>

    </form><!-- End General Form Elements -->

  </div>
</div>

</div>
<?php
    $title = "Infraction";
    $secondtitle = "Ajouter un infraction";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>