<?php

class Modele_Messagerie  extends Connexion {

    public function __construct()
    {

    }

    public function listeDeComptePar($typeCompte) {

        switch ($typeCompte){
            case "Client" :
                $idStatut = 1;
                break;
            case "Tatoueur" :
                $idStatut = 2;
                break;
            case "Admin" :
                $idStatut = 3;
                break;
        }

        $listCompte = $this::$bdd->prepare('SELECT * from COMPTE where idStatut=?');
        $array = array($idStatut);
        $listCompte->execute($array);
        return $listCompte->fetchAll();
    }

    //Methode qui renvoie une liste de conversation par rapport à la personne connecté
    public function listConv() {
        //Recherche de conversation par rapport au destinataire
        $listConv = $this::$bdd->prepare('SELECT idConv, nomCompte, prenomCompte from MESSAGE INNER JOIN COMPTE using(idCompte) where idCompte_COMPTE=?');
        $array = array($_SESSION['idCompte']);
        if(!$listConv->execute($array)) {
            echo "Il y a eu une erreur dans la première recherche de conversation";
        }
        $list1 = $listConv->fetchAll();

        //Recherche de conversation par rapport a l'emetteur
        $listConv = $this::$bdd->prepare('SELECT idConv, nomCompte, prenomCompte from MESSAGE INNER JOIN COMPTE ON MESSAGE.idCompte_COMPTE = COMPTE.idCompte where MESSAGE.idCompte=?');
        if(!$listConv->execute($array)) {
            echo "Il y a eu une erreur dans la seconde recherche de conversation";
        }
        $list2 = $listConv->fetchAll();

        if(empty($list1)) {
            return $list2;
        }elseif (empty($list2))  {
            return $list1;
        }else {
            array_push($list1, $list2);
            return $list1;
        }
    }

    //permet de créer une nouvelle conversation entre la personne connecté et la personne desire (Et lui envoit un message "Nouvelle conversation"
    public function newConversation($compteTatoueur) {
        $insertPrepare = $this::$bdd->prepare('INSERT into CONVERSATION values(DEFAULT)');
        if($insertPrepare->execute()) {
            echo "La conversation a bien été créée";
            $idConv = $this::$bdd->lastInsertId();

            //Insérer le message "Nouvelle conversation"
            $this->nouveauMessage("Nouvelle conversation", null, $idConv, $_SESSION['idCompte'], $compteTatoueur);
            return $idConv;
        }else {
            echo "Il y a eu un problème avec la création de la conversation";
        }
    }

    //Methode permettant d'envoyer un nouveau message
    public function nouveauMessage($corps, $pieceJointe = null, $idConv, $idCompteEmetteur, $idCompteReceveur) {
        $insertMessagePrepare = $this::$bdd->prepare('INSERT into MESSAGE values(DEFAULT, ?, ?, ?, ?, ?)');
        $array = array($corps, $pieceJointe, $idConv, $idCompteEmetteur, $idCompteReceveur);
        if($insertMessagePrepare->execute($array)) {
            echo "Le message a bien été envoyé";
        }else {
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