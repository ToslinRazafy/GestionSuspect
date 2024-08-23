<?php 
    require_once("models/DossierJudiciaireManager.class.php");
    class DossierJudiciaireController{
        private $dossierJudiciaireManager;
        
        public function __construct() {
            $this->dossierJudiciaireManager = new DossierJudiciaireManager();
            $this->dossierJudiciaireManager->chargementDossier();
        }

        public function afficherDossier($url){
            $dossiers = $this->dossierJudiciaireManager->getDossier();
            require("views/dossierjudiciaire/dossierjudiciaire.view.php");
        }

        public function nombreDossier(){
            return $this->dossierJudiciaireManager->nombreDossier();
        }

        public function ajouterDossier($url){
            $dossiers = $this->dossierJudiciaireManager->getDossier();
            // $infractions = $this->dossierJudiciaireManager->getInfraction();
            require("views/dossierjudiciaire/ajout.view.php");
        }

        public function ajouterSuspect($url, $id){
            $suspects = $this->dossierJudiciaireManager->getSuspect();
            require("views/dossierjudiciaire/ajoutSuspect.view.php");
        }

        public function ajouSuspectValidation($url){
            $this->dossierJudiciaireManager->ajoutSuspectMyDb($_POST["suspect"], $url);
            header("Location: ". URL . "dossier");
        }

        public function ajouterDossierValidation(){
            $this->dossierJudiciaireManager->ajoutDossierMyDb($_POST["id"], $_POST["resultat"], $_POST["verdict"], $_POST["date"]);
            header("Location:" . URL . "dossier");
        }

        public function modifierDossier($url, $idDossier){
            $dossier = $this->dossierJudiciaireManager->getDossierById($idDossier);
            require("views/dossierjudiciaire/modifier.view.php");
        }

        public function modifierDossierValidation($idDossier){
            $this->dossierJudiciaireManager->modifierDossierMyDb($_POST["resultat"], $_POST["verdict"], $_POST["date"], $idDossier);
            header("Location:" . URL . "dossier");
        }

        public function supprimerDossier($idDossier){
            $this->dossierJudiciaireManager->supprimerDossierMyDb($idDossier);
            header("Location:" . URL . "dossier");
        }

        public function informationDossier($idDossier){
            $dossier= $this->dossierJudiciaireManager->getDossierById($idDossier);
            $suspects = $this->dossierJudiciaireManager->getSuspectDossier($idDossier);
            require("views/dossierjudiciaire/information.view.php");
        }
    }
?>