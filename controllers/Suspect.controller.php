<?php 
    require_once("models/SuspectManager.class.php");
    class SuspectController{
        private $suspectManager;
        
        public function __construct() {
            $this->suspectManager = new suspectManager();
            $this->suspectManager->chargementSuspect();
        }

        public function afficherSuspect($url){
            $suspects = $this->suspectManager->getSuspect();
            require("views/suspect/suspect.view.php");
        }

        public function nombreSuspect(){
            return $this->suspectManager->getNombreSuspect();
        }

        public function ajouterSuspect($url){
            $suspects = $this->suspectManager->getSuspect();
            $infractions = $this->suspectManager->getInfraction();
            require("views/suspect/ajout.view.php");
        }

        public function ajouterSuspectValidation(){
            $file = $_FILES['image'];
            $repertoire = "public/images/suspect/";
            $nomImageAjoute = $this->ajoutImage($file,$repertoire);
            $this->suspectManager->ajoutSuspectMyDb($_POST["id"], $_SESSION["idEnqueteur"], $_POST["nom"], $_POST["prenom"], $_POST["surnom"], $_POST["sexe"], $_POST["cin"], $_POST["age"], $_POST["date"], $_POST["lieu"], $_POST["adresse"], $_POST["contact"], $_POST["profession"], $_POST["description"], $_POST["idinfraction"], $nomImageAjoute);
            header("Location:" . URL . "suspect");
        }

        public function informationSuspect($idSuspect){
            $suspect = $this->suspectManager->getSuspectById($idSuspect);
            require("views/suspect/information.view.php");
        }

        private function ajoutImage($file, $dir){
            if(!isset($file['name']) || empty($file['name']))
                throw new Exception("Vous devez indiquer une image");
        
            if(!file_exists($dir)) mkdir($dir,0777);
        
            $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
            $random = rand(0,99999);
            $target_file = $dir.$random."_".$file['name'];
            
            if(!getimagesize($file["tmp_name"]))
                throw new Exception("Le fichier n'est pas une image");
            if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
                throw new Exception("L'extension du fichier n'est pas reconnu");
            if(file_exists($target_file))
                throw new Exception("Le fichier existe déjà");
            if($file['size'] > 500000000)
                throw new Exception("Le fichier est trop gros");
            if(!move_uploaded_file($file['tmp_name'], $target_file))
                throw new Exception("l'ajout de l'image n'a pas fonctionné");
            else return ($random."_".$file['name']);
        }

        public function modifierSuspect($url, $idSuspect){
            $suspect = $this->suspectManager->getSuspectById($idSuspect);
            $infractions = $this->suspectManager->getInfraction();
            require("views/suspect/modifier.view.php");
        }

        public function modifierSuspectValidation($idSuspect){
            $imageActuelle = $this->suspectManager->getSuspectById($idSuspect)->getImage();
            $file = $_FILES['image'];
            
            if($file['size'] > 0){
                unlink("public/images/suspect/".$imageActuelle);
                $repertoire = "public/images/suspect/";
                $nomImageToAdd = $this->ajoutImage($file,$repertoire);
            } else {
                $nomImageToAdd = $imageActuelle;
            }
            $this->suspectManager->modifierSuspectMyDb($_SESSION["idEnqueteur"], $_POST["nom"], $_POST["prenom"], $_POST["surnom"], $_POST["sexe"], $_POST["cin"], $_POST["age"], $_POST["date"], $_POST["lieu"], $_POST["adresse"], $_POST["contact"], $_POST["profession"], $_POST["description"], $_POST["antecedent"], $nomImageToAdd, $idSuspect);
            header("Location:" . URL . "suspect");
        }

        public function supprimerSuspect($idSuspect){
            $nomImage = $this->suspectManager->getSuspectById($idSuspect)->getImage();
            unlink("public/images/suspect/".$nomImage);
            $this->suspectManager->supprimerSuspectMyDb($idSuspect);
            header("Location:" . URL . "suspect");
        }
    }
?>