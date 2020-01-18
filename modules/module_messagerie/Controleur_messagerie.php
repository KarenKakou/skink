<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');

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
        $this->afficheConv($idConv);
    }

    public function afficheConv($idConv) {
        $listConv = $this->modeleMessagerie->listConv();
        if(empty($listConv)) {
            if($_SESSION['Statut'] == 1)
                echo "<section>
                            Vous n'avez pas de conversation en cours, allez dans la galerie pour trouver un tatoueur
                            <a href='index.php?module=galerie'><button>Se rendre dans la galerie pour trouver un Tatoueur</button></a>
                      </section>";
            else
                echo "<section>En tant que tatoueur, vous n'avez aucune conversation actuelle avec un client</section>";
        }else {
            if ($idConv == null) {
                $idConv = $listConv[0]['idConv'];
            }
            $this->vueMessagerie->vue_AffichesMessages($this->modeleMessagerie->listConv(), $this->modeleMessagerie->accederMessage($idConv), $idConv);
        }
    }

    public function envoyerMessage($corpsMessage, $idConv, $idCompteEmetteur) {
        if($corpsMessage == "" || $corpsMessage == null) {
            echo "<section>
                    Vous ne pouvez pas envoyer un message sans corps
                  </section>";
        }
        else {
            $idCompteReceveur = $this->modeleMessagerie->avoirReceveur($idConv, $idCompteEmetteur);
            $this->modeleMessagerie->nouveauMessage($corpsMessage, $idConv, $idCompteEmetteur, $idCompteReceveur);
            $this->afficheConv($idConv);
        }
    }

}