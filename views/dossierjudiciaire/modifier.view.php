<?php 
    ob_start()
?>
          <div class="col-lg-6">

<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Formulaire pour le dossier judiciaire</h5>
        <a href="<?= URL ?>dossier" class="btn btn-secondary">voir les dossier judiciaire</a>
    </div>
    <form method="post" action="<?= URL ?>dossier/modifierValidation/<?= $dossier->getIdDossier(); ?>">
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Resultat</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="resultat" required>
            <option selected>Choissiez le resultat</option>
            <option value="DEFERMENT_Mandat_de_depot" <?= $dossier->getResultat() === "DEFERMENT_Mandat_de_depot" ? 'selected' : '' ?> >DEFERMENT_Mandat_de_depot</option>
            <option value="DEFERMENT_Liberté_provisoire" <?= $dossier->getResultat() === "DEFERMENT_Liberté_provisoire" ? 'selected' : '' ?>>DEFERMENT_Liberté_provisoire</option>
            <option value="DOSSIER_A_TRANSMETTRE" <?= $dossier->getResultat() === "DOSSIER_A_TRANSMETTRE" ? 'selected' : '' ?>>DOSSIER_A_TRANSMETTRE</option>
            <option value="RETRAIT_DE_PLAINTE_dossier_classé" <?= $dossier->getResultat() === "RETRAIT_DE_PLAINTE_dossier_classé" ? 'selected' : '' ?>>RETRAIT_DE_PLAINTE_dossier_classé</option>
            <option value="RETRAIT_DE_PLAINTE_DAT" <?= $dossier->getResultat() === "RETRAIT_DE_PLAINTE_DAT" ? 'selected' : '' ?>>RETRAIT_DE_PLAINTE_DAT</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Verdict</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="verdict" required>
            <option selected>Choissiez le verdict</option>
            <option value="Condamné" <?= $dossier->getVerdict() === "Condamné" ? 'selected' : '' ?>>Condamné</option>
            <option value="Acquitté" <?= $dossier->getVerdict() === "Acquitté" ? 'selected' : '' ?>>Acquitté</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputDate" class="col-sm-2 col-form-label">Date de cloture</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="date" required value="<?= $dossier->getDateCloture() ?>">
        </div>
      </div>
      
      <div class="row mb-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="AjouterDossier">Modifier</button>
        </div>
      </div>

    </form>
  </div>
</div>

</div> 
<?php
    $title = "Dossier judiciaire";
    $secondtitle = "Modifier un dossier judiciaire";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>