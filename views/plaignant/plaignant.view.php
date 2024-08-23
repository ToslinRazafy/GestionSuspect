<?php 
    ob_start();
    $url1 = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);
?>
          <div class="col-lg-12">

<div class="card">
  <div class="card-body">
  <?php
      if(isset($url1[1]) && $url1[1] === "sucess"){
        echo "
          <div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
            <i class='bi bi-check-circle me-1'></i>
            Plaignant a ete ajouter avec sucess
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
          <script>
            setTimeout(() => {
              document.querySelector('.alert').remove();
            }, 3000);
          </script>
        ";
      }
    ?>
  <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Liste des plaignants</h5>
        <a href="<?= URL ?>plaignant/ajout" class="btn btn-secondary">Ajouter un plaignant </a>
    </div>
    <div class="overflow-auto"> 
    <table class="table datatable">
      <thead>
        <tr>
          <th>Identifiant</th>
          <th>Identifiant enqueteur</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Surnom</th>
          <th>CIN</th>
          <th>Adresse</th>
          <th>Contact</th>
          <th>Profession</th>
          <th>Sexe</th>
          <th>Date Ajout</th>
          <th>Action</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(empty($plaignants)):?>
        <?php else :?>
          <?php for($i = 0; $i < count($plaignants); $i++): ?>
        <tr>
          <td><?= $plaignants[$i]->getIdPlaignant(); ?></td>
          <td><?= $plaignants[$i]->getIdEnqueteur(); ?></td>
          <td><?= $plaignants[$i]->getNom(); ?></td>
          <td><?= $plaignants[$i]->getPrenom(); ?></td>
          <td><?= $plaignants[$i]->getSurnom(); ?></td>
          <td><?= $plaignants[$i]->getCin(); ?></td>
          <td><?= $plaignants[$i]->getAdresse(); ?></td>
          <td><?= $plaignants[$i]->getContact(); ?></td>
          <td><?= $plaignants[$i]->getProfession(); ?></td>
          <td><?= $plaignants[$i]->getSexe(); ?></td>
          <td><?= $plaignants[$i]->getDateAjout(); ?></td>
          <td><a href="<?= URL ?>plaignant/modifier/<?= $plaignants[$i]->getIdPlaignant(); ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a></td>
          <td>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal<?= $plaignants[$i]->getIdPlaignant(); ?>">
                <i class="bi bi-trash"></i>
            </button>
            <div class="modal fade" id="basicModal<?= $plaignants[$i]->getIdPlaignant(); ?>" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Message de confirmation</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Vous voulez vraiment supprimer <strong><?= $plaignants[$i]->getIdPlaignant(); ?> <?= $plaignants[$i]->getNom(); ?> <?= $plaignants[$i]->getPrenom(); ?> <?= $plaignants[$i]->getCin(); ?> </strong> ?
                    </div>
                    <div class="modal-footer">
                     <form action="<?= URL ?>plaignant/supprimer/<?= $plaignants[$i]->getIdPlaignant(); ?>" method="post">
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
        <?php endif ?>
      </tbody>
    </table>
    </div>
  </div>
</div>

</div>
<?php
    $title = "Plaignant";
    $secondtitle = "Liste des plaignants";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>