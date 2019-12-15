<?php

require_once('modules/module_galerie/Controleur_Galerie.php');

    class Mod_Galerie {

        private $controleur;

        public function __construct()
        {
            $this->controleur = new Controleur_Galerie();
        }

        public function launchModGalerie()
        {
            if(isset($_GET['action'])){
                $action = $_GET['action'];
            } 
            else {
                $action = "noAction";
            }
            switch($action) {
                case "upload" :
                    $this->controleur->uploaderImage($_GET['id']);
                break;
                case "noAction" :
                    $this->controleur->recupererTatoueur($_GET['id']);
                    $this->controleur->recupererImages($_GET['id']);
                    $this->controleur->afficherUpload($_GET['id']);
                break;
            }
        }
    }
?>