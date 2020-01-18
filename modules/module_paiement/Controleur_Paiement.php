<?php

require_once('modules/module_paiement/Vue_Paiement.php');
require_once('modules/module_paiement/Modele_Paiement.php');

    class Controleur_Paiement
    {
        private $vuePaiement;
        private $modelePaiement;

        public function __construct()
        {
            $this->vuePaiement = new Vue_Paiement();
            $this->modelePaiement = new Modele_Paiement();
        }

        public function recupererProjetsDeClient($idCompte) {
            $array = $this->modelePaiement->obtenirProjetsDeClient($idCompte);
            $this->vuePaiement->afficherProjetsPaiement($array);
        }

        public function recupererProjetsDeTatoueur($idCompte) {
            $array = $this->modelePaiement->obtenirProjetsDeTatoueur($idCompte);
            $this->vuePaiement->afficherProjetsPaiement($array);
        }

        public function avancementPaiement($idProjet) {
            $arrayClient = $this->modelePaiement->obtenirProjet($idProjet);
            $arrayTatoueur = $this->modelePaiement->obtenirTatoueurProjet($idProjet);
            $this->vuePaiement->afficherAvancementPaiement($arrayClient[0], $arrayClient[0], $arrayTatoueur[0]);

        }

        public function majArrhes($idProjet) {
            $this->modelePaiement->majArrhes($idProjet);
        }

        public function incrementerEcheances($idProjet) {

            $array = $this->modelePaiement->obtenirProjet($idProjet);
            $this->modelePaiement->incrementerEcheances($array[0]);
        }
    }
?>