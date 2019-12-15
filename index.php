
<?php
session_start();


require_once('connexion.php');
require_once('modules/module_connexion/mod_Connexion.php');
require_once("modules/acceuil/mod_accueil.php");
require_once('modules/module_galerie/Mod_Galerie.php');
require_once('modules/module_image/Mod_Image.php');

Connexion::initConnexion();

if(isset($_GET['module']))
	$module = $_GET['module'];
else
	$module = 'acceuil';

$moduleConnexion = new mod_Connexion();
$moduleGalerie = new Mod_Galerie();
$moduleImage = new Mod_Image();

switch($module){
	case "connexion":
		$moduleConnexion->launchModConnexion();
		break;
	
	case "inscription":
		//à voir mais va sans doute se retrouver inutile
		break;

	case "galerie":
		$moduleGalerie->launchModGalerie();
		break;

	case "image":
		$moduleImage->launchModImage();
		break;
	
	case "acceuil":
		$modAcceuil = new ModAccueil();
		break;

}
?>

