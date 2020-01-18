<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');

require_once('modules/module_rdv/Controleur_rdv.php');

class mod_rdv
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new Controleur_rdv();
    }

    public function getAffichage() {
        return $this->controleur->getAffichage();
    }

    public function launchModRdv() {
        //Si pas de "actionRDV", error
        if (isset($_GET['actionRDV'])) {
            $actionRDV = $_GET['actionRDV'];
        } else {
            $actionRDV = 'errorRDV';
        }

        switch ($actionRDV) {

            case "formRDV":
                $this->controleur->formRDV($this->controleur->listProjetAvecActeur());
                break;

            case "ajoutRDV" :
                $this->controleur->ajoutRDV($_POST['dateRDV'], $_POST['heureDebRDV'], $_POST['RDVProjet'], $_POST['tempsRDV']);
                break;
            case "listeRdv" :
                $this->controleur->listeRdv($_POST['id']);
                break;
        }
    }
}