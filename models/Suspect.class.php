<?php 
    class Suspect{
        private $idSuspect;
        private $idEnqueteur;
        private $nom;
        private $prenom;
        private $surnom;
        private $sexe;
        private $cin;
        private $age;
        private $dateNaissance;
        private $lieuNaissance;
        private $adresse;
        private $contact;

        private $profession;
        private $descriptionPhysique;
        private $antecedentCriminelle;
        private $infraction;
        private $categorieInfraction;
        private $image;

        public function __construct($idSuspect, $idEnqueteur, $nom, $prenom, $surnom, $sexe, $cin, $age, $dateNaissance, $lieuNaissance, $adresse, $contact, $profession, $descriptionPhysique, $antecedentCriminelle, $infraction, $categorieInfraction, $image) {
            $this->idSuspect = $idSuspect;
            $this->idEnqueteur = $idEnqueteur;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->surnom = $surnom;
            $this->sexe = $sexe;
            $this->cin = $cin;
            $this->age = $age;
            $this->dateNaissance = $dateNaissance;
            $this->lieuNaissance = $lieuNaissance;
            $this->adresse = $adresse;
            $this->contact = $contact;
            $this->profession = $profession;
            $this->descriptionPhysique = $descriptionPhysique;
            $this->antecedentCriminelle = $antecedentCriminelle;
            $this->infraction = $infraction;
            $this->categorieInfraction = $categorieInfraction;
            $this->image = $image;
        }

        public function getIdSuspect() { return $this->idSuspect; }
        public function setIdSuspect($idSuspect){$this->idSuspect = $idSuspect;}

        public function getIdEnqueteur() { return $this->idEnqueteur; }
        public function setIdEnqueteur($idEnqueteur){$this->idEnqueteur = $idEnqueteur;}

        public function getNom() { return $this->nom; }
        public function setNom($nom){ $this->nom = $nom; }

        public function getPrenom() { return $this->prenom; }
        public function setPrenom($prenom){$this->prenom = $prenom;}
        
        public function getSurnom() { return $this->surnom; }
        public function setSurnom($surnom) { $this->surnom = $surnom; }

        public function getsexe() { return $this->sexe; }
        public function setSexe($sexe){ $this->sexe = $sexe; }
        
        public function getCin() { return $this->cin; }
        public function setCin($cin){ $this->cin = $cin; }

        public function getAge() { return $this->age; }
        public function setAge($age){$this->age = $age;}
        
        public function getDateNaissance() { return $this->dateNaissance; }
        public function setDateNaissance($dateNaissance){ $this->dateNaissance = $dateNaissance; }

        public function getLieuNaissance(){ return $this->lieuNaissance; }
        public function setLieuNaissance($lieuNaissance){ $this->lieuNaissance = $lieuNaissance; }

        public function getAdresse() { return $this->adresse; }
        public function setAdresse($adresse){ $this->adresse = $adresse; }

        public function getContact() { return $this->contact; }
        public function setContact($contact){ $this->contact = $contact; }

        public function getProfession(){ return $this->profession; }
        public function setProfession($profession){ $this->profession = $profession; }

        public function getDescriptionPhysique() { return $this->descriptionPhysique; }
        public function setDescriptionPhysique($descriptionPhysique){ $this->descriptionPhysique = $descriptionPhysique;}

        public function getAntecedentCriminelle(){ return $this->antecedentCriminelle; }
        public function setAntecedentCriminelle($antecedentCriminelle){ $this->antecedentCriminelle = $antecedentCriminelle;}

        public function getInfraction(){ return $this->infraction; }
        public function setInfraction($infraction){ $this->infraction = $infraction;}

        public function getCategorieInfraction(){ return $this->categorieInfraction; }
        public function setCategorieInfraction($categorieInfraction){ $this->categorieInfraction = $categorieInfraction;}

        public function getImage(){ return $this->image; }
        public function setImage($image){ $this->image = $image; }
    }
?>