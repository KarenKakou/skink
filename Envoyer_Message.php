<?php
session_start();
require_once ('connexion.php');

Connexion::initConnexion();

    if(!empty($_POST['messageconv'])) {
        $message = $_POST['messageconv'];
        $idConv = $_POST['idConv'];

        $idCompteEmetteur = $_SESSION['idCompte'];

        //Récupérer le compte receveur
        $listMessage = Connexion::$bdd->prepare('SELECT * from MESSAGE where idConv=?');
        $array = array($idConv);
        $listMessage->execute($array);
        $list = $listMessage->fetchAll();
        $premierMess = array_shift($list);
        if($idCompteEmetteur == $premierMess['idCompte'])
            $idCompteReceveur =  $premierMess['idCompte_COMPTE'];
        else
            $idCompteReceveur = $premierMess['idCompte'];

        $pieceJointe = null;

        $insertMessagePrepare = Connexion::$bdd->prepare('INSERT into MESSAGE values(DEFAULT, ?, ?, ?, ?, ?)');
        $array = array($message, $pieceJointe, $idConv, $idCompteEmetteur, $idCompteReceveur);
        $insertMessagePrepare->execute($array);

    }
    else {
        echo "Il y a une erreur dans le remplissage du message";
    }
?>
