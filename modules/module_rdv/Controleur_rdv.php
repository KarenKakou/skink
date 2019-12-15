<?php

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

        public function ajoutRDV($date, $projet, $dureeRDV, $modePaiement){
            $this->modele->ajoutRDV($date, $projet, $dureeRDV, $modePaiement);
        }

        public function listProjet() {
            return $this->modele->listProjet();
        }
}