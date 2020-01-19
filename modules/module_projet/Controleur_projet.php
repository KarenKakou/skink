<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');


require_once('modules/module_projet/Vue_projet.php');
require_once('modules/module_projet/Modele_projet.php');
require_once('util.php');
require_once('lib/Token.php');

class Controleur_projet
{

    private $vueProjet;
    private $modeleProjet;

    public function __construct()
    {
        $this->vueProjet = new Vue_projet();
        $this->modeleProjet = new Modele_projet();
    }

    public function formulaireProjet() {
        $this->vueProjet->formCreationProjet(Util::listeDeComptePar("Client"), Util::listeDeComptePar("Tatoueur"));
    }

    public function ajoutProjet($nomProjet, $idClient, $idTatoueur, $descriptionProjet, $montantProjet, $nbEcheance, $token) {
        if(Token::checkToken($token)) {
            $this->modeleProjet->ajoutProjet($nomProjet, $idClient, $idTatoueur, $descriptionProjet, $montantProjet, $nbEcheance);
        }else {
            echo "Veuillez recommencer";
            $this->formulaireProjet();
        }
    }
}