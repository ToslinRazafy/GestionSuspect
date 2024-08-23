<?php 
    ob_start()
?>
          <div class="col-lg-12">

<div class="card">
  <div class="card-body">
  <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Liste des enqueteurs</h5>
        <a href="<?= URL ?>enqueteur/ajout" class="btn btn-secondary">Ajouter un enqueteur</a>
    </div>
    <div class="overflow-auto">
    <table class="table datatable">
      <thead>
        <tr>
          <th>Image</th>
          <th>Identifiant</th>
          <th>Identifiant du sevice</th>
          <th>Nom</th>
          <th>Grade</th>
          <th>Contact</th>
          <th>Action</th>
          <!-- <th>Action</th> -->
        </tr>
      </thead>
      <tbody>
        <?php if(empty($enqueteurs)):?>
        <?php else:?>
          <?php for($i = 0; $i < count($enqueteurs); $i++): ?>
        <tr>
          <td><img src="<?= URL ?>public/images/enqueteur/<?= $enqueteurs[$i]->getImage(); ?>" alt="image"></td>
          <td><?= $enqueteurs[$i]->getIdEnqueteur(); ?></td>
          <td><?= $enqueteurs[$i]->getIdService(); ?></td>
          <td><?= $enqueteurs[$i]->getNom(); ?></td>
          <td><?= $enqueteurs[$i]->getGrade(); ?></td>
          <td><?= $enqueteurs[$i]->getContact(); ?></td>
         
          <td>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal<?= $enqueteurs[$i]->getIdEnqueteur(); ?>">
                <i class="bi bi-trash"></i>
            </button>
            <div class="modal fade" id="basicModal<?= $enqueteurs[$i]->getIdEnqueteur(); ?>" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Message de confirmation</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Vous voulez vraiment supprimer <strong><?= $enqueteurs[$i]->getIdEnqueteur(); ?> <?= $enqueteurs[$i]->getNom(); ?> <?= $enqueteurs[$i]->getGrade(); ?> </strong> ?
                    </div>
                    <div class="modal-footer">
                     <form action="<?= URL ?>enqueteur/supprimer/<?= $enqueteurs[$i]->getIdEnqueteur(); ?>" method="post">
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
    $title = "Enqueteur";
    $secondtitle = "Liste des enqueteurs";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>