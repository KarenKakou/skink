<?php

require_once('connexion.php');
require_once('util.php');

class Modele_Modifier extends Connexion
{
    
    public function __construct()
    {

    }

    public function obtenirCompte($compte) {
        $selectCompte = $this::$bdd->prepare('SELECT * from COMPTE where idCompte=?');
        $array = array($compte);
        $selectCompte->execute($array);
        $resultCompte = $selectCompte->fetchAll();
        return $resultCompte[0];
    }

    public function updateAvatar($nomImage, $compte) {
        $updateAvatar = $this::$bdd->prepare('UPDATE COMPTE SET avatarCompte = ? where idCompte=?');
        $array = array($nomImage, $compte);
        $updateAvatar->execute($array);
	  }

    public function updateCompte($prenom, $nom, $telephone, $description, $compte) {
        $updateCompte = $this::$bdd->prepare('UPDATE COMPTE SET prenomCompte = ?, nomCompte = ?, telephoneCompte = ?, descriptionCompte = ? where idCompte=?');
        $array = array($prenom, $nom, $telephone, $description, $compte);
        $updateCompte->execute($array);
    }

}