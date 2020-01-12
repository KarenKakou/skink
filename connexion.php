<?php

class Connexion {
    protected static $bdd;

    public static function initConnexion() {
    	//Connexion de ma maison
		$dns = 'mysql:host=localhost; dbname=skink';
		self::$bdd = new PDO($dns, 'root', '');
		
		/* connexion iut
		$dns = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201638" ;
		$user = "dutinfopw201638";
		$password = "gagyqapu";
		self::$bdd = new PDO($dns, $user, $password);*/
	}

}
?>