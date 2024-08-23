<?php 
    class Enqueteur{
        private $idEnqueteur;
        private $idService;
        private $nom;
        private $grade;
        private $contact;
        private $mdp;
        private $image;

        public function __construct($idEnqueteur, $idService, $nom, $grade, $contact, $mdp, $image) {
            $this->idEnqueteur=$idEnqueteur;
            $this->idService=$idService;
            $this->nom=$nom;
            $this->grade=$grade;
            $this->contact=$contact;
            $this->mdp=$mdp;
            $this->image=$image;
        }

        public function getIdEnqueteur(){ return $this->idEnqueteur; }
        public function setIdEnqueteur($idEnqueteur){ $this->idEnqueteur=$idEnqueteur; }

        public function getIdService(){ return $this->idService; }
        public function setIdService($idService){ $this->idService=$idService; }

        public function getNom(){ return $this->nom; }
        public function setNom($nom){ $this->nom=$nom; }
        
        public function getGrade(){ return $this->grade; }
        public function setGrade($grade){ $this->grade=$grade; }

        public function getContact(){ return $this->contact; }
        public function setContact($contact){ $this->contact=$contact; }

        public function getMdp(){ return $this->mdp; }
        public function setMdp($mdp){ $this->mdp=$mdp; }

        public function getImage() { return $this->image; }
        public function setImage($image) { $this->image = $image; }
    }
?>