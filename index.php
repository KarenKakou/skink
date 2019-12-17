
<?php

require_once "connexion.php";
require_once "modules/acceuil/mod_accueil.php";

Connexion::initConnexion();

$module = "acceuil";

switch($module){

	case "connexion":
		break;
	
	case "inscription":
		break;

	case "gallerie":
		break;
	
	case "acceuil":
		$modAcceuil = new ModAccueil();
		break;

}



?>

