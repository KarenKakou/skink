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
            $this->vuePaiement->afficherProjets($array);
        }

        public function recupererProjetsDeTatoueur($idCompte) {
            $array = $this->modelePaiement->obtenirProjetsDeTatoueur($idCompte);
            $this->vuePaiement->afficherProjets($array);
        }

        public function recupererProjet($idProjet) {
            $arrayClient = $this->modelePaiement->obtenirProjet($idProjet);
            $arrayTatoueur = $this->modelePaiement->obtenirTatoueurProjet($idProjet);
            $this->vuePaiement->afficherProjet($arrayClient[0]);
            //attention le client n'a pas besoin de se voir lui même dans le proj le client (utiliser var globale plus tard) same pour le tatoueur
            $this->vuePaiement->afficherClientProjet($arrayClient[0]);
            $this->vuePaiement->afficherTatoueurProjet($arrayTatoueur[0]);
            $this->vuePaiement->afficherMajArrhes($idProjet);
            $this->vuePaiement->afficherIncrementerEcheances($idProjet);

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