<?php 
    session_start();
    define("HOST","localhost");
    define("DB_NAME","Gestion_suspects");
    define("USER","root");
    define("PASSWORD","");

    abstract class Database{
        private static $mydb;

        private static function setMyDb(){
            self::$mydb = new PDO("mysql:host=". HOST . ";dbname=". DB_NAME, USER, PASSWORD);
            self::$mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        protected function getMyDb(){
            if(self::$mydb === null){
                self::setMyDb();
            }
            return self::$mydb;
        }
    }
?>