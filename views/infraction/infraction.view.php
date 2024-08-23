<?php 
    ob_start()
?>
          <div class="col-lg-12">

<div class="card">
  <div class="card-body">
  <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Liste des infractions</h5>
        <a href="<?= URL ?>infraction/ajout" class="btn btn-secondary">Ajouter un infraction</a>
    </div>
    <div class="overflow-auto">
    <table class="table datatable">
      <thead>
        <tr>
          <th>Identifiant</th>
          <th>Surnom</th>
          <th data-type="date" data-format="YYYY/DD/MM">Date</th>
          <th>Lieu</th>
          <th>Description</th>
          <th>Categorie</th>
          <th>Action</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(empty($infractions)):?>
        <?php else:?>
          <?php for($i = 0; $i < count($infractions); $i++): ?>
        <tr>
          <td><?= $infractions[$i]->getIdInfraction(); ?></td>
          <td><?= $infractions[$i]->getSurnom(); ?></td>
          <td><?= $infractions[$i]->getDate(); ?></td>
          <td><?= $infractions[$i]->getLieu(); ?></td>
          <td><?= $infractions[$i]->getDescription(); ?></td>
          <td><?= $infractions[$i]->getCategorie(); ?></td>
          <td><a href="<?= URL ?>infraction/modifier/<?= $infractions[$i]->getIdInfraction(); ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a></td>
          <td>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal<?= $infractions[$i]->getIdInfraction(); ?>">
                <i class="bi bi-trash"></i>
            </button>
            <div class="modal fade" id="basicModal<?= $infractions[$i]->getIdInfraction(); ?>" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Message de confirmation</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Vous voulez vraiment supprimer <strong><?= $infractions[$i]->getIdInfraction(); ?> <?= $infractions[$i]->getDate(); ?> <?= $infractions[$i]->getLieu(); ?> </strong> ?
                    </div>
                    <div class="modal-footer">
                    <form action="<?= URL ?>infraction/supprimer/<?= $infractions[$i]->getIdInfraction(); ?>" method="post">
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
    $title = "Infraction";
    $secondtitle = "Liste des infractions";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>