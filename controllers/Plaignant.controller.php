<?php 
    require_once("models/PlaignantManager.class.php");

    class PlaignantController{
        private $plaignantManager;
        
        public function __construct() {
            $this->plaignantManager = new PlaignantManager();
            $this->plaignantManager->chargementPlaignant();
        }

        public function afficherPlaignant($url){
            $plaignants = $this->plaignantManager->getPlaignant();
            require("views/plaignant/plaignant.view.php");
        }

        public function nombrePlaignant(){ return $this->plaignantManager->nombrePlaignant(); }

        public function ajouterPlaignant($url){
            require("views/plaignant/ajout.view.php");
        }

        public function ajouterPlaignantValidation(){
            $resultat = $this->plaignantManager->ajoutPlaignantMyDb($_POST["id"], $_SESSION["idEnqueteur"], $_POST["nom"], $_POST["prenom"], $_POST["surnom"], $_POST["cin"], $_POST["adresse"], $_POST["contact"], $_POST["profession"], $_POST["sexe"]);
            if($resultat === "erreur"){
                header("Location:" . URL . "plaignant/ajout/erreur");
            }else{
                header("Location:" . URL . "plaignant/sucess");
            }
        }

        public function modifierPlaignant($url, $idPlaignant){
            $plaignant = $this->plaignantManager->getPlaignantById($idPlaignant);
            require("views/plaignant/modifier.view.php");
        }

        public function modifierPlaignatValidation($idPlaignant){
            $this->plaignantManager->modifierPlaignantMyDb($_SESSION["idEnqueteur"], $_POST["nom"], $_POST["prenom"], $_POST["surnom"], $_POST["cin"], $_POST["adresse"], $_POST["contact"], $_POST["profession"], $_POST["sexe"], $idPlaignant);
            header("Location:" . URL . "plaignant");
        }

        public function supprimerPlaignant($idPlaignant){
            $this->plaignantManager->supprimerPlaignantMyDb($idPlaignant);
            header("Location:" . URL . "plaignant");
        }
    }
?>