<?php 
    class DossierJudiciaire{
        private $idDossier;
        private $resultat;
        private $verdict;
        private $dateCloture;
        private $date;

        public function __construct($idDossier, $resultat, $verdict, $dateCloture, $date) {
            $this->idDossier = $idDossier;
            $this->resultat = $resultat;
            $this->verdict = $verdict;
            $this->dateCloture = $dateCloture;
            $this->date = $date;
        }

        public function getIdDossier() { return $this->idDossier; }
        public function setIdDossier($idDossier) { $this->idDossier = $idDossier; }
        
        public function getResultat() { return $this->resultat; }
        public function setResultat( $resultat) { $this->resultat = $resultat; }
        
        public function getVerdict() { return $this->verdict; }
        public function setVerdict($verdict) { $this->verdict = $verdict; }

        public function getDateCloture() { return $this->dateCloture; }
        public function setDateCloture($dateCloture) { $this->dateCloture = $dateCloture; }

        public function getDate() { return $this->date; }
        public function setDate($date){ $this->date = $date; }
    }
?>