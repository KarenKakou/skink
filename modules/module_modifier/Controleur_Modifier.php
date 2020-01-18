<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');


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
            $this->vueModifier->afficherFormulaires($idCompte, $this->modeleModifier->obtenirCompte($idCompte),
                $this->modeleModifier->nombreProjetsEnCours($idCompte), $this->modeleModifier->nombreProjetsTermines($idCompte));
        }

        public function getAffichage() {
            return $this->vueModifier->getAffichage();
        }

        public function mettreAJourCompte($prenom, $nom, $telephone , $description, $idCompte) {
             $this->modeleModifier->updateCompte($prenom, $nom, $telephone, $description, $idCompte);
        }

        public function mettreAJourAvatar($avatarCompte,$idCompte) {
             $this->modeleModifier->updateAvatar(Util::uploadImage("images_avatar"), $idCompte);
        }
    }
?>