<?php 
    require_once("config/database.php");
    require_once("DossierJudiciaire.class.php");

    class DossierJudiciaireManager extends Database{
        private $dossiers;

        public function ajoutDossier($dossier){
            $this->dossiers[] = $dossier;
        }

        public function getDossier(){ return $this->dossiers; }

        public function getSuspect(){
            $req = $this->getMyDb()->prepare("SELECT * FROM suspect ORDER BY Date_Ajout DESC");
            $req->execute();
            $mesSuspect =  $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            return $mesSuspect;
        }

        public function getSuspectDossier($idDossier){
            $req = $this->getMyDb()->prepare("SELECT * FROM suspect WHERE ID_Suspect IN (SELECT ID_Suspect FROM concerner WHERE ID_Dossier = :idDossier)");
            $req->bindValue(":idDossier", $idDossier, PDO::PARAM_STR);
            $req->execute();
            $mesSuspect = $req->fetchAll(PDO::FETCH_ASSOC);
            return $mesSuspect;
        }
        
        public function chargementDossier(){
            $req = $this->getMyDb()->prepare("SELECT * FROM dossier_judiciaire ORDER BY Date_Ajout DESC");
            $req->execute();
            $mesDossier = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($mesDossier as $dossier){
                $d = new DossierJudiciaire($dossier["ID_Dossier"], $dossier["Resultat"], $dossier["Verdict"], $dossier["date_de_cloture"], $dossier["Date_Ajout"]);
                $this->ajoutDossier($d);
            }
        }

        public function nombreDossier(){
            $datet = new DateTime();
            $annee = "%.".date("Y", $datet->getTimestamp());
            $req = $this->getMyDb()->prepare("SELECT * FROM dossier_judiciaire WHERE ID_Dossier LIKE '$annee'");
            $req->execute();
            $mesDossier = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            $nombre = 0;
            foreach($mesDossier as $dossier){
                $nombre++;
            }
            return $nombre;
        }

        public function getDossierById($idDossier){
            for($i = 0; $i < count($this->dossiers); $i++){
                if($this->dossiers[$i]->getIdDossier() === $idDossier){
                    return $this->dossiers[$i];
                }
            }
        }

        public function ajoutSuspectMyDb($suspect, $dossier){
            $req = $this->getMyDb()->prepare("INSERT INTO concerner VALUES(:dossier, :suspect)");
            $req->bindValue(":suspect", $suspect, PDO::PARAM_STR);
            $req->bindValue(":dossier", $dossier, PDO::PARAM_STR);
            $req->execute();
        }

        public function ajoutDossierMyDb($idDossier, $resultat, $verdict, $dateCloture){
            $req = $this->getMyDb()->prepare("INSERT INTO dossier_judiciaire VALUES(:idDossier, :resultat, :verdict, :dateCloture, CURRENT_TIMESTAMP())");
            $datet = new DateTime();
            $req->bindValue(":idDossier", $idDossier.".MSP.SG.DGPN.DRSP.". $_SESSION["service"].".ASMHM.".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
            $req->bindValue(":resultat", $resultat, PDO::PARAM_STR);
            $req->bindValue(":verdict", $verdict, PDO::PARAM_STR);
            $req->bindValue(":dateCloture", $dateCloture, PDO::PARAM_STR);

            $result = $req->execute();


            // if($result > 0){
            //     $dossier = new DossierJudiciaire($idDossier, $resultat, $verdict, $dateCloture);
            //     $this->ajoutInfraction($infraction);
            // }

            // $req2 = $this->getMyDb()->prepare("SELECT * FROM plaignant ORDER BY Date_Ajout DESC LIMIT 1");
            // $req2->execute();
            // $plaignant = $req2->fetch(PDO::FETCH_ASSOC);
            // echo $plaignant["ID_Plaignant"];
            // echo $idInfraction.".".date("Y", $datet->getTimestamp());

            // $req3 = $this->getMyDb()->prepare("SELECT * FROM infraction WHERE ID_Infraction = :idInfraction");
            // $req3->bindValue(":idInfraction", $idInfraction.".".date("Y", $datet->getTimestamp()), PDO::PARAM_STR);
            // $req3->execute();
            // $infracion = $req3->fetch(PDO::FETCH_ASSOC);
            // echo $infracion["ID_Infraction"];

            // $req4 = $this->getMyDb()->prepare("INSERT INTO rapport VALUES(:idInfraction, :idPlaignant)");
            // $req4->bindValue(":idInfraction", $infracion["ID_Infraction"], PDO::PARAM_STR);
            // $req4->bindValue(":idPlaignant", $plaignant["ID_Plaignant"], PDO::PARAM_STR);
            // $req4->execute();

            // $req3->closeCursor();
            // $req2->closeCursor();
            $req->closeCursor();

        }

        public function modifierDossierMyDb($resultat, $verdict, $dateCloture, $id){
            $req = $this->getMyDb()->prepare("UPDATE dossier_judiciaire SET Resultat = :resultat, Verdict = :verdict, date_de_cloture = :dateCloture WHERE ID_Dossier = :id");
            $datet = new DateTime();
            $req->bindValue(":resultat", $resultat, PDO::PARAM_STR);
            $req->bindValue(":verdict", $verdict, PDO::PARAM_STR);
            $req->bindValue(":dateCloture", $dateCloture, PDO::PARAM_STR);
            $req->bindValue(":id", $id, PDO::PARAM_STR);

            $resultat = $req->execute();
            $req->closeCursor();
        }

        public function supprimerDossierMyDb($idDossier){
            $req = $this->getMyDb()->prepare("DELETE FROM dossier_judiciaire WHERE ID_Dossier = :idDossier");
            $req->bindValue(":idDossier", $idDossier, PDO::PARAM_STR);

            $resultat = $req->execute();
            $req->closeCursor() ;

            if($resultat > 0){
                $dossier = $this->getDossierById($idDossier);
                unset($dossier);
            }
        }
    }
?>