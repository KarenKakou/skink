<?php

require_once "modules/acceuil/modele_accueil.php";
require_once "modules/acceuil/vue_accueil.php";

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
		$this->vue->pied();
	}

}

?>