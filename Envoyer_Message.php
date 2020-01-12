<?php
session_start();
//require_once ('modules/module_messagerie/Modele_Messagerie.php');

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=skinkv3', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

//$modele = new Modele_Messagerie();

    if(!empty($_POST['messageconv'])) {
        $message = $_POST['messageconv'];
        $idConv = $_POST['idConv'];

        $idCompteEmetteur = $_SESSION['idCompte'];

        //Récupérer le compte receveur
        $listMessage = $bdd->prepare('SELECT * from MESSAGE where idConv=?');
        $array = array($idConv);
        $listMessage->execute($array);
        $list = $listMessage->fetchAll();
        $premierMess = array_shift($list);
        if($idCompteEmetteur == $premierMess['idCompte'])
            $idCompteReceveur =  $premierMess['idCompte_COMPTE'];
        else
            $idCompteReceveur = $premierMess['idCompte'];

        $pieceJointe = null;

        $insertMessagePrepare = $bdd->prepare('INSERT into MESSAGE values(DEFAULT, ?, ?, ?, ?, ?)');
        $array = array($message, $pieceJointe, $idConv, $idCompteEmetteur, $idCompteReceveur);
        $insertMessagePrepare->execute($array);

    }
    else {
        echo "Il y a une erreur dans le remplissage du message";
    }

