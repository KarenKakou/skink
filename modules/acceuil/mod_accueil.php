<?php

require_once "modules/acceuil/cont_accueil.php";

class ModAccueil {

	private $controleur;

	public function __construct(){
		$this->controleur = new ContAccueil();
		$this->controleur->accueil();
	}

}


?>