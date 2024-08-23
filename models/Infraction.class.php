<?php 
    class Infraction{
        private $idInfraction;
        private $date;
        private $lieu;
        private $description;
        private $categorie;
        private $surnom;

        public function __construct($idInfraction, $date, $lieu, $description, $categorie, $surnom) {
            $this->idInfraction = $idInfraction;
            $this->date = $date;
            $this->lieu = $lieu;
            $this->description = $description;
            $this->categorie = $categorie;
            $this->surnom = $surnom;
        }

        public function getIdInfraction() { return $this->idInfraction; }
        public function setIdInfraction($idInfraction) { $this->idInfraction = $idInfraction; }
        
        public function getDate() { return $this->date; }
        public function setDate($date) { $this->date = $date; }
        
        public function getLieu() { return $this->lieu; }
        public function setLieu($lieu) { $this->lieu = $lieu; }

        public function getDescription() { return $this->description; }
        public function setDescription($description) { $this->description = $description; }
    
        public function getCategorie() { return $this->categorie; }
        public function setCategorie($categorie) { $this->categorie = $categorie; }

        public function getSurnom(){ return $this->surnom; }
        public function setSurnom($surnom){ $this->surnom = $surnom; }
    }
?>