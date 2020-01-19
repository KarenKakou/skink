<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');


require_once('modules/module_connexion/Vue_Connexion.php');
require_once('modules/module_connexion/Modele_connexion.php');
require_once('lib/Token.php');
    class Controleur_Connexion
    {
        private $vueConnexion;
        private $modeleConnexion;

        public function __construct()
        {
            $this->vueConnexion = new Vue_Connexion();
            $this->modeleConnexion = new Modele_connexion();
        }

        //Methode de connexion
        public function connect($email, $password, $token) {
            if(Token::checkToken($token)) {
                $this->modeleConnexion->connect($email, $password);
            }else {
                echo "<section>Veuillez recommencer</section>";
                $this->formConnexion();
            }
        }

        //Formulaire d'inscription pour le client
        public function formInscription() {
            $this->vueConnexion->form_InscriptionClient();
        }

        //Formulaire d'inscription pour l'admin
        public function formInscriptionAdmin() {
            $this->vueConnexion->form_InscriptionParAdmin();
        }

        //Ajout de l'inscripton dans la base de donnee dans la table "Compte"
        public function ajoutinscription($nom, $prenom, $adresse, $telephone, $email, $password, $token, $statut=1) {
            if(Token::checkToken($token)) {
                if ($email == "" || $nom == "" || $password == "" || $prenom == "") {
                    echo "Vous devez remplir obligatoirement les champs avec \"*\"";
                    $this->formConnexion();
                } else {
                    $this->modeleConnexion->ajoutCompte($nom, $prenom, $adresse, $telephone, $email, $password, $statut);
                }
            }else {
                echo "Veuillez recommencer";
                $this->formConnexion();
            }
        }

        //Formulaire permettant de se connecter
        public function formConnexion() {
            $this->vueConnexion->form_Connexion_Inscription();
        }

        //Method pour se deconnecter
        public function deconnect() {
            $this->modeleConnexion->deconnect();
        }

        //Method permettant la suppression d'un compte
        public function delCompte($email){
            $this->modeleConnexion->deleteCompte($email);
        }
    }
?>
