<?php 
    ob_start()
?>
          <div class="col-lg-12">

<div class="card">
  <div class="card-body">
  <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Liste des suspects</h5>
        <a href="<?= URL ?>suspect/ajout" class="btn btn-secondary">Ajouter un suspect</a>
    </div>
    <div class="overflow-auto">
      <table class="table datatable">
        <thead>
          <tr>
            <th>Image</th>
            <th>Identifiant</th>
            <th>Identifiant enqueteur</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Surnom</th>
            <th>Sexe</th>
            <th>CIN</th>
            <th>Age</th>
            <th data-type="date" data-format="YYYY/DD/MM">Date de naissance</th>
            <th>Lieu de naissance</th>
            <th>Adresse</th>
            <th>Contact</th>
            <th>Profession</th>
            <th>Description Physique</th>
            <th>Antecedent Criminelle</th>
            <th>Infraction</th>
            <th>Categorie de l'infraction</th>
            <th>Action</th>
            <th>Action</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(empty($suspects)):?>
          <?php else:?>
            <?php for($i = 0; $i < count($suspects); $i++): ?>
          <tr>
            <td><img src="<?= URL ?>public/images/suspect/<?= $suspects[$i]->getImage(); ?>" alt="image"></td>
            <td><?= $suspects[$i]->getIdSuspect(); ?></td>
            <td><?= $suspects[$i]->getIdEnqueteur(); ?></td>
            <td><?= $suspects[$i]->getNom(); ?></td>
            <td><?= $suspects[$i]->getPrenom(); ?></td>
            <td><?= $suspects[$i]->getSurnom(); ?></td>
            <td><?= $suspects[$i]->getSexe(); ?></td>
            <td><?= $suspects[$i]->getCin(); ?></td>
            <td><?= $suspects[$i]->getAge(); ?></td>
            <td><?= $suspects[$i]->getDateNaissance(); ?></td>
            <td><?= $suspects[$i]->getLieuNaissance(); ?></td>
            <td><?= $suspects[$i]->getAdresse(); ?></td>
            <td><?= $suspects[$i]->getContact(); ?></td>
            <td><?= $suspects[$i]->getProfession(); ?></td>
            <td><?= $suspects[$i]->getDescriptionPhysique(); ?></td>
            <td><?= $suspects[$i]->getAntecedentCriminelle(); ?></td>
            <td><?= $suspects[$i]->getInfraction(); ?></td>
            <td><?= $suspects[$i]->getCategorieInfraction(); ?></td>
            <td><a href="<?= URL ?>suspect/information/<?= $suspects[$i]->getIdSuspect(); ?>" class="btn btn-secondary"><i class="bi bi-eye"></i></a></td>
            <td><a href="<?= URL ?>suspect/modifier/<?= $suspects[$i]->getIdSuspect(); ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a></td>
            <td>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal<?= $suspects[$i]->getIdSuspect() ?>">
                    <i class="bi bi-trash"></i>
                </button>
                <div class="modal fade" id="basicModal<?= $suspects[$i]->getIdSuspect() ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Message de confirmation</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Vous voulez vraiment supprimer <strong><?= $suspects[$i]->getIdSuspect(); ?> <?= $suspects[$i]->getNom(); ?> <?= $suspects[$i]->getPrenom(); ?> <?= $suspects[$i]->getCin(); ?> </strong> ?
                        </div>
                        <div class="modal-footer">
                        <form action="<?= URL ?>suspect/supprimer/<?= $suspects[$i]->getIdSuspect(); ?>" method="post">
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
    $title = "Suspect";
    $secondtitle = "Liste des suspects";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>