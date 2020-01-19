<?php

class Connexion {

    public static $bdd;

    public static function initConnexion() {
		$dns = 'mysql:host=localhost; dbname=skink';
		self::$bdd = new PDO($dns, 'root', '');
	}

}
?>