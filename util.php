<?php

require_once('connexion.php');

class Util {

    public static function uploadImage($dir) {

    	$image_name=$_FILES['image']['name'];
    	$file_size =$_FILES['image']['size'];
      	$explode = explode('.',$_FILES['image']['name']);
    	$file_ext=strtolower(end($explode));
      
      	$extensions= array("jpeg","jpg","png");
      
      	if(in_array($file_ext,$extensions) === false){
        	$errors[]="extension non prise en charge";
      	}
      
      	if($file_size > 2097152){
        	$errors[]='fichier trop lourd (doit être inférieur à 2 MB)';
      	}

       	$temp = explode(".", $image_name);
       	$imagepath="images/$dir/".$image_name;

      	if(empty($errors)==true){
 			    move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
        	echo "image ajoutée";
      	}
      	else{
        	print_r($errors);
      	}
       	return $image_name;
	 }

	 public static function listeDeComptePar($typeCompte) {

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

        $listCompte = Connexion::$bdd->prepare('SELECT * from COMPTE where idStatut=?');
        $array = array($idStatut);
        $listCompte->execute($array);
        return $listCompte->fetchAll();
    }

}
?>