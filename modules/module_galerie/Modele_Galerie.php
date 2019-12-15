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

    public function insererImage($nomImage, $idCompte) {
		$insertImage = $this::$bdd->prepare('INSERT INTO IMAGE values (DEFAULT,?,now(),?)');
        $array = array($nomImage, $idCompte);
        $insertImage->execute($array);
	}

    public function uploadImage($tatoueur) {

    	$image_name=$_FILES['image']['name'];
    	$file_size =$_FILES['image']['size'];
    	$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      	$extensions= array("jpeg","jpg","png");
      
      	if(in_array($file_ext,$extensions)=== false){
        	$errors[]="extension non prise en charge";
      	}
      
      	if($file_size > 2097152){
        	$errors[]='fichier trop lourd (doit être inférieur à 2 MB)';
      	}

       	$temp = explode(".", $image_name);
       	$imagepath="images/".$image_name;

      	if(empty($errors)==true){
 			move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
        	echo "Success";
      	}
      	else{
        	print_r($errors);
      	}
       	return $image_name;
	}
}