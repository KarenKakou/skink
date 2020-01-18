<?php
if(!defined('CONST_INCLUDE'))
    die('Error 282');

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
                    if(isset($_POST['idProjet'])) {
                        $this->controleur->avancementPaiement($_POST['idProjet']);
                    }else {
                        $this->controleur->avancementPaiement($_GET['id']);
                    }
                break;
                case "majArrhes" :
                    $this->controleur->majArrhes($_POST['idProjet']);
                break;
                case "incEcheances" :
                    $this->controleur->incrementerEcheances($_POST['idProjet']);
                break;
            }
        }
    }
?>