<?php 
    ob_start();
    $url1 = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);

?>
         <div class="col-xl-4">

<div class="card">
  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

    <img src="<?= URL ?>public/images/enqueteur/<?= $_SESSION["image"] ?>" width="150px" height="150px" alt="Profile" class="rounded-circle">
    <h2><?= $_SESSION["nom"] ?></h2>
    <h3><?= $_SESSION["grade"]; ?></h3>
    <h4><?= $_SESSION["idEnqueteur"]; ?> </h4>
  </div>
</div>

</div>

<div class="col-xl-8">

<div class="card">
  <div class="card-body pt-3">
    <!-- Bordered Tabs -->
    <ul class="nav nav-tabs nav-tabs-bordered">

      <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
      </li>

      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier le profile</button>
      </li>

      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Modifier le mot de passe</button>
      </li>

    </ul>
    <div class="tab-content pt-2">

      <div class="tab-pane fade show active profile-overview" id="profile-overview">

        <?php 
          if(isset($url1[1]) && $url1[1] === "erreur"){
            echo "
            <div class='alert alert-danger alert-dismissible fade show mt-2' role='alert'>
              <i class='bi bi-exclamation-octagon me-1'></i>
              Votre mot de passe est incorrect
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            <script>
              setTimeout(() => {
                document.querySelector('.alert').remove();
              }, 3000);
            </script>
          ";
          }else if(isset($url1[1]) && $url1[1] === "sucess"){
            echo "
            <div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
              <i class='bi bi-check-circle me-1'></i>
                Votre mot de passe a ette modifier avec sucess
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
        <h5 class="card-title">Details du profile</h5>

        <div class="row">
          <div class="col-lg-3 col-md-4 label ">Nom et prenom</div>
          <div class="col-lg-9 col-md-8"><?= $_SESSION["nom"] ?></div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-4 label">Service</div>
          <div class="col-lg-9 col-md-8"><?= $_SESSION["service"] ?></div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-4 label">Grade</div>
          <div class="col-lg-9 col-md-8"><?= $_SESSION["grade"] ?></div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-4 label">Identifiant</div>
          <div class="col-lg-9 col-md-8"><?= $_SESSION["idEnqueteur"] ?></div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-4 label">Contact</div>
          <div class="col-lg-9 col-md-8"><?= $_SESSION["contact"] ?></div>
        </div>
      </div>

      <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
    <form method="post" action="<?= URL ?>profile/modifierProfile" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Photo</label>
            <div class="col-md-8 col-lg-9">
              <?php if (!empty($_SESSION["image"])): ?>
                <div class="mt-2">
                  <img src="<?= URL ?>public/images/enqueteur/<?= $_SESSION["image"] ?>" alt="Photo de Profil" class="img-thumbnail" style="max-width: 150px;">
                </div>
                <?php endif; ?>
                <br>
                <input name="image" type="file" class="form-control" id="profileImage" accept="image/*">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Identifiant</label>
            <div class="col-md-8 col-lg-9">
                <input name="id" type="text" class="form-control" id="Job" value="<?= $_SESSION["idEnqueteur"] ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label">Identifiant du service</label>
            <div class="col-md-8 col-lg-9">
                <select class="form-select" aria-label="Default select example" name="service" required>
                    <option selected>Choisissez le service</option>
                    <?php for($i = 0; $i < count($services); $i++): ?>
                    <option value="<?= $services[$i]->getIdService(); ?>" <?php if($services[$i]->getIdService() == $_SESSION["service"]) echo "selected"; ?>><?= $services[$i]->getIdService(); ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom et prénom</label>
            <div class="col-md-8 col-lg-9">
                <input name="nom" type="text" class="form-control" id="nom" value="<?= $_SESSION["nom"] ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="grade" class="col-md-4 col-lg-3 col-form-label">Grade</label>
            <div class="col-md-8 col-lg-9">
                <input name="garde" type="text" class="form-control" id="grade" value="<?= $_SESSION["grade"] ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="contact" class="col-md-4 col-lg-3 col-form-label">Contact</label>
            <div class="col-md-8 col-lg-9">
                <input name="contact" type="text" class="form-control" id="contact" value="<?= $_SESSION["contact"] ?>" required>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Modifier le profil</button>
        </div>
    </form>
</div>


      <div class="tab-pane fade pt-3" id="profile-change-password">
        <form method="post" action="<?= URL ?>profile/modifierMotDePasse">

          <div class="row mb-3">
            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
            <div class="col-md-8 col-lg-9">
              <input name="password" type="password" class="form-control" id="currentPassword" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
            <div class="col-md-8 col-lg-9">
              <input name="newpassword" type="password" class="form-control" id="newPassword" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmer le nouveau mot de passe</label>
            <div class="col-md-8 col-lg-9">
              <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Modifier le mot de passe</button>
          </div>
        </form>

      </div>

    </div>

  </div>
</div>

</div>
<?php
    $title = "Enqueteur";
    $secondtitle = "Profile";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>