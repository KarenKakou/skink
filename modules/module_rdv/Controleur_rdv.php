<?php
if(!defined('CONST_INCLUDE'))
    die('Error 282');

require_once('modules/module_rdv/Modele_rdv.php');
require_once('modules/module_rdv/Vue_rdv.php');
require_once('lib/Token.php');

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

        public function ajoutRDV($date, $heureDebRDV, $projet, $dureeRDV, $token){
            if(Token::checkToken($token)) {
                $this->modele->ajoutRDV($date, $heureDebRDV, $projet, $dureeRDV);
            }else {
                echo "<section>Veuillez recommencer l'ajout du RDV</section>";
                $this->formRDV($this->listProjetAvecActeur());
            }
        }

        public function listProjetAvecActeur() {
            return $this->modele->listProjetAvecActeur();
        }

        public function listeRdv($idClient){
            $this->vue->afficheRdv($this->modele->listeDesRdvs($idClient));
        }
}