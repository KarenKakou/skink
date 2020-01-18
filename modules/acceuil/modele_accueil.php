<?php

class ModeleAccueil extends Connexion{

	public function __construct(){
	}

	public function recupNomTatoueur(){
		$selectTatoo = $this::$bdd->prepare('SELECT idCompte, nomCompte, descriptionCompte, avatarCompte from COMPTE where idStatut=2');
		$array = array(1);
		$selectTatoo->execute($array);
		$result = $selectTatoo->fetchAll();
		return $result;
	}
}


?>