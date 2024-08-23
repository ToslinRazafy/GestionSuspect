<?php 
    require_once("config/database.php");
    require_once("Infraction.class.php");

    class InfractionManager extends Database{
        private $infractions;

        public function ajoutInfraction($infraction){
            $this->infractions[] = $infraction;
        }

        public function getInfraction(){ return $this->infractions; }
        
        public function chargementInfraction(){
            $req = $this->getMyDb()->prepare("SELECT infraction.*, plaignant.Surnom FROM Infraction, plaignant, rapport WHERE infraction.ID_Infraction = rapport.ID_Infraction AND plaignant.ID_Plaignant = rapport.ID_Plaignant ORDER BY infraction.Date_Ajout DESC");
            $req->execute();
            $mesInfractions = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($mesInfractions as $infraction){
                $i = new Infraction($infraction["ID_Infraction"], $infraction["Quand"], $infraction["Lieu"], $infraction["Description"], $infraction["Categorie"], $infraction["Surnom"]);
                $this->ajoutInfraction($i);
            }
        }

        public function nombreInfraction(){
            $datet = new DateTime();
            $annee = "%.".date("Y", $datet->getTimestamp());
            $req = $this->getMyDb()->prepare("SELECT * FROM infraction WHERE ID_Infraction LIKE '$annee'");
            $req->execute();
            $mesInfractions = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            $nombre = 0;
            foreach($mesInfractions as $infraction){
                $nombre++;
            }
            return $nombre;
        }

        public function getInfractionById($idInfraction){
            for($i = 0; $i < count($this->infractions); $i++){
                if($this->infractions[$i]->getIdInfraction() === $idInfraction){
                    return $this->infractions[$i];
                }
            }
        }

        public function ajoutInfractionMyDb($idInfraction, $date, $lieu, $description, $categorie){
            $req = $this->getMyDb()->prepare("INSERT INTO infraction VALUES(:idInfraction, :date, :lieu, :description, :categorie, CURRENT_TIMESTAMP())");
            $datet = new DateTime();
            $req->bindValue(":idInfraction", $idInfraction.".".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
            $req->bindValue(":date", $date);
            $req->bindValue(":lieu", $lieu, PDO::PARAM_STR);
            $req->bindValue(":description", $description, PDO::PARAM_STR);
            $req->bindValue(":categorie", $categorie, PDO::PARAM_STR);

            $resultat = $req->execute();

            $req2 = $this->getMyDb()->prepare("SELECT * FROM plaignant ORDER BY Date_Ajout DESC LIMIT 1");
            $req2->execute();
            $plaignant = $req2->fetch(PDO::FETCH_ASSOC);

            $req3 = $this->getMyDb()->prepare("SELECT * FROM infraction WHERE ID_Infraction = :idInfraction");
            $req3->bindValue(":idInfraction", $idInfraction.".".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
            $req3->execute();
            $infracion = $req3->fetch(PDO::FETCH_ASSOC);

            $req4 = $this->getMyDb()->prepare("INSERT INTO rapport VALUES(:idInfraction, :idPlaignant)");
            $req4->bindValue(":idInfraction", $infracion["ID_Infraction"], PDO::PARAM_STR);
            $req4->bindValue(":idPlaignant", $plaignant["ID_Plaignant"], PDO::PARAM_STR);
            $req4->execute();

            $req3->closeCursor();
            $req2->closeCursor();
            $req->closeCursor();

        }

        public function modifierInfractionMyDb($idInfraction, $date, $lieu, $description, $categorie, $id){
            $req = $this->getMyDb()->prepare("UPDATE infraction SET ID_Infraction = :idInfraction, Quand = :date, Lieu = :lieu, Description = :description, Categorie = :categorie WHERE ID_Infraction = :id");
            $datet = new DateTime();
            $req->bindValue(":idInfraction", $idInfraction.".".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
            $req->bindValue(":date", $date);
            $req->bindValue(":lieu", $lieu, PDO::PARAM_STR);
            $req->bindValue(":description", $description, PDO::PARAM_STR);
            $req->bindValue(":categorie", $categorie, PDO::PARAM_STR);
            $req->bindValue(":id", $id, PDO::PARAM_STR);

            $resultat = $req->execute();
            $req->closeCursor();
        }

        public function supprimerInfractionMyDb($idInfraction){
            $req = $this->getMyDb()->prepare("DELETE FROM infraction WHERE ID_Infraction = :idInfraction");
            $req->bindValue(":idInfraction", $idInfraction, PDO::PARAM_STR);

            $resultat = $req->execute();
            $req->closeCursor() ;

            if($resultat > 0){
                $infraction = $this->getInfractionById($idInfraction);
                unset($infraction);
            }
        }
    }
?>