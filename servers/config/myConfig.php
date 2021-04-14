<?php 

    class Connect{
        //private $dns   = 'mysql:host=localhost;dbname=flowers';
        //private $user  = 'root';
        //private $passw = '';
        //protected $pdo = null;

        private $dns = 'mysql:host=localhost;dbname=web';
        private $user   = 'root';
        private $passw   = '';
        protected $pdo  = null;

        function __construct(){

            try {
                $this->pdo = new PDO($this->dns, $this->user, $this->passw);
                $this->pdo->query("SET NAMES utf8");

            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }
    }

?>