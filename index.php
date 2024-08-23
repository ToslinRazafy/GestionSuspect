<?php
    define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

    $datetime = new DateTime();
    $annee = date("Y", $datetime->getTimestamp());
    
    require_once("controllers/Infraction.controller.php");
    $infractionController = new InfractionController();

    require_once("controllers/Enqueteur.controller.php");
    $enqueteurController = new EnqueteurController();

    require_once("controllers/Service.controller.php");
    $serviceController = new ServiceController();

    require_once("controllers/Plaignant.controller.php");
    $plaignantController = new PlaignantController();


    require_once("controllers/Suspect.controller.php");
    $suspectController = new SuspectController();

    require_once("controllers/CategorieInfraction.controller.php");
    $categorieInfractionController = new CategorieInfractionController();

    require_once("controllers/DossierJudiciaire.controller.php");
    $dossierJudiciaireController = new DossierJudiciaireController();

    if(empty($_SESSION["nom"])){
        require("views/login/login.view.php");
    }else{
        try{

            if(empty($_GET['page'])){
                $nombreSuspect = $suspectController->nombreSuspect();
                $nombrePlaignant = $plaignantController->nombrePlaignant();
                $nombreInfraction = $infractionController->nombreInfraction();
                $nombreDossier = $dossierJudiciaireController->nombreDossier();
                require("views/accueil/accueil.view.php");
            }else{
                $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);
    
                switch($url[0]){

                    case "logout":
                        session_destroy();
                        session_abort();
                        header("Location:" . URL);
                        break;
    
                    case "profile":
                        if(empty($url[1])){
                            $serviceController->afficheProfileEnqueteurSelect();
                        }else if($url[1] === "modifierProfile"){
                            $enqueteurController->modifierenqueteurValidation($_SESSION["idEnqueteur"]);
                        }else if($url[1] === "modifierMotDePasse"){
                            $enqueteurController->modifierMotDepasse($_SESSION["contact"]);
                        }else if($url[1] === "erreur" || $url[1] === "sucess"){
                            $serviceController->afficheProfileEnqueteurSelect();
                        }else{
                            require("views/erreur/pages-error-404.php");
                        }
                        break;

                    case "accueil" :
                        $nombreSuspect = $suspectController->nombreSuspect();
                        $nombrePlaignant = $plaignantController->nombrePlaignant();
                        $nombreInfraction = $infractionController->nombreInfraction();
                        $nombreDossier = $dossierJudiciaireController->nombreDossier();
                        $url = $url[0];
                        require("views/accueil/accueil.view.php");
                        break;
                    
                    case "infraction" : 
                        if(empty($url[1])){
                            $infractionController->afficherInfraction($url[0]);
                        }else if($url[1] === "ajout"){
                            $categorieInfractionController->afficheAjoutCategorieSelect($url[0]);
                        }else if($url[1] === "ajoutValidation"){
                            $infractionController->ajouterInfractionValidation();
                        }else if($url[1] === "supprimer"){
                            $infractionController->supprimerInfraction($url[2]);
                        }else if($url[1] === "modifier"){
                            $categories = $categorieInfractionController->afficheModifierCategorieSelect();
                            $infractionController->modifierInfraction($url[0],$url[2], $categories);
                        }else if($url[1] === "modifierValidation"){
                            $infractionController->modifierInfractionValidation($url[2]);
                        }
                        else {
                            require("views/erreur/pages-error-404.php");
                        }
                    break;
    
                    case "plaignant" : 
                        if(empty($url[1])){
                            $plaignantController->afficherPlaignant($url[0]);
                        }else if($url[1] === "ajout"){
                            $plaignantController->ajouterPlaignant($url[0]);
                        }else if($url[1] === "ajoutValidation"){
                            $plaignantController->ajouterPlaignantValidation();
                        }else if($url[1] === "supprimer"){
                            $plaignantController->supprimerPlaignant($url[2]);
                        }else if($url[1] === "modifier"){
                            $plaignantController->modifierPlaignant($url[0], $url[2]);
                        }else if($url[1] === "modifierValidation"){
                            $plaignantController->modifierPlaignatValidation($url[2]);
                        }else if($url[1] === "sucess"){
                            $plaignantController->afficherPlaignant($url[0]);
                        }
                        else {
                            require("views/erreur/pages-error-404.php");
                        }
                    break;
    
                    case "enqueteur" : 
                        if(empty($url[1])){
                            $enqueteurController->afficherEnqueteur($url[0]);
                        }else if($url[1] === "ajout"){
                            $serviceController->afficheAjoutEnqueteurSelect($url[0]);
                        }else if($url[1] === "ajoutValidation"){
                            $enqueteurController->ajouterEnqueteurValidation();
                        }else if($url[1] === "supprimer"){
                            $enqueteurController->supprimerEnqueteur($url[2]);
                        }else if($url[1] === "modifier"){
                            // $enqueteurController->
                            // $infractionController->modifierInfraction($url[2]);
                        }else if($url[1] === "modifierValidation"){
                            $enqueteurController->modifierEnqueteurValidation($url[2]);
                        }
                        else {
                            require("views/erreur/pages-error-404.php");
                        }
                    break;
    
                    case "suspect" : 
                        if(empty($url[1])){
                            $suspectController->afficherSuspect($url[0]);
                        }else if($url[1] === "ajout"){
                            $suspectController->ajouterSuspect($url[0]);
                        }else if($url[1] === "ajoutValidation"){
                            $suspectController->ajouterSuspectValidation();
                        }else if($url[1] === "supprimer"){
                            $suspectController->supprimerSuspect($url[2]);
                        }else if($url[1] === "modifier"){
                            $suspectController->modifierSuspect($url[0], $url[2]);
                        }else if($url[1] === "modifierValidation"){
                            $suspectController->modifierSuspectValidation($url[2]);
                        }else if($url[1] === "information"){
                            $suspectController->informationSuspect($url[2]);   
                        }
                        else {
                            require("views/erreur/pages-error-404.php");
                        }
                    break;

                    case "dossier" : 
                        if(empty($url[1])){
                            $dossierJudiciaireController->afficherDossier($url[0]);
                        }else if($url[1] === "ajout"){
                            $dossierJudiciaireController->ajouterDossier($url[0]);
                        }else if($url[1] === "ajoutValidation"){
                            $dossierJudiciaireController->ajouterDossierValidation();
                        }else if($url[1] === "supprimer"){
                            $dossierJudiciaireController->supprimerDossier($url[2]);
                        }else if($url[1] === "modifier"){
                            $dossierJudiciaireController->modifierDossier($url[0], $url[2]);
                        }else if($url[1] === "modifierValidation"){
                            $dossierJudiciaireController->modifierDossierValidation($url[2]);
                        }else if($url[1] === "ajoutSuspectValidation"){
                            $dossierJudiciaireController->ajouSuspectValidation($url[2]);
                        }else if($url[1] === "ajoutSuspect"){
                            $dossierJudiciaireController->ajouterSuspect($url[0], $url[2]);
                        }else if($url[1] === "information"){
                                $dossierJudiciaireController->informationDossier($url[2]);   
                        }else {
                            require("views/erreur/pages-error-404.php");
                        }
                    break;
    
                    case "service" : 
                        if(empty($url[1])){
                            $serviceController->afficherService($url[0]);
                        }
                        else {
                            require("views/erreur/pages-error-404.php");
                        }
                    break;
    
                    default :
                        require("views/erreur/pages-error-404.php");
                        break;
                }
            }
                
        }
        catch(Exception $e){
           require("views/erreur/pages-error-404.php");
        }
    }

   
    