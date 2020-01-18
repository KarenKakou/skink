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

    public function nombreProjetsEnCours($idCompte) {
          $count = $this::$bdd->prepare('SELECT count(*)
          FROM PROJET NATURAL JOIN GERER 
          INNER JOIN COMPTE as CLIENT on GERER.idCompte = CLIENT.idCompte
          INNER JOIN COMPTE as TATOUEUR on GERER.idCompte_COMPTE = TATOUEUR.idCompte 
          WHERE (CLIENT.idCompte = ? or TATOUEUR.idCompte = ?) and (arrhesPayees = 1 or nbEcheancesPayees != nbEcheancesTotales)');
          $array = array($idCompte, $idCompte);
          $count->execute($array);
          $resultCount = $count->fetchAll();
          return $resultCount[0];
    }

    public function nombreProjetsTermines($idCompte) {
        $count = $this::$bdd->prepare('SELECT count(*)
          FROM PROJET NATURAL JOIN GERER 
          INNER JOIN COMPTE as CLIENT on GERER.idCompte = CLIENT.idCompte
          INNER JOIN COMPTE as TATOUEUR on GERER.idCompte_COMPTE = TATOUEUR.idCompte 
          WHERE (CLIENT.idCompte = ? or TATOUEUR.idCompte = ?) and (arrhesPayees != 1 and nbEcheancesPayees = nbEcheancesTotales)');
          $array = array($idCompte, $idCompte);
          $count->execute($array);
          $resultCount = $count->fetchAll();
          return $resultCount[0];
    }

}