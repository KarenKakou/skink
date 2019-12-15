<?php

require_once('modules/module_projet/Controleur_projet.php');
class mod_projet
{

    private $controleur;

    public function __construct()
    {
        $this->controleur = new Controleur_projet();
    }

    public function launchModProjet() {

        //Si pas de "actionProjet", error
        if (isset($_GET['actionProjet'])) {
            $actionProjet= $_GET['actionProjet'];
        } else {
            $actionProjet = 'errorProjet';
        }

        switch ($actionProjet) {
            case "formProjet" :
                $this->controleur->formulaireProjet();
                break;

            case "ajoutProjet" :
                $this->controleur->ajoutProjet($_POST['NomProjet'],
                    $_POST['CompteClientProjet'],
                    $_POST['CompteTatoueurProjet'],
                    $_POST['DescriptionProjet'],
                    $_POST['MontantProjet'],
                    $_POST['NbEcheanceProjet']);
                    break;
        }
    }

}