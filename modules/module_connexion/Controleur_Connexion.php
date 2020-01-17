<?php

require_once('modules/module_connexion/Vue_Connexion.php');
require_once('modules/module_connexion/Modele_connexion.php');
require_once('lib/Generique.php');
    class Controleur_Connexion
    {
        private $vueConnexion;
        private $modeleConnexion;

        public function __construct()
        {
            $this->vueConnexion = new Vue_Connexion();
            $this->modeleConnexion = new Modele_connexion();
        }

        public function getAffichage() {
        return $this->vueConnexion->getAffichage();
    }

        //Methode de connexion
        public function connect($email, $password, $token) {
            if(Generique::checkToken($token)) {
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
        public function ajoutinscription($nom, $prenom, $adresse, $telephone, $email, $password, $statut=1) {
            $this->modeleConnexion->ajoutCompte($nom, $prenom, $adresse, $telephone,$email, $password, $statut);
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
