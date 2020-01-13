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
        if($_SESSION['Statut'] == 1) {
            $listConv = $this::$bdd->prepare('SELECT distinct idConv, nomCompte, prenomCompte from MESSAGE INNER JOIN COMPTE ON MESSAGE.idCompte_COMPTE = COMPTE.idCompte where MESSAGE.idCompte=?');
        }
        else {
            $listConv = $this::$bdd->prepare('SELECT distinct idConv, nomCompte, prenomCompte from MESSAGE INNER JOIN COMPTE using(idCompte) where idCompte_COMPTE=?');
        }
        $array = array($_SESSION['idCompte']);
        if(!$listConv->execute($array)) {
            echo "Il y a eu une erreur dans la première recherche de conversation";
        }
        return $listConv->fetchAll();
    }

    //permet de créer une nouvelle conversation entre la personne connecté et la personne desire (Et lui envoit un message de Nouvelle conversation
    public function newConversation($compteTatoueur) {
        $listConv = $this::$bdd->prepare('SELECT distinct idConv, COMPTE.idCompte, nomCompte, prenomCompte from MESSAGE INNER JOIN COMPTE ON MESSAGE.idCompte_COMPTE = COMPTE.idCompte where MESSAGE.idCompte=?');
        $array = array($compteTatoueur);
        $listConv->execute($array);
        $listConv->fetchAll();

        if(empty($listConv)) {
            $insertPrepare = $this::$bdd->prepare('INSERT into CONVERSATION values(DEFAULT)');
            if ($insertPrepare->execute()) {
                $idConv = $this::$bdd->lastInsertId();

                //Insérer le message "Nouvelle conversation"
                $this->nouveauMessage("Voici votre nouvelle conversation avec un tatoueur, écrivez lui votre idée de projet ou demandez lui des conseils !", $idConv, $_SESSION['idCompte'], $compteTatoueur);
                return $idConv;
            } else {
                echo "Il y a eu un problème avec la création de la conversation";
            }
        }
        else {
            echo "<section>Vous avez déjà une conversation avec cette personne</section>";
        }
    }

    //Methode permettant d'envoyer un nouveau message
    public function nouveauMessage($corps, $idConv, $idCompteEmetteur, $idCompteReceveur) {
        if(isset($_FILES['MessageImage'])) {
            $pieceJointe = $this->uploadImageMessagerie();
        }else {
            $pieceJointe = null;
        }
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

    public function uploadImageMessagerie() {

        $image_name=$_FILES['MessageImage']['name'];
        $file_size =$_FILES['MessageImage']['size'];
        $explode = explode('.',$_FILES['MessageImage']['name']);
        $file_ext=strtolower(end($explode));

        $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false){
                //s$errors[]="extension non prise en charge";
            }

            if($file_size > 2097152){
                $errors[]='fichier trop lourd (doit être inférieur à 2 MB)';
            }

            $temp = explode(".", $image_name);
            $imagepath="images/images_messagerie/".$image_name;

            if(empty($errors)==true){
                move_uploaded_file($_FILES["MessageImage"]["tmp_name"],$imagepath);
                echo "image ajoutée";
            }
            else{
            print_r($errors);
        }
        return $image_name;
    }
}