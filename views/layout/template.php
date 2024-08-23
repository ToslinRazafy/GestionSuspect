<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestion des suspects</title>
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


  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?= URL ?>" class="logo d-flex align-items-center">
        <img src="<?= URL ?>assets/img/POLICE.jfif" alt="" class="rounded-circle">
        <span class="d-none d-lg-block">Gestion des suspects</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= URL ?>public/images/enqueteur/<?= $_SESSION["image"]?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION["nom"]?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $_SESSION["nom"] ?></h6>
              <span><?= $_SESSION["grade"] ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= URL ?>profile">
                <i class="bi bi-person"></i>
                <span>Mon profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= URL ?>logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Deconnecter</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header>

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?= $url === "accueil" || empty($url) ? '' : 'collapsed' ?>" href="<?= URL ?>accueil">
          <i class="bi bi-grid"></i>
          <span>Accueil</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $url === "plaignant" ? '' : 'collapsed' ?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Plaignants</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= URL ?>plaignant/ajout">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li>
          <li>
            <a href="<?= URL ?>plaignant">
              <i class="bi bi-circle"></i><span>Liste des plaignats</span>
            </a>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $url === "infraction" ? '' : 'collapsed' ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Infraction</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= URL ?>infraction/ajout">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li>
          <li>
            <a href="<?= URL ?>infraction">
              <i class="bi bi-circle"></i><span>Listes les nfractions</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $url === "suspect" ? '' : 'collapsed' ?>" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Suspects</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= URL ?>suspect/ajout">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li>
          <li>
            <a href="<?= URL ?>suspect">
              <i class="bi bi-circle"></i><span>Liste des suspects</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $url === "dossier" ? '' : 'collapsed' ?>" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Dossier judiciaire</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= URL ?>dossier/ajout">
              <i class="bi bi-circle"></i><span>Ajouter</span>
            </a>
          </li>
          <li>
            <a href="<?= URL ?>dossier">
              <i class="bi bi-circle"></i><span>Liste des dossier judiciaire</span>
            </a>
          </li>
        </ul>
      </li>

      <?php if(isset($_SESSION["chefService"]) && !empty($_SESSION["chefService"])): ?>
        <li class="nav-item">
          <a class="nav-link <?= $url === "enqueteur" ? '' : 'collapsed' ?>" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Enqueteur</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?= URL ?>enqueteur/ajout">
                <i class="bi bi-circle"></i><span>Ajouter</span>
              </a>
            </li>
            <li>
              <a href="<?= URL ?>enqueteur">
                <i class="bi bi-circle"></i><span>Liste des enqueteur</span>
              </a>
            </li>
          </ul>
        </li>
      <?php endif; ?>

      <li class="nav-item">
        <a class="nav-link <?= $url === "service" ? '' : 'collapsed' ?>" href="<?= URL ?>service">
          <i class="bi bi-person"></i>
          <span>Service</span>
        </a>
      </li>


    </ul>

  </aside>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $title?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= URL ?>accueil">Home</a></li>
          <li class="breadcrumb-item active" style="color: white ;"><a href="<?= URL . (strtolower($title) === "dossier judiciaire"? substr(strtolower($title), 0, -11)  : strtolower($title))  ?>"><?= $title ?></a></li>
          <?php if(isset($secondtitle)):?>
          <li class="breadcrumb-item active" style="color: white;"><a href=""><?= $secondtitle ?></a></li>
          <?php endif ?>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row d-flex justify-content-center align-items-center">
        <?= $pageContente ?>
      </div>
    </section>

  </main>

  <script src="<?= URL ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= URL ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= URL ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?= URL ?>assets/vendor/quill/quill.js"></script>
  <script src="<?= URL ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= URL ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= URL ?>assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>