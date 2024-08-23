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
    <form method="post" action="<?= URL ?>suspect/modifierValidation/<?= $suspect->getIdSuspect() ?>" enctype="multipart/form-data">
      <div class="row mb-4">
        <label for="profileImage" class="col-sm-2 col-form-label">Photo</label>
        <div class="col-sm-10">
          <?php if (!empty($_SESSION["image"])): ?>
            <div class="mt-2">
              <img src="<?= URL ?>public/images/suspect/<?= $suspect->getImage() ?>" alt="Photo de Profil" class="img-thumbnail" style="max-width: 150px;">
            </div>
            <?php endif; ?>
            <br>
            <input name="image" type="file" class="form-control" id="profileImage" accept="image/*">
        </div>
      </div>
      <div class="row mb-4">
        <label class="col-sm-2 col-form-label">Infraction</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="idinfraction" required>
            <option selected>Choissiez l'infraction</option>
            <?php for($i = 0; $i < count($infractions); $i++):?>
            <option value="<?= $infractions[$i]["ID_Infraction"]; ?>" <?= $suspect->getInfraction() === $infractions[$i]["Description"]? 'selected' : '' ?> ><?= $infractions[$i]["ID_Infraction"]. " - " . $infractions[$i]["Description"]; ?></option>
            <?php endfor ;?>
          </select>
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nom" required value="<?= $suspect->getNom() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Prenom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="prenom" value="<?= $suspect->getPrenom() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Surnom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="surnom" value="<?= $suspect->getSurnom() ?>">
        </div>
      </div>
      <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" id="gridRadios1" value="M" <?= $suspect->getSexe() === "M"? 'checked' : '' ?>>
            <label class="form-check-label" for="gridRadios1">
              Masculin
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" id="gridRadios2" value="F" <?= $suspect->getSexe() === "F"? 'checked' : '' ?>>
            <label class="form-check-label" for="gridRadios2">
                Feminin
            </label>
          </div>
        </div>
      </fieldset>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">CIN</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="cin" value="<?= $suspect->getCin() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="age" required value="<?= $suspect->getAge() ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputDate" class="col-sm-2 col-form-label">Date de naissance</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="date" required value="<?= $suspect->getDateNaissance() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Lieu de naissance</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="lieu" value="<?= $suspect->getLieuNaissance() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="adresse" value="<?= $suspect->getAdresse() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Contact</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="contact" value="<?= $suspect->getContact() ?>">
        </div>
      </div>
      <div class="row mb-4">
        <label for="inputText" class="col-sm-2 col-form-label">Profession</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="profession" value="<?= $suspect->getProfession() ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Description physique</label>
        <div class="col-sm-10">
          <textarea class="form-control" style="height: 100px" name="description"><?= $suspect->getDescriptionPhysique() ?></textarea>
        </div>
      </div>
      <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Antecedent criminelle</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="antecedent" id="gridRadios3" value="OUI" <?= $suspect->getAntecedentCriminelle() === "OUI"? 'checked' : '' ?>>
            <label class="form-check-label" for="gridRadios3">
              Oui
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="antecedent" id="gridRadios4" value="NON" <?= $suspect->getAntecedentCriminelle() === "NON"? 'checked' : '' ?>>
            <label class="form-check-label" for="gridRadios4">
                Non
            </label>
          </div>
        </div>
      </fieldset>
      <div class="row mb-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="AjoutersUSPECT">Modifier</button>
        </div>
      </div>

    </form>
  </div>
</div>

</div>
<?php
    $title = "Suspect";
    $secondtitle = "Modifier un suspect";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>