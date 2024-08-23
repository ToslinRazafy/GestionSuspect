<?php 
    require_once("config/database.php");
    require_once("Service.class.php");

    class ServiceManager extends Database{
        private $services;

        public function ajoutServices($services){
            $this->services[] = $services;
        }

        public function getServices(){ return $this->services; }
        
        public function chargementServices(){
            $req = $this->getMyDb()->prepare("SELECT * FROM Service");
            $req->execute();
            $messervices = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($messervices as $services){
                $s = new Service($services["ID_Service"], $services["Contact"]);
                $this->ajoutServices($s);
            }
        }

        public function getServicesById($idservices){
            for($i = 0; $i < count($this->services); $i++){
                if($this->services[$i]->getIdservices() === $idservices){
                    return $this->services[$i];
                }
            }
        }
 
    }
?>