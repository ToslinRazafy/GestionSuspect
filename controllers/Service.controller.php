<?php 
    require_once("models/ServiceManager.class.php");

    class ServiceController{
        private $serviceManager;
        
        public function __construct() {
            $this->serviceManager = new ServiceManager();
            $this->serviceManager->chargementServices();
        }

        public function afficherService($url){
            $services = $this->serviceManager->getServices();
            require("views/service/sevice.view.php");  
        }

        public function afficheAjoutEnqueteurSelect($url){
            $services = $this->serviceManager->getServices();
            require("views/enqueteur/ajout.view.php");
        }

        public function afficheProfileEnqueteurSelect(){
            $services = $this->serviceManager->getServices();
            require("views/profile/profile.view.php");
        }        

    }