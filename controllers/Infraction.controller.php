<?php 
    require_once("models/InfractionManager.class.php");

    class InfractionController{
        private $infractionManager;
        
        public function __construct() {
            $this->infractionManager = new InfractionManager();
            $this->infractionManager->chargementInfraction();
        }

        public function afficherInfraction($url){
            $infractions = $this->infractionManager->getInfraction();
            require("views/infraction/infraction.view.php");
        }

        public function nombreInfraction(){ return $this->infractionManager->nombreInfraction(); }

        public function ajouterInfraction(){
            $infractions = $this->infractionManager->getInfraction();
            require("views/infraction/ajout.view.php");
        }

        public function ajouterInfractionValidation(){
            $this->infractionManager->ajoutInfractionMyDb($_POST["id"], $_POST["date"], $_POST["lieu"], $_POST["description"], $_POST["categorie"]);
            header("Location:" . URL . "infraction");
        }

        public function modifierInfraction($url, $idInfraction, $categories){
            $infracation = $this->infractionManager->getInfractionById($idInfraction);
            require("views/infraction/modifier.view.php");
        }

        public function modifierInfractionValidation($idInfraction){
            $this->infractionManager->modifierInfractionMyDb($_POST["id"], $_POST["date"], $_POST["lieu"], $_POST["description"], $_POST["categorie"], $idInfraction);
            header("Location:" . URL . "infraction");
        }

        public function supprimerInfraction($idInfraction){
            $this->infractionManager->supprimerInfractionMyDb($idInfraction);
            header("Location:" . URL . "infraction");
        }
    }
?>