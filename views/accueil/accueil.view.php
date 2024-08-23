<?php
    ob_start() 
?>
<div class="col-lg-8">
        <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">


            <div class="card-body">
                <h5 class="card-title">Nombre des suspects en <span><?= $annee ?></span></h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                </div>
                <div class="ps-3">
                    <h6><?= $nombreSuspect ?></h6>
                </div>
                </div>
            </div>

            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">


            <div class="card-body">
                <h5 class="card-title">Nombre des plaignants en <span><?= $annee ?></span></h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-grid"></i>
                </div>
                <div class="ps-3">
                    <h6><?= $nombrePlaignant ?></h6>
                </div>
                </div>
            </div>

            </div>
        </div>
        
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">


            <div class="card-body">
                <h5 class="card-title">Nombre des infractions en <span><?= $annee ?></span></h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                    <h6><?= $nombreInfraction ?></h6>
                </div>
                </div>
            </div>
            </div>

        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">


            <div class="card-body">
                <h5 class="card-title">Nombre des dossier judiciaire en <span><?= $annee ?></span></h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-folder"></i>
                </div>
                <div class="ps-3">
                    <h6><?= $nombreDossier ?></h6>
                </div>
                </div>
            </div>

            </div>
        </div>
    </div>
<?php
    $title = "Acceuil";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>