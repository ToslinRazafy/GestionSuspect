<?php 
    ob_start()
?>
<div class="col-lg-9">

    <div class="card p-2">
        <h1 class="text-center">Information du suspect</h1>
        <div class="card-body d-flex align-center gap-lg-5">
            <div class="object-fit-cover m-2 row-mb-3">
                <img src="<?= URL ?>public/images/suspect/<?= $suspect->getImage() ?>" alt="image" class="img-thumbnail" width="500px">
            </div>
            <div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Identifiant du suspect :</strong> <?= $suspect->getIdSuspect() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Nom :</strong> <?= $suspect->getNom() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Prenom :</strong> <?= $suspect->getPrenom() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Surnom:</strong> <?= $suspect->getSurnom() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Sexe :</strong> <?= $suspect->getSexe() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>CIN:</strong> <?= $suspect->getCin() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Date de naissance :</strong> <?= $suspect->getDateNaissance() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Lieu de naissance :</strong> <?= $suspect->getLieuNaissance() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Adresse :</strong> <?= $suspect->getAdresse() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Contact :</strong> <?= $suspect->getContact() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Profession :</strong> <?= $suspect->getProfession() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Description Physique :</strong> <?= $suspect->getDescriptionPhysique() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Antecedent Criminelle :</strong> <?= $suspect->getAntecedentCriminelle() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Infraction commise :</strong> <?= $suspect->getInfraction() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Categorie Infractios :</strong> <?= $suspect->getCategorieInfraction() ?></label>
                </div>      
                <div class="row mb-3">
                    <div class="col-sm-10">
                    <a href="<?=URL ?>suspect" class="btn btn-primary">Retour</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<?php
    $title = "Suspect";
    $secondtitle = "Modifier un suspect";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>