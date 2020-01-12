<?php

require_once('modules/module_paiement/Controleur_Paiement.php');

    class Mod_Paiement {

        private $controleur;

        public function __construct()
        {
            $this->controleur = new Controleur_Paiement();
        }

        public function launchModPaiement()
        {
            if(isset($_GET['action'])){
                $action = $_GET['action'];
            } 
            else {
                $action = "client";
            }
            switch($action) {
                case "client" :
                    $this->controleur->recupererProjetsDeClient($_GET['id']);
                break;
                case "tatoueur" :
                    $this->controleur->recupererProjetsDeTatoueur($_GET['id']);
                break;
                case "voirProjet" :
                    $this->controleur->avancementPaiement($_GET['id']);
                break;
                case "majArrhes" :
                    $this->controleur->majArrhes($_GET['id']);
                break;
                case "incEcheances" :
                    $this->controleur->incrementerEcheances($_GET['id']);
                break;
            }
        }
    }
?>