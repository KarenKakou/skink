<?php
if(!defined('CONST_INCLUDE'))
    die('Error 282');

require_once('modules/module_modifier/Controleur_Modifier.php');

    class Mod_Modifier {

        private $controleur;

        public function __construct()
        {
            $this->controleur = new Controleur_Modifier();
        }

        public function getAffichage() {
            return $this->controleur->getAffichage();
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
                    $_GET['id'], $_POST['tokenAvatar']);
                    break;
                case "mettreAJourCompte":
                    $this->controleur->mettreAJourCompte(
                        $_POST['prenomCompte'], 
                        $_POST['nomCompte'], 
                        $_POST['telephoneCompte'],
                        $_POST['descriptionCompte'], 
                        $_GET['id'],
                        $_POST['tokenModif']);
                    break;
            }
        }
    }
?>