<?php 
    require_once("models/EnqueteurManager.class.php");

    class EnqueteurController{
        private $enqueteurManager;
        
        public function __construct() {
            $this->enqueteurManager = new enqueteurManager();
            $this->enqueteurManager->chargementEnqueteur();
        }

        public function afficherEnqueteur($url){
            $enqueteurs = $this->enqueteurManager->getEnqueteur();
            require("views/enqueteur/enqueteur.view.php");
        }

        public function ajouterEnqueteur(){
            $enqueteurs = $this->enqueteurManager->getEnqueteur();
            require("views/enqueteur/ajout.view.php");
        }

        public function ajouterEnqueteurValidation(){
            $file = $_FILES['image'];
            $repertoire = "public/images/enqueteur/";
            $nomImageAjoute = $this->ajoutImage($file,$repertoire);
            $this->enqueteurManager->ajoutEnqueteurMyDb($_POST["id"], $_POST["service"], $_POST["nom"], $_POST["grade"], $_POST["contact"], $nomImageAjoute);
            echo "ato";
            header("Location:" . URL . "enqueteur");
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

        public function enqueteurLogin(){
            $infracation = $this->enqueteurManager->getEnqueteurByNumeroMotDePasse($_POST["tel"], $_POST["password"]);
            if($infracation != null){
                $verify = $this->enqueteurManager->verifierChefService($infracation->getContact());
                if($verify == 1){
                    $_SESSION["chefService"] = $infracation->getContact();
                }
                $_SESSION["nom"] = $infracation->getNom();
                $_SESSION["grade"] = $infracation->getGrade();
                $_SESSION["idEnqueteur"] = $infracation->getIdEnqueteur();
                $_SESSION["service"] = $infracation->getIdService();
                $_SESSION["contact"] = $infracation->getContact();
                $_SESSION["image"] = $infracation->getImage();
                header("Location:". URL ."accueil");
            }else{
                return "erreur";
            }
        }

        public function modifierEnqueteurValidation($idenqueteur){
            $imageActuelle = $this->enqueteurManager->getEnqueteurById($idenqueteur)->getImage();
            $file = $_FILES['image'];
            
            if($file['size'] > 0){
                unlink("public/images/enqueteur/".$imageActuelle);
                $repertoire = "public/images/enqueteur/";
                $nomImageToAdd = $this->ajoutImage($file,$repertoire);
            } else {
                $nomImageToAdd = $imageActuelle;
            }
            $this->enqueteurManager->modifierenqueteurMyDb($_POST["id"], $_POST["service"], $_POST["nom"], $_POST["garde"], $_POST["contact"], $nomImageToAdd, $idenqueteur);
            $_SESSION["nom"] = $_POST["nom"];
            $_SESSION["grade"] = $_POST["garde"];
            $_SESSION["idEnqueteur"] = $_POST["id"];
            $_SESSION["service"] = $_POST["service"];
            $_SESSION["contact"] = $_POST["contact"];
            $_SESSION["image"] = $nomImageToAdd;
            header("Location:" . URL . "profile");
        }


        public function modifierMotDepasse($contact){
            $erreur =  $this->enqueteurManager->modifierMotDepasse($contact, $_POST["password"], $_POST["newpassword"], $_POST["renewpassword"]);
            if($erreur === "erreur"){
                header("Location:" . URL ."profile/erreur");
            }else{
                header("Location:" . URL ."profile/sucess");
            }
        }

        public function supprimerEnqueteur($idenqueteur){
            $nomImage = $this->enqueteurManager->getEnqueteurById($idenqueteur)->getImage();
            unlink("public/images/enqueteur/".$nomImage);
            $this->enqueteurManager->supprimerEnqueteurMyDb($idenqueteur);
            header("Location:" . URL . "enqueteur");
        }
    }
?>