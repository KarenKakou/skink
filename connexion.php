<?php

class Connexion {
    protected static $bdd;

    public static function initConnexion() {
		$dns = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201638" ;
		$user = "dutinfopw201638";
		$password = "gagyqapu";
		self::$bdd = new PDO($dns, $user, $password);
	}


}
?>