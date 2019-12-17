<?php

require_once "modules/acceuil/cont_accueil.php";

class ModAccueil {

	private $controleur;

	public function __construct(){
		//avec get, verifier sur quel page on veut être
		$this->controleur = new ContAccueil();
		$this->controleur->accueil();
	}

}


?>