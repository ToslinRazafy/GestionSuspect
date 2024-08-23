<?php 
    require_once("config/database.php");
    require_once("Plaignant.class.php");

    class PlaignantManager extends Database{
        private $plaignants;

        public function ajoutPlaignant($plaignant){
            $this->plaignants[] = $plaignant;
        }

        public function getPlaignant(){ return $this->plaignants; }
        
        public function chargementPlaignant(){
            $req = $this->getMyDb()->prepare("SELECT * FROM Plaignant ORDER BY Date_Ajout DESC");
            $req->execute();
            $mesplaignants = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($mesplaignants as $plaignant){
                $p = new Plaignant($plaignant["ID_Plaignant"], $plaignant["ID_Enqueteur"], $plaignant["Nom"], $plaignant["Prenom"], $plaignant["Surnom"], $plaignant["CIN"], $plaignant["Adresse"], $plaignant["Contact"], $plaignant["Profession"], $plaignant["Sexe"] , $plaignant["Date_Ajout"]);
                $this->ajoutplaignant($p);
            }
        }

        public function nombrePlaignant(){
            $datet = new DateTime();
            $annee = date("Y", $datet->getTimestamp());
            $annee = "%.".$annee;
            $req = $this->getMyDb()->prepare("SELECT * FROM Plaignant WHERE ID_Plaignant LIKE '$annee'");
            $req->execute();
            $mesplaignants = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            $nombre = 0;
            foreach($mesplaignants as $plaignant){
                $nombre++;
            }
            return $nombre;
        }

        public function getPlaignantById($plaignant){
            for($i = 0; $i < count($this->plaignants); $i++){
                if($this->plaignants[$i]->getIdPlaignant() === $plaignant){
                    return $this->plaignants[$i];
                }
            }
        }
        public function ajoutPlaignantMyDb($idPlaignant, $idEnqueteur, $nom, $prenom, $surnom, $cin, $adresse, $contact, $profession, $sexe){

            $datet = new DateTime();

            $req1 = $this->getMyDb()->prepare("SELECT * FROM plaignant WHERE ID_Plaignant = :idPlaignant");
            $req1->bindValue(":idPlaignant", $idPlaignant."P.". $_SESSION["service"] .".".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
            $req1->execute();
            $res = $req1->rowCount();
            if($res > 0){
                return  "erreur";
            }else{
                $req = $this->getMyDb()->prepare("INSERT INTO plaignant VALUES(:idPlaignant, :idEnqueteur, :nom, :prenom, :surnom, :cin, :adresse, :contact, :profession, :sexe,CURRENT_TIMESTAMP())");
                $req->bindValue(":idPlaignant", $idPlaignant."P.". $_SESSION["service"] .".".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
                $req->bindValue(":idEnqueteur", $idEnqueteur, PDO::PARAM_STR);
                $req->bindValue(":nom", $nom, PDO::PARAM_STR);
                $req->bindValue(":prenom", $prenom, PDO::PARAM_STR);
                $req->bindValue(":surnom", $surnom, PDO::PARAM_STR);
                $req->bindValue(":cin", $cin, PDO::PARAM_STR);
                $req->bindValue(":adresse", $adresse, PDO::PARAM_STR);
                $req->bindValue(":contact", $contact, PDO::PARAM_STR);
                $req->bindValue(":profession", $profession, PDO::PARAM_STR);
                $req->bindValue(":sexe", $sexe, PDO::PARAM_STR);
    
                $resultat = $req->execute();
                $req->closeCursor();

                return "success";
            }

        }

        public function modifierPlaignantMyDb($idEnqueteur, $nom, $prenom, $surnom, $cin, $adresse, $contact, $profession, $sexe, $id){
            $req = $this->getMyDb()->prepare("UPDATE plaignant SET ID_Enqueteur = :idEnqueteur, Nom = :nom, Prenom = :prenom, Surnom = :surnom, CIN = :cin, Adresse = :adresse, Contact = :contact, Profession = :profession, Sexe = :sexe WHERE ID_Plaignant = :id");
            $req->bindValue(":idEnqueteur", $idEnqueteur, PDO::PARAM_STR);
            $req->bindValue(":nom", $nom, PDO::PARAM_STR);
            $req->bindValue(":prenom", $prenom, PDO::PARAM_STR);
            $req->bindValue(":surnom", $surnom, PDO::PARAM_STR);
            $req->bindValue(":cin", $cin, PDO::PARAM_STR);
            $req->bindValue(":adresse", $adresse, PDO::PARAM_STR);
            $req->bindValue(":contact", $contact, PDO::PARAM_STR);
            $req->bindValue(":profession", $profession, PDO::PARAM_STR);
            $req->bindValue(":sexe", $sexe, PDO::PARAM_STR);
            $req->bindValue(":id", $id, PDO::PARAM_STR);

            $resultat = $req->execute();
            $req->closeCursor();
        }

        public function supprimerPlaignantMyDb($idPlaignant){
            $req = $this->getMyDb()->prepare("DELETE FROM plaignant WHERE ID_Plaignant = :idPlaignant");
            $req->bindValue(":idPlaignant", $idPlaignant, PDO::PARAM_STR);

            $resultat = $req->execute();
            $req->closeCursor() ;

            if($resultat > 0){
                $plaignant = $this->getPlaignantById($idPlaignant);
                unset($plaignant);
            }
        }
    }
?>