<?php

require_once('modules/module_connexion/Controleur_Connexion.php');

    class mod_Connexion {

        private $controleur;

        public function __construct()
        {
            $this->controleur = new Controleur_Connexion();
        }

        public function launchModConnexion()
        {
            //Si pas de "actionConnexion", error
            if (isset($_GET['actionConnexion'])) {
                $actionConnexion = $_GET['actionConnexion'];
            } else {
                $actionConnexion = 'errorConnexion';
            }

            switch ($actionConnexion) {
                //Se connecter
                case "connexion" :
                    $this->controleur->connect($_POST['identifiantConnexion'], $_POST['MotDePasseConnexion']);
                    break;

                //formulaire de Connexion
                case "formConnexion" :
                    $this->controleur->formConnexion();
                    break;

                //Cas d'inscription, "Admin = 0 ou 1" si l'inscription est faite par l'admin ou le client
                case "inscription" :
                    if(isset($_GET['Admin'])) {
                        $this->controleur->formInscriptionAdmin();
                    }else {
                        $this->controleur->formInscription();
                    }
                    break;

                //Ajout d'un compte par l'admin
                case "ajoutInscriptionAdmin" :
                    $this->controleur->ajoutinscription($_POST['nomInscriptionAdmin'],
                        $_POST['prenomInscriptionAdmin'],
                        $_POST['adresseInscriptionAdmin'],
                        $_POST['telephoneInscriptionAdmin'],
                        $_POST['emailInscriptionAdmin'],
                        $_POST['motDePasseInscriptionAdmin'],
                        $_POST['statutInscriptionAdmin']);
                    break;

                //Ajout d'un compte par un client
                case "ajoutInscription" :
                    $this->controleur->ajoutinscription($_POST['nomInscription'],
                        $_POST['prenomInscription'],
                        $_POST['adresseInscription'],
                        $_POST['telephoneInscription'],
                        $_POST['emailInscription'],
                        $_POST['motDePasseInscription']);
                    break;

                //Cas de deconnexion
                case "deconnexion":
                    $this->controleur->deconnect();
                    break;

                //Cas d'erreur à coder
                case "error" :
                    break;

                case "deleteCompte" :
                    $this->controleur->delCompte($_GET['email']);
                    break;
            }
        }

    }
