<?php

class Connexion {
    protected static $bdd;

    public static function initConnexion() {
		$dns = 'mysql:host=localhost; dbname=skinkv2';
		self::$bdd = new PDO($dns, 'root', '');
	}


}
?>