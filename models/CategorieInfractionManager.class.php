<?php 
    require_once("config/database.php");
    require_once("CategorieInfraction.class.php");

    class CategorieInfractionManager extends Database{
        private $categories;

        public function ajoutCategorie($categorie){
            $this->categories[] = $categorie;
        }

        public function getCategorie(){ return $this->categories; }
        
        public function chargementCategorie(){
            $req = $this->getMyDb()->prepare("SELECT * FROM categoriinfraction");
            $req->execute();
            $mesCategories = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($mesCategories as $categories){
                $c = new CategorieInfraction($categories["NomCategorie"]);
                $this->ajoutCategorie($c);
            }
        }
 
    }
?>