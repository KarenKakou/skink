<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');


require_once('connexion.php');
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

    public function uploadImage() {

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
       	$imagepath="images/images_avatar/".$image_name;

      	if(empty($errors)==true){
 			    move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
        	echo "image ajoutée";
      	}
      	else{
        	print_r($errors);
      	}
       	return $image_name;
	   }


}