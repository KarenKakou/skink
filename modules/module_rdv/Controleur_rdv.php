<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');

require_once('modules/module_rdv/Modele_rdv.php');
require_once('modules/module_rdv/Vue_rdv.php');

class Controleur_rdv
{
        private $modele;
        private $vue;

        public function __construct()
        {
            $this->modele = new Modele_rdv();
            $this->vue = new Vue_rdv();
        }

        public function formRDV($listProjet) {
            $this->vue->formulaireRDV($listProjet);
        }

        public function ajoutRDV($date, $heureDebRDV, $projet, $dureeRDV){
            $this->modele->ajoutRDV($date, $heureDebRDV,$projet, $dureeRDV);
        }

        public function listProjetAvecActeur() {
            return $this->modele->listProjetAvecActeur();
        }

        public function listeRdv($id){
            $this->vue->afficheRdv($this->modele->listeDesRdvs($id));
        }
}