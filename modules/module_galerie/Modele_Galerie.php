<?php

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

    public function insererImage($nomImage, $idCompte) {
		$insertImage = $this::$bdd->prepare('INSERT INTO IMAGE values (DEFAULT,?,now(),?)');
        $array = array($nomImage, $idCompte);
        $insertImage->execute($array);
	  }

    public function uploadImage($tatoueur) {

    	$image_name=$_FILES['image']['name'];
    	$file_size =$_FILES['image']['size'];
      $explode = explode('.',$_FILES['image']['name']);
    	$file_ext=strtolower(end($explode));
      
      	$extensions= array("jpeg","jpg","png");
      
      	if(in_array($file_ext,$extensions)=== false){
        	$errors[]="extension non prise en charge";
      	}
      
      	if($file_size > 2097152){
        	$errors[]='fichier trop lourd (doit être inférieur à 2 MB)';
      	}

       	$temp = explode(".", $image_name);
       	$imagepath="images/images_galerie/".$image_name;

      	if(empty($errors)==true){
 			    move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
        	echo "image ajoutée";
      	}
      	else{
        	print_r($errors);
      	}
       	return $image_name;
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
}