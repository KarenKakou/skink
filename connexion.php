<?php

class Connexion {
    protected static $bdd;

    public static function initConnexion() {
        $dns = 'mysql:host=127.0.0.1:3306; dbname=skinkv2';
        self::$bdd = new PDO($dns, 'root', '');
    }


}
?>