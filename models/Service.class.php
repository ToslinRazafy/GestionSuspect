<?php 
    class Service{
        private $idService;
        private $contact;
        public function __construct($idService, $contact) {
            $this->idService = $idService;
            $this->contact = $contact;
        }

        public function getIdService() { return $this->idService; }
        public function setIdService($idService) { $this->idService = $idService; }
        
        public function getContact() { return $this->contact; }
        public function setContact($contact) { $this->contact = $contact; }
    }
?>