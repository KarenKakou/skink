<?php
if(!defined('CONST_INCLUDE'))
    die('Error 282');

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
                    $this->controleur->uploaderImage($_GET['id'], $_POST['tokenImage']);
                break;
                case "noAction" :
                    //correcte ?
                    $this->controleur->recupererTousTatoueurs(2);
                break;
                case "voirGalerie" :
                    /*
                    $this->controleur->recupererTatoueur($_GET['id']);
                    $this->controleur->recupererImages($_GET['id']);*/

                    $this->controleur->galeriePerso($_GET['id']);

                    if(isset($_SESSION['Statut']) && $_SESSION['Statut'] == 2)
                        $this->controleur->afficherUpload($_GET['id']);
                break;
                case "supprimer" :
                    $this->controleur->supprimerImage($_GET['id']);
                break;
                case "voirImage" :
                    $this->controleur->recupererImage($_GET['id']);
                break;
            }

        }
    }
?>