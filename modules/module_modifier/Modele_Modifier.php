<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');


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

    public function updateAvatar($nomImageNonSafe, $compte) {
        $nomImage = htmlspecialchars($nomImageNonSafe, ENT_QUOTES);
        $updateAvatar = $this::$bdd->prepare('UPDATE COMPTE SET avatarCompte = ? where idCompte=?');
        $_SESSION['Avatar'] = $nomImage;
        $array = array($nomImage, $compte);
        $updateAvatar->execute($array);
	  }

    public function updateCompte($prenomNonSafe, $nomNonSafe, $telephoneNonSafe, $descriptionNonSafe, $compte) {
        $prenom = htmlspecialchars($prenomNonSafe, ENT_QUOTES);
        $nom = htmlspecialchars($nomNonSafe, ENT_QUOTES);
        $telephone = htmlspecialchars($telephoneNonSafe, ENT_QUOTES);
        $description = htmlspecialchars($descriptionNonSafe, ENT_QUOTES);

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