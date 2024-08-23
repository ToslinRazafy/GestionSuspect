<?php
  require_once("controllers/Enqueteur.controller.php");
  $enqueteurController = new EnqueteurController();

  if(isset($_POST["login"])){
    $resultat = $enqueteurController->enqueteurLogin();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Se connecter</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="<?= URL ?>assets/img/POLICE.jfif" rel="icon">
  <link href="<?= URL ?>assets/img/POLICE.jfif" rel="apple-touch-icon">


  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="<?= URL ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= URL ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= URL ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= URL ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= URL ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= URL ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= URL ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="<?= URL ?>assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?= URL ?>" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/POLICE.jfif" alt="">
                  <span class="d-none d-lg-block text-white">Policier</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Connecter a votre compte</h5>
                    <p class="text-center small">Entrer votre numero et votre mot de passe pour connecter</p>
                  </div>

                  <form method="post" class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="tel" class="form-label">Numero telephone</label>
                      <div class="input-group has-validation">
                        <input type="tel" name="tel" class="form-control" id="tel" required>
                        <div class="invalid-feedback">Veuillez entrer votre numero</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Mot de passe</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Veuillez entre votre mot de passe</div>
                    </div>

                    <div class="col-12">
                    <?php
                        if(isset($resultat) && $resultat === "erreur"){
                          echo "
                            <div class='alert alert-danger alert-dismissible fade show mt-2' role='alert'>
                              <i class='bi bi-exclamation-octagon me-1'></i>
                              Votre numero ou mot de passe est incorrect
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
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Se connecter</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main>


  <script src="<?= URL ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= URL ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= URL ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?= URL ?>assets/vendor/quill/quill.js"></script>
  <script src="<?= URL ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= URL ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= URL ?>assets/vendor/php-email-form/validate.js"></script>

  <script src="<?= URL ?>assets/js/main.js"></script>

</body>

</html>