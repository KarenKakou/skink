<?php
if(!defined('CONST_INCLUDE'))
    die('Error 282');

session_start();
require_once ('connexion.php');
require_once('lib/Token.php');

Connexion::initConnexion();

if(Token::createToken($_POST['token'])) {
    if (!empty($_POST['messageconv'])) {
        $message = $_POST['messageconv'];
        $idConv = $_POST['idConv'];

        $idCompteEmetteur = $_SESSION['idCompte'];

        //Récupérer le compte receveur
        $listMessage = Connexion::$bdd->prepare('SELECT * from MESSAGE where idConv=?');
        $array = array($idConv);
        $listMessage->execute($array);
        $list = $listMessage->fetchAll();
        $premierMess = array_shift($list);
        if ($idCompteEmetteur == $premierMess['idCompte'])
            $idCompteReceveur = $premierMess['idCompte_COMPTE'];
        else
            $idCompteReceveur = $premierMess['idCompte'];

        $pieceJointe = null;

        $insertMessagePrepare = Connexion::$bdd->prepare('INSERT into MESSAGE values(DEFAULT, ?, ?, ?, ?, ?)');
        $array = array($message, $pieceJointe, $idConv, $idCompteEmetteur, $idCompteReceveur);
        $insertMessagePrepare->execute($array);

    }

}
?>
