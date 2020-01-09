<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=skinkv3', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['submit'])){
    if(!empty($_POST['MessageConv'])) {
        $message = mysqli_real_escape_string($_POST['MessageConv']);

            $idConv = 16;
            $idCompteEmetteur = $_SESSION['idCompte'];
            $idCompteReceveur = 6;

            if(isset($_FILES['MessageImage'])) {
                $pieceJointe = $this->uploadImageMessagerie();
            }else {
                $pieceJointe = null;
            }
            $insertMessagePrepare = $this::$bdd->prepare('INSERT into MESSAGE values(DEFAULT, ?, ?, ?, ?, ?)');
            $array = array($message, $pieceJointe, $idConv, $idCompteEmetteur, $idCompteReceveur);
            $insertMessagePrepare->execute($array);
    }
    else {
        echo "Il y a une erreur dans le remplissage du message";
    }
}
