<?php 
    require_once("config/database.php");
    require_once("models/Enqueteur.class.php");

    class EnqueteurManager extends Database{
        private $enqueteurs;

        public function ajouteEnqueteur($enqueteur){
            $this->enqueteurs[] = $enqueteur;
        }

        public function getEnqueteur(){ return $this->enqueteurs; }

        public function chargementEnqueteur(){
            $req = $this->getMyDb()->prepare("SELECT * FROM Enqueteur");
            $req->execute();
            $mesEnqueteur = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($mesEnqueteur as $enqueteur){
                $e = new Enqueteur($enqueteur["ID_Enqueteur"], $enqueteur["ID_Service"], $enqueteur["Nom"], $enqueteur["Grade"], $enqueteur["Contact"], $enqueteur["Mdp"], $enqueteur["image"]);
                $this->ajouteEnqueteur($e);
            }
        }

        public function verifierChefService($contact){
            $req = $this->getMyDb()->prepare("SELECT * FROM service WHERE Contact = :contact");
            $req->bindValue(":contact", $contact, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->rowCount();
            if( $resultat > 0){
                return true;
            }else{
                return false;
            }
        }

        
        public function getEnqueteurByNumeroMotDePasse($numero, $mdp){
            for($i = 0; $i < count($this->enqueteurs); $i++){
                if($this->enqueteurs[$i]->getContact() === $numero && $this->enqueteurs[$i]->getMdp() === md5($mdp)){
                    return $this->enqueteurs[$i];
                }
            }
        }

        public function getEnqueteurById($idEnqueteur){
            for($i = 0; $i < count($this->enqueteurs); $i++){
                if($this->enqueteurs[$i]->getIdEnqueteur() == $idEnqueteur){
                    return $this->enqueteurs[$i];
                }
            }
        }

        public function ajoutEnqueteurMyDb($idEnqueteur, $idService, $nom, $grade, $contact, $image){
            $mdp = "admin";
            $req = $this->getMyDb()->prepare("INSERT INTO enqueteur VALUES(:idEnqueteur, :idService, :nom, :grade, :contact, :mdp, :image)");
            $req->bindValue(":idEnqueteur", $idEnqueteur, PDO::PARAM_STR);
            $req->bindValue(":idService", $idService, PDO::PARAM_STR);
            $req->bindValue(":nom", $nom, PDO::PARAM_STR);
            $req->bindValue(":grade", $grade, PDO::PARAM_STR);
            $req->bindValue(":contact", $contact, PDO::PARAM_STR);
            $req->bindValue(":mdp", md5($mdp), PDO::PARAM_STR);
            $req->bindValue(":image", $image, PDO::PARAM_STR);

            $resultat = $req->execute();
            $req->closeCursor();

            if($resultat > 0){
                $enqueteur = new Enqueteur($idEnqueteur, $idService, $nom, $grade, $contact, $mdp, $image);
                $this->ajouteEnqueteur($enqueteur);
            }
        }

        public function modifierEnqueteurMyDb($idEnqueteur, $idService, $nom, $garde, $contact, $image, $id){
            $req = $this->getMyDb()->prepare("UPDATE enqueteur SET ID_Enqueteur = :idEnqueteur, ID_Service = :idService, Nom = :nom, grade = :garde, contact = :contact, image = :image WHERE ID_Enqueteur = :id");
            $req->bindValue(":idEnqueteur", $idEnqueteur, PDO::PARAM_STR);
            $req->bindValue(":idService", $idService, PDO::PARAM_STR);
            $req->bindValue(":nom", $nom, PDO::PARAM_STR);
            $req->bindValue(":garde", $garde, PDO::PARAM_STR);
            $req->bindValue(":contact", $contact, PDO::PARAM_STR);
            $req->bindValue(":image", $image, PDO::PARAM_STR);
            $req->bindValue(":id", $id, PDO::PARAM_STR);

            $resultat = $req->execute();
            $req->closeCursor();
        }

        public function modifierMotDepasse($contact, $mdp, $newmdp, $confirm){
            $mdp = md5($mdp);
            $req = $this->getMyDb()->prepare("SELECT * FROM enqueteur WHERE Contact = :contact AND Mdp = :mdp");
            $req->bindValue(":contact", $contact, PDO::PARAM_STR);
            $req->bindValue(":mdp", $mdp, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->rowCount();
            $req->closeCursor();
            if($resultat == 1 && $newmdp == $confirm){
                $newmdp = md5($newmdp);
                $req2 = $this->getMyDb()->prepare("UPDATE enqueteur SET Mdp = :newmdp WHERE Contact = :contact");
                $req2->bindValue(":newmdp", $newmdp, PDO::PARAM_STR);
                $req2->bindValue(":contact", $contact, PDO::PARAM_STR);
                $req2->execute();
                $req2->closeCursor();
            }else{
                return "erreur";
            }
        }

        public function supprimerEnqueteurMyDb($idEnqueteur){
            $req = $this->getMyDb()->prepare("DELETE FROM enqueteur WHERE ID_Enqueteur = :idEnqueteur");
            $req->bindValue(":idEnqueteur", $idEnqueteur, PDO::PARAM_STR);

            $resultat = $req->execute();
            $req->closeCursor() ;

            if($resultat > 0){
                $enqueteur = $this->getEnqueteurById($idEnqueteur);
                unset($enqueteur);
            }
        }
    }
?>