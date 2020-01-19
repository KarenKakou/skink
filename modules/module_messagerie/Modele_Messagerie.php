<?php

if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');

class Modele_Messagerie  extends Connexion {

    public function __construct()
    {

    }

    //Methode qui renvoie une liste de conversation par rapport à la personne connecté
    public function listConv() {
        //Recherche de conversation par rapport au destinataire
        if($_SESSION['Statut'] == 1) {
            $listConv = $this::$bdd->prepare('SELECT distinct idConv, nomCompte, prenomCompte, avatarCompte from MESSAGE INNER JOIN COMPTE ON MESSAGE.idCompte_COMPTE = COMPTE.idCompte where MESSAGE.idCompte=?');
        }
        else {
            $listConv = $this::$bdd->prepare('SELECT distinct idConv, nomCompte, prenomCompte, avatarCompte  from MESSAGE INNER JOIN COMPTE using(idCompte) where idCompte_COMPTE=?');
        }
        $array = array($_SESSION['idCompte']);
        if(!$listConv->execute($array)) {
            echo "Il y a eu une erreur dans la première recherche de conversation";
        }
        return $listConv->fetchAll();
    }

    //permet de créer une nouvelle conversation entre la personne connecté et la personne desire (Et lui envoit un message de Nouvelle conversation
    public function newConversation($compteTatoueur) {
        $listConv = $this::$bdd->prepare('SELECT distinct idConv, COMPTE.idCompte, nomCompte, prenomCompte from MESSAGE INNER JOIN COMPTE ON MESSAGE.idCompte_COMPTE = COMPTE.idCompte where MESSAGE.idCompte=? AND MESSAGE.idCompte_COMPTE=?');
        $array = array($_SESSION['idCompte'],$compteTatoueur);
        $listConv->execute($array);
        $listConversation = $listConv->fetchAll();
        if(empty($listConversation)) {
            $insertPrepare = $this::$bdd->prepare('INSERT into CONVERSATION values(DEFAULT)');
            if ($insertPrepare->execute()) {
                $idConv = $this::$bdd->lastInsertId();

                //Insérer le message "Nouvelle conversation"
                $this->nouveauMessage("Voici votre nouvelle conversation avec un tatoueur, écrivez lui votre idée de projet ou demandez lui des conseils !", $idConv, $_SESSION['idCompte'], $compteTatoueur);
                return $idConv;
            }
        }
        else {
            echo "Vous avez déjà une conversation avec cette personne";
        }
    }

    //Methode permettant d'envoyer un nouveau message
    public function nouveauMessage($corps, $idConv, $idCompteEmetteur, $idCompteReceveur) {

        $insertMessagePrepare = $this::$bdd->prepare('INSERT into MESSAGE values(DEFAULT, ?, ?, ?, ?, ?)');
        $array = array($corps, null, $idConv, $idCompteEmetteur, $idCompteReceveur);
        if(!$insertMessagePrepare->execute($array)) {
            echo "Il y a eu un problème avec l'envoie du message";
        }
    }

    //Methode permettant de récuperer tous les messages d'une conversation
    public function accederMessage($idConv) {
        $listMessage = $this::$bdd->prepare('SELECT * from MESSAGE where idConv=?');
        $array = array($idConv);
        $listMessage->execute($array);
        return $listMessage->fetchAll();
    }

    //Methode permettant de trouver le second compte d'une conversation
    public function avoirReceveur($idConv, $idCompteEmetteur) {
        $listMessage = $this::$bdd->prepare('SELECT * from MESSAGE where idConv=?');
        $array = array($idConv);
        $listMessage->execute($array);
        $list = $listMessage->fetchAll();
        $premierMess = array_shift($list);
        if($idCompteEmetteur == $premierMess['idCompte'])
            return $premierMess['idCompte_COMPTE'];
        else
            return $premierMess['idCompte'];
    }

}