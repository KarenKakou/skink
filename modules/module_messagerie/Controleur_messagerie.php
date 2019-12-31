<?php

require_once ('modules/module_messagerie/Modele_Messagerie.php');
require_once ('modules/module_messagerie/Vue_Messagerie.php');

class Controleur_messagerie
{
    private $vueMessagerie;
    private $modeleMessagerie;

    public function __construct()
    {
        $this->vueMessagerie= new Vue_Messagerie();
        $this->modeleMessagerie= new Modele_Messagerie();
    }

    public function creerOuAccederConv() {
        $this->vueMessagerie->formCreationOuAccesConv();
    }

    public function formCreateConv(){
        $this->vueMessagerie->formCreationConv($this->modeleMessagerie->listeDeComptePar("Tatoueur"));
    }

    public function accessConv() {
        $this->vueMessagerie->choisirDiscussion($this->modeleMessagerie->listConv());
    }

    public function createConv($compteTatoueur) {
        $idConv = $this->modeleMessagerie->newConversation($compteTatoueur);
        $this->vueMessagerie->afficheMessages($this->modeleMessagerie->accederMessage($idConv));
    }

    public function afficheConv($idConv) {
        $this->vueMessagerie->afficheMessages($this->modeleMessagerie->accederMessage($idConv), $idConv);
    }

    public function envoyerMessage($corpsMessage, $pieceJointe = null, $idConv, $idCompteEmetteur) {
        if($corpsMessage == "" || $corpsMessage == null) {
            echo "Vous ne pouvez pas envoyer un message sans corps";
        }
        else {
            $idCompteReceveur = $this->modeleMessagerie->avoirReceveur($idConv, $idCompteEmetteur);
            $this->modeleMessagerie->nouveauMessage($corpsMessage, $pieceJointe, $idConv, $idCompteEmetteur, $idCompteReceveur);
            $this->afficheConv($idConv);
        }
    }

}