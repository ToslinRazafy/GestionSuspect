<?php 
    class Plaignant{
        private $idPlaignant;
        private $idEnqueteur;
        private $nom;
        private $prenom;
        private $surnom;
        private $cin;
        private $adresse;
        private $contact;
        private $profession;
        private $sexe;      
        private $dateAjout;


        public function __construct($idPlaignant, $idEnqueteur, $nom, $prenom, $surnom, $cin, $adresse, $contact, $profession, $sexe, $dateAjout) {
            $this->idPlaignant = $idPlaignant;
            $this->idEnqueteur = $idEnqueteur;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->surnom = $surnom;
            $this->cin = $cin;
            $this->adresse = $adresse;
            $this->contact = $contact;
            $this->profession = $profession;
            $this->sexe = $sexe;
            $this->dateAjout = $dateAjout;
        }

        public function getIdPlaignant(){ return $this->idPlaignant;}
        public function setIdPlaignant( $idPlaignant ){ $this->idPlaignant = $idPlaignant;}

        public function getIdEnqueteur(){ return $this->idEnqueteur;}
        public function setIdEnqueteur( $idEnqueteur ){ $this->idEnqueteur = $idEnqueteur;}

        public function getNom(){ return $this->nom; }
        public function setNom($nom){ $this->nom = $nom; }
        
        public function getPrenom(){ return $this->prenom; }
        public function setPrenom($prenom){ $this->prenom = $prenom; }

        public function getSurnom(){ return $this->surnom; }
        public function setSurnom($surnom){ $this->surnom = $surnom; }

        public function getCin(){ return $this->cin;}
        public function setCin($cin){ $this->cin = $cin; }

        public function getAdresse(){ return $this->adresse; }
        public function setAdresse($adresse){$this->adresse = $adresse;}

        public function getContact(){ return $this->contact; }
        public function setContact($contact){ $this->contact = $contact; }

        public function getProfession() { return $this->profession; }
        public function setProfession($profession){ $this->profession = $profession; }

        public function getSexe(){ return $this->sexe; }
        public function setSexe($sexe){ $this->sexe = $sexe; }

        public function getDateAjout(){ return $this->dateAjout; }
        public function setDateAjout($dateAjout){ $this->dateAjout = $dateAjout; }


    }
?>