<?php 
    require_once("config/database.php");
    require_once("Suspect.class.php");

    class SuspectManager extends Database{
        private $suspects;

        public function ajoutSuspect($suspect){
            $this->suspects[] = $suspect;
        }

        public function getInfraction(){
            $req = $this->getMyDb()->prepare("SELECT * FROM infraction");
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

        public function getSuspect(){ return $this->suspects; }
        
        public function chargementSuspect(){
            $req = $this->getMyDb()->prepare("SELECT suspect.*, infraction.* FROM suspect, infraction, implication WHERE suspect.ID_Suspect = implication.ID_Suspect AND infraction.ID_Infraction = implication.ID_Infraction ORDER BY suspect.Date_Ajout DESC");
            $req->execute();
            $mesSuspects = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($mesSuspects as $suspect){
                $s = new Suspect($suspect["ID_Suspect"], $suspect["ID_Enqueteur"], $suspect["Nom"], $suspect["Prenom"], $suspect["Surnom"], $suspect["Sexe"], $suspect["CIN"], $suspect["Age"], $suspect["Date_naiss"], $suspect["Lieu_naiss"], $suspect["Adresse"], $suspect["Contact"], $suspect["Profession"], $suspect["Description_physique"], $suspect["Antecedent_Criminelle"], $suspect["Description"], $suspect["Categorie"], $suspect["image"]);
                $this->ajoutSuspect($s);
            }
        }

        public function getNombreSuspect(){
            $datet = new DateTime();
            $annee = date("Y", $datet->getTimestamp());
            $annee = "%.". $_SESSION["service"] . "." .$annee;
            $req = $this->getMyDb()->prepare("SELECT * FROM Suspect WHERE ID_Suspect LIKE '$annee'");
            $req->execute();
            $mesSuspects = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            $nombre = 0;
            foreach($mesSuspects as $suspect){
                $nombre++;
            }
            return $nombre;
        }

        public function getSuspectById($suspect){
            for($i = 0; $i < count($this->suspects); $i++){
                if($this->suspects[$i]->getIdSuspect() === $suspect){
                    return $this->suspects[$i];
                }
            }
        }
        public function ajoutSuspectMyDb($idSuspect, $idEnqueteur, $nom, $prenom, $surnom, $sexe, $cin, $age, $dateNaissance, $lieuNaissance, $adresse, $contact, $profession, $descriptionPhysique, $idInfraction, $image){
            
            $req1 = $this->getMyDb()->prepare("SELECT * FROM suspect WHERE CIN = :cin");
            $req1->bindValue(":cin", $cin, PDO::PARAM_STR);
            $req1->execute();
            $resultat = $req1->rowCount();
            $antCriminelle = "NON";
            if($resultat > 0){
                $antCriminelle = "OUI";
                $req = $this->getMyDb()->prepare("INSERT INTO suspect VALUES(:idSuspect, :idEnqueteur, :nom, :prenom, :surnom, :sexe, :cin, :age, :dateNaissance, :lieuNaissance, :adresse, :contact, :profession, :descriptionPhysique, :antecedentCriminelle, CURRENT_TIMESTAMP(), :image)");
                $datet = new DateTime();
                $req->bindValue(":idSuspect", $idSuspect.".". $_SESSION["service"] .".".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
                $req->bindValue(":idEnqueteur", $idEnqueteur, PDO::PARAM_STR);
                $req->bindValue(":nom", $nom, PDO::PARAM_STR);
                $req->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                $req->bindValue(":surnom", $surnom, PDO::PARAM_STR);
                $req->bindValue(":sexe", $sexe, PDO::PARAM_STR);
                $req->bindValue(":cin", $cin, PDO::PARAM_STR);
                $req->bindValue(":age", $age, PDO::PARAM_STR);
                $req->bindValue(":dateNaissance", $dateNaissance, PDO::PARAM_STR);
                $req->bindValue(":lieuNaissance", $lieuNaissance, PDO::PARAM_STR);
                $req->bindValue(":adresse", $adresse, PDO::PARAM_STR);
                $req->bindValue(":contact", $contact, PDO::PARAM_STR);
                $req->bindValue(":profession", $profession, PDO::PARAM_STR);
                $req->bindValue(":descriptionPhysique", $descriptionPhysique, PDO::PARAM_STR);
                $req->bindValue(":antecedentCriminelle", $antCriminelle, PDO::PARAM_STR);
                $req->bindValue(":image", $image, PDO::PARAM_STR);
    
                $resultat = $req->execute();
                $req->closeCursor();
    
                $req2 = $this->getMyDb()->prepare("INSERT INTO implication VALUES(:idInfraction, :idSuspect)");
                $req2->bindValue(":idInfraction", $idInfraction, PDO::PARAM_STR);
                $req2->bindValue(":idSuspect", $idSuspect.".". $_SESSION["service"] .".".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
                $req2->execute();
    
                $req2->closeCursor();
            }else{
                $antCriminelle = "NON";
                $req = $this->getMyDb()->prepare("INSERT INTO suspect VALUES(:idSuspect, :idEnqueteur, :nom, :prenom, :surnom, :sexe, :cin, :age, :dateNaissance, :lieuNaissance, :adresse, :contact, :profession, :descriptionPhysique, :antecedentCriminelle, CURRENT_TIMESTAMP(), :image)");
                $datet = new DateTime();
                $req->bindValue(":idSuspect", $idSuspect.".". $_SESSION["service"] .".".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
                $req->bindValue(":idEnqueteur", $idEnqueteur, PDO::PARAM_STR);
                $req->bindValue(":nom", $nom, PDO::PARAM_STR);
                $req->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                $req->bindValue(":surnom", $surnom, PDO::PARAM_STR);
                $req->bindValue(":sexe", $sexe, PDO::PARAM_STR);
                $req->bindValue(":cin", $cin, PDO::PARAM_STR);
                $req->bindValue(":age", $age, PDO::PARAM_STR);
                $req->bindValue(":dateNaissance", $dateNaissance, PDO::PARAM_STR);
                $req->bindValue(":lieuNaissance", $lieuNaissance, PDO::PARAM_STR);
                $req->bindValue(":adresse", $adresse, PDO::PARAM_STR);
                $req->bindValue(":contact", $contact, PDO::PARAM_STR);
                $req->bindValue(":profession", $profession, PDO::PARAM_STR);
                $req->bindValue(":descriptionPhysique", $descriptionPhysique, PDO::PARAM_STR);
                $req->bindValue(":antecedentCriminelle", $antCriminelle, PDO::PARAM_STR);
                $req->bindValue(":image", $image, PDO::PARAM_STR);
    
                $resultat = $req->execute();
                $req->closeCursor();
    
                $req2 = $this->getMyDb()->prepare("INSERT INTO implication VALUES(:idInfraction, :idSuspect)");
                $req2->bindValue(":idInfraction", $idInfraction, PDO::PARAM_STR);
                $req2->bindValue(":idSuspect", $idSuspect.".". $_SESSION["service"] .".".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
                $req2->execute();
    
                $req2->closeCursor();
            }

            $req1->closeCursor();

        }

        public function modifierSuspectMyDb($idEnqueteur, $nom, $prenom, $surnom, $sexe, $cin, $age, $dateNaissance, $lieuNaissance, $adresse, $contact, $profession, $descriptionPhysique, $antecedentCriminelle, $image, $id){
            $req = $this->getMyDb()->prepare("UPDATE suspect SET ID_Enqueteur = :idEnqueteur, Nom = :nom, Prenom = :prenom, Surnom = :surnom, Sexe = :sexe, CIN = :cin, Age = :age, Date_naiss = :dateNaissance, Lieu_naiss = :lieuNaissance, Adresse = :adresse, Contact = :contact, Profession = :profession, Description_physique = :descriptionPhysique, Antecedent_Criminelle = :antecedentCriminelle, image = :image WHERE ID_Suspect = :id");
            $req->bindValue(":idEnqueteur", $idEnqueteur, PDO::PARAM_STR);
            $req->bindValue(":nom", $nom, PDO::PARAM_STR);
            $req->bindValue(":prenom", $prenom, PDO::PARAM_STR);
            $req->bindValue(":surnom", $surnom, PDO::PARAM_STR);
            $req->bindValue(":sexe", $sexe, PDO::PARAM_STR);
            $req->bindValue(":cin", $cin, PDO::PARAM_STR);
            $req->bindValue(":age", $age, PDO::PARAM_STR);
            $req->bindValue(":dateNaissance", $dateNaissance, PDO::PARAM_STR);
            $req->bindValue(":lieuNaissance", $lieuNaissance, PDO::PARAM_STR);
            $req->bindValue(":adresse", $adresse, PDO::PARAM_STR);
            $req->bindValue(":contact", $contact, PDO::PARAM_STR);
            $req->bindValue(":profession", $profession, PDO::PARAM_STR);
            $req->bindValue(":descriptionPhysique", $descriptionPhysique, PDO::PARAM_STR);
            $req->bindValue(":antecedentCriminelle", $antecedentCriminelle, PDO::PARAM_STR);
            $req->bindValue(":image", $image, PDO::PARAM_STR);
            $req->bindValue(":id", $id, PDO::PARAM_STR);
            $resultat = $req->execute();
            $req->closeCursor();
        }

        public function supprimerSuspectMyDb($idSuspect){
            $req = $this->getMyDb()->prepare("DELETE FROM suspect WHERE ID_Suspect = :idSuspect");
            $req->bindValue(":idSuspect", $idSuspect, PDO::PARAM_STR);

            $resultat = $req->execute();
            $req->closeCursor() ;

            if($resultat > 0){
                $suspect = $this->getSuspectById($idSuspect);
                unset($suspect);
            }
        }
    }
?>