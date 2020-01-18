<?php
if(!defined('CONST_INCLUDE'))
    die('Error 282');

require_once "modules/acceuil/cont_accueil.php";

class ModAccueil {

	private $controleur;

	public function __construct(){
		$this->controleur = new ContAccueil();
		$this->controleur->accueil();
	}

}


?>