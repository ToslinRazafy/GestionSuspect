<?php 
    ob_start()
?>
<div class="col-lg-9">

    <div class="card p-2">
        <h1 class="text-center mb-4">Information du dossier</h1>
        <div class="card-body d-flex align-center gap-lg-5">
            <div>
                <h3 class="text-decoration-underline mb-4">Dossier Judiciaire</h3>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Identifiant du dossier :</strong> <?= $dossier->getIdDossier() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Resultat :</strong> <?= $dossier->getResultat() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Verdict :</strong> <?= $dossier->getVerdict() ?></label>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class=""><strong>Date de cloture :</strong> <?= $dossier->getDateCloture() ?></label>
                </div>
    
                <div class="row mb-3">
                    <div class="col-sm-10">
                    <a href="<?=URL ?>dossier" class="btn btn-primary">Retour</a>
                    </div>
                </div>

            </div>
            <div>
                <h3 class="text-decoration-underline mb-4">Suspect</h3>
                <?php for($i = 0; $i < count($suspects); $i++): ?>
                    <div class="pb-2 mb-3 border-bottom"">
                        <h4 class="bold">Suspect numero : <?= $i + 1 ?></h4>
                        <div class="m-lg-4">
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Identifiant du suspect :</strong> <?= $suspects[$i]["ID_Suspect"] ?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Nom :</strong> <?= $suspects[$i]["Nom"] ?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Prenom :</strong> <?= $suspects[$i]["Prenom"] ?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Surnom:</strong> <?= $suspects[$i]["Surnom"]?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Sexe :</strong> <?= $suspects[$i]["Sexe"]?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>CIN:</strong> <?=$suspects[$i]["CIN"]?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Date de naissance :</strong> <?= $suspects[$i]["Date_naiss"] ?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Lieu de naissance :</strong> <?= $suspects[$i]["Lieu_naiss"] ?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Adresse :</strong> <?= $suspects[$i]["Adresse"] ?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Contact :</strong> <?= $suspects[$i]["Contact"] ?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Description Physique :</strong> <?= $suspects[$i]["Description_physique"] ?></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class=""><strong>Antecedent Criminelle :</strong> <?= $suspects[$i]["Antecedent_Criminelle"] ?></label>
                            </div>    
                        </div>
                    </div>
                <?php endfor ?>
            </div>
        </div>
    
    </div>

</div>
<?php
    $title = "Dossier Judiciaire";
    $secondtitle = "Liste des dossier judiciaire";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>