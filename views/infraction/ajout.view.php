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
    <form method="post" action="<?= URL ?>infraction/ajoutValidation">
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Identifiant de l'infraction</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="id" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="date" required>
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Lieu</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="lieu" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <textarea class="form-control" style="height: 100px" name="description" required></textarea>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Categorie de l'infraction</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="categorie" required>
            <option selected>Choissiez la categorie</option>
            <?php for($i = 0; $i < count($categories); $i++):?>
            <option value="<?= $categories[$i]->getNom(); ?>"><?= $categories[$i]->getNom(); ?></option>
            <?php endfor ;?>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="AjouterInfraction">Ajouter</button>
        </div>
      </div>
     
    </form>

  </div>
</div>

</div>
<?php
    $title = "Infraction";
    $secondtitle = "Ajouter un infraction";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>