<?php

require_once('modules/module_image/Controleur_Image.php');

    class Mod_Image {

        private $controleur;

        public function __construct()
        {
            $this->controleur = new Controleur_Image();
        }

        public function launchModImage()
        {
            if(isset($_GET['action'])){
                $action = $_GET['action'];
            } 
            else {
                $action = "noAction";
            }
            switch($action) {
                case "supprimer" :
                    $this->controleur->supprimerImage($_GET['id']);
                break;
                case "noAction" :
                    $this->controleur->recupererImage($_GET['id']);
                break;

            }
        }
    }
?>