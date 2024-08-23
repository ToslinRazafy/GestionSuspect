<?php 
    ob_start()
?>
        <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Formulaire pour ajouter un suspect dans le dossier judiciaire</h5>
        <a href="<?= URL ?>dossier" class="btn btn-secondary">voir les dossier judiciaire</a>
    </div>
    <form method="post" action="<?= URL ?>dossier/ajoutSuspectValidation/<?= $id ?>">
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Suspect</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="suspect" required>
            <option selected>Choissiez un suspect</option>
            <?php for($i = 0; $i < count($suspects); $i++):?>
            <option value="<?= $suspects[$i]["ID_Suspect"]; ?>"><?= $suspects[$i]["ID_Suspect"]. " - " . $suspects[$i]["Nom"] . " " . $suspects[$i]["Prenom"] . " " . $suspects[$i]["CIN"] . " " . $suspects[$i]["Surnom"]; ?></option>
            <?php endfor ;?>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="AjouterDossier">Ajouter</button>
        </div>
      </div>

    </form>
  </div>
</div>

</div>
<?php
    $title = "Suspect";
    $secondtitle = "Ajouter un suspect";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>