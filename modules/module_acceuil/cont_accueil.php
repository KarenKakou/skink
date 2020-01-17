<?php

require_once "modules/module_acceuil/modele_accueil.php";
require_once "modules/module_acceuil/vue_accueil.php";

class ContAccueil{

	private $modele;
	private $vue;

	public function __construct (){
		$this->modele = new ModeleAccueil();
		$this->vue = new VueAccueil();
	}

	public function accueil(){
		$this->vue->carousel();
		$this->vue->carteTatoueur($this->modele->recupNomTatoueur());
	}

	public function getAffichage() {
		return $this->vue->getAffichage();
	}

}

?>