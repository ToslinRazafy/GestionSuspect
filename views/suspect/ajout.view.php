<?php 
    ob_start()
?>
        <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Formulaire pour le suspect</h5>
        <a href="<?= URL ?>suspect" class="btn btn-secondary">voir les suspects</a>
    </div>
    <form method="post" action="<?= URL ?>suspect/ajoutValidation" enctype="multipart/form-data">
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Infraction</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="idinfraction" required>
            <option selected>Choissiez l'infraction</option>
            <?php for($i = 0; $i < count($infractions); $i++):?>
            <option value="<?= $infractions[$i]["ID_Infraction"]; ?>"><?= $infractions[$i]["ID_Infraction"]. " - " . $infractions[$i]["Description"]; ?></option>
            <?php endfor ;?>
          </select>
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Identifiant du suspect</label>
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
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">CIN</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="cin">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="age" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="date" required>
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Lieu de naissance</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="lieu">
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
      <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Description physique</label>
        <div class="col-sm-10">
          <textarea class="form-control" style="height: 100px" name="description"></textarea>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
          <input class="form-control" type="file" id="formFile" name="image">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="AjoutersUSPECT">Ajouter</button>
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