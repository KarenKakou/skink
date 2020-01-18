<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');

require_once('connexion.php');

class Modele_Galerie extends Connexion
{
    
    public function __construct()
    {
    }

    public function obtenirImages($tatoueur) {
        $selectImages = $this::$bdd->prepare('SELECT * from IMAGE where idCompte=?');
        $array = array($tatoueur);
        $selectImages->execute($array);
        $resultImages = $selectImages->fetchAll();
        return $resultImages;
    }

    public function obtenirTatoueur($tatoueur) {
        $selectTatoueur = $this::$bdd->prepare('SELECT * from COMPTE where idCompte=?');
        $array = array($tatoueur);
        $selectTatoueur->execute($array);
        $resultTatoueur = $selectTatoueur->fetchAll();
        return $resultTatoueur;
    }

    public function obtenirTousTatoueurs($statut) {
        $selectTatoueurs = $this::$bdd->prepare('SELECT * from COMPTE where idStatut=?');
        $array = array($statut);
        $selectTatoueurs->execute($array);
        $resultTatoueurs = $selectTatoueurs->fetchAll();
        return $resultTatoueurs;
    }

    public function insererImage($nomImageNonSafe, $idCompte) {
        $nomImage = htmlspecialchars($nomImageNonSafe, ENT_QUOTES);

		$insertImage = $this::$bdd->prepare('INSERT INTO IMAGE values (DEFAULT,?,now(),?)');
        $array = array($nomImage, $idCompte);
        $insertImage->execute($array);
	  }
      public function obtenirImage($image) {
        $selectImage = $this::$bdd->prepare('SELECT * from IMAGE where idImage=?');
        $array = array($image);
        $selectImage->execute($array);
        $resultImage = $selectImage->fetchAll();
        return $resultImage;
    }

    public function supprimerImage($image) {
        $deleteImage = $this::$bdd->prepare('DELETE from IMAGE where idImage=?');
        $array = array($image);
        if(!$deleteImage->execute($array)) {
            echo "une erreur est survenue lors de la suppression de l'image";
        }
        else {
            echo "image supprimée";
        }
    }
}