<?php 
    ob_start()
?>
          <div class="col-lg-12">

<div class="card">
  <div class="card-body">
  <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Liste des dossier</h5>
        <a href="<?= URL ?>dossier/ajout" class="btn btn-secondary">Ajouter un dossier</a>
    </div>
    <div class="overflow-auto">
      <table class="table datatable">
        <thead>
          <tr>
            <th>Identifiant</th>
            <th>Resultat</th>
            <th>Verdict</th>
            <th data-type="date" data-format="YYYY/DD/MM">Date de cloture</th>
            <th data-type="date" data-format="YYYY/DD/MM">Date d'ajout</th>
            <th>Action</th>
            <th>Action</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(empty($dossiers)):?>
          <?php else:?>
            <?php for($i = 0; $i < count($dossiers); $i++): ?>
          <tr>
            <td><?= $dossiers[$i]->getIdDossier(); ?></td>
            <td><?= $dossiers[$i]->getResultat(); ?></td>
            <td><?= $dossiers[$i]->getVerdict(); ?></td>
            <td><?= $dossiers[$i]->getDateCloture(); ?></td>
            <td><?= $dossiers[$i]->getDate(); ?></td>
            <td><a href="<?= URL ?>dossier/information/<?= $dossiers[$i]->getIdDossier(); ?>" class="btn btn-secondary"><i class="bi bi-eye"></i></a></td>
            <td><a href="<?= URL ?>dossier/ajoutSuspect/<?= $dossiers[$i]->getIdDossier(); ?>" class="btn btn-primary"><i class="bi bi-plus"></i></a></td>
            <td><a href="<?= URL ?>dossier/modifier/<?= $dossiers[$i]->getIdDossier(); ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a></td>
            <td>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal<?= $dossiers[$i]->getIdDossier() ?>">
                    <i class="bi bi-trash"></i>
                </button>
                <div class="modal fade" id="basicModal<?= $dossiers[$i]->getIdDossier() ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Message de confirmation</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Vous voulez vraiment supprimer <strong><?= $dossiers[$i]->getIdDossier(); ?> <?= $dossiers[$i]->getResultat(); ?> <?= $dossiers[$i]->getVerdict(); ?> <?= $dossiers[$i]->getDateCloture(); ?></strong> ?
                        </div>
                        <div class="modal-footer">
                        <form action="<?= URL ?>dossier/supprimer/<?= $dossiers[$i]->getIdDossier(); ?>" method="post">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                          <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </td>
          </tr>
          <?php endfor; ?>
          <?php endif?>
        </tbody>
      </table>
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