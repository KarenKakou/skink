<?php


require_once('modules/module_projet/Vue_projet.php');
require_once('modules/module_projet/Modele_projet.php');
require_once('util.php');


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

    public function ajoutProjet($nomProjet, $idClient, $idTatoueur, $descriptionProjet, $montantProjet, $nbEcheance) {
        $this->modeleProjet->ajoutProjet($nomProjet, $idClient, $idTatoueur, $descriptionProjet, $montantProjet, $nbEcheance);
    }
}