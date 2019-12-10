
<?php
session_start();


require_once('connexion.php');
require_once('modules/module_connexion/mod_Connexion.php');
require_once("modules/acceuil/mod_accueil.php");


Connexion::initConnexion();

if(isset($_GET['module']))
	$module = $_GET['module'];
else
	$module = 'acceuil';

$moduleConnexion = new mod_Connexion();

switch($module){

	case "connexion":
		$moduleConnexion->launchModConnexion();
		break;
	
	case "inscription":
		//à voir mais va sans doute se retrouver inutile
		break;

	case "gallerie":
		break;
	
	case "acceuil":
		$modAcceuil = new ModAccueil();
		break;

}

?>

