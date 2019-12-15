<?php


class Modele_Image extends Connexion
{
    
    public function __construct()
    {
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
        //var_dump($array);
        if(!$deleteImage->execute($array)) {
            echo "une erreur est survenue lors de la suppression de l'image";
        }
        else {
            echo "image supprimée";
        }
    }

    public function uploaderImage() {

    }
}