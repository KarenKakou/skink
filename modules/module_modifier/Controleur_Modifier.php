<?php
if(!defined('CONST_INCLUDE'))
    die('Error 282');

require_once('modules/module_modifier/Vue_Modifier.php');
require_once('modules/module_modifier/Modele_Modifier.php');
require_once('lib/Token.php');

    class Controleur_Modifier
    {
        private $vueModifier;
        private $modeleModifier;

        public function __construct()
        {
            $this->vueModifier = new Vue_Modifier();
            $this->modeleModifier = new Modele_Modifier();
        }

        public function formulaireCompte($idCompte){
            $this->vueModifier->afficherFormulaires($idCompte, $this->modeleModifier->obtenirCompte($idCompte));
        }

        public function getAffichage() {
            return $this->vueModifier->getAffichage();
        }

        public function mettreAJourCompte($prenom, $nom, $telephone , $description, $idCompte, $token) {
            if(Token::checkToken($token)) {
                $this->modeleModifier->updateCompte($prenom, $nom, $telephone, $description, $idCompte);
            }
        }

        public function mettreAJourAvatar($avatarCompte,$idCompte, $token) {
            if(Token::checkToken($token)) {
                $this->modeleModifier->updateAvatar($this->modeleModifier->uploadImage(), $idCompte);
            }
        }
    }
?>