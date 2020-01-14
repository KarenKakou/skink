<?php

require_once('modules/module_modifier/Vue_Modifier.php');
require_once('modules/module_modifier/Modele_Modifier.php');

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
            $this->vueModifier->afficherFormulaires($idCompte);
        }

        public function compteActuel($compte) {
            $this->vueModifier->afficherCompteActuel($this->modeleModifier->obtenirCompte($compte));
        }

        public function mettreAJourCompte($description,$idCompte) {
             $this->modeleModifier->updateCompte($description, $idCompte);
        }

        public function mettreAJourAvatar($avatarCompte,$idCompte) {
             $this->modeleModifier->updateAvatar($this->modeleModifier->uploadImage(), $idCompte);
        }
    }
?>