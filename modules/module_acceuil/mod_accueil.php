<?php

require_once "modules/module_acceuil/cont_accueil.php";

class ModAccueil {

	private $controleur;

	public function __construct(){
		$this->controleur = new ContAccueil();
		$this->controleur->accueil();
	}

	public function getAffichage() {
		return $this->controleur->getAffichage();
	}

}


?>