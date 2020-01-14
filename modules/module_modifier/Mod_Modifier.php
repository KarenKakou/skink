<?php

require_once('modules/module_modifier/Controleur_Modifier.php');

    class Mod_Modifier {

        private $controleur;

        public function __construct()
        {
            $this->controleur = new Controleur_Modifier();
        }

        public function launchModModifier()
        {
            if(isset($_GET['action'])){
                $action = $_GET['action'];
            } 
            else {
                $action = "formulaire";
            }
            switch($action) {
                case "formulaire" :
                    $this->controleur->formulaireCompte($_GET['id']);
                break;
                case "mettreAJourAvatar":
                    $this->controleur->mettreAJourAvatar($_POST['avatarCompte'],
                    $_GET['id']);
                    break;
                case "mettreAJourCompte":
                    $this->controleur->mettreAJourCompte($_POST['descriptionCompte'], 
                    $_GET['id']);
                    break;
            }
        }
    }
?>