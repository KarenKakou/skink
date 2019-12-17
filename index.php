
<?php
session_start();


require_once('connexion.php');
require_once('modules/module_connexion/mod_Connexion.php');
require_once ('modules/module_rdv/mod_rdv.php');
require_once ('modules/module_projet/mod_projet.php');
require_once("modules/acceuil/mod_accueil.php");
require_once('modules/module_galerie/Mod_Galerie.php');
require_once('modules/module_image/Mod_Image.php');

Connexion::initConnexion();

if(isset($_GET['module']))
	$module = $_GET['module'];
else
	$module = 'acceuil';

$moduleALancer = new mod_Connexion();
$moduleConnexion = new mod_Connexion();
$moduleGalerie = new Mod_Galerie();
$moduleImage = new Mod_Image();

switch($module){
	case "connexion":
		$moduleALancer = new mod_Connexion();
		$moduleALancer->launchModConnexion();
		break;
	
	case "inscription":
		//à voir mais va sans doute se retrouver inutile
		break;

	case "projet":
		$moduleALancer = new mod_projet();
		$moduleALancer->launchModProjet();
		break;

	case "rdv" :
		$moduleALancer = new mod_rdv();
		$moduleALancer->launchModRdv();
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

