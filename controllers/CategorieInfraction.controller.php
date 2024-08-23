<?php 
    require_once("models/CategorieInfractionManager.class.php");

    class CategorieInfractionController{
        private $controllerManager;
        
        public function __construct() {
            $this->controllerManager = new CategorieInfractionManager();
            $this->controllerManager->chargementCategorie();
        }

        public function afficheAjoutCategorieSelect($url){
            $categories = $this->controllerManager->getCategorie();
            require("views/infraction/ajout.view.php");
        }
        public function afficheModifierCategorieSelect(){
            return $this->controllerManager->getCategorie();
        }

    }