<?php

class ConnexionSkink {
    protected static $bdd;

    public static function initConnexion() {
        $dns = 'mysql:host=127.0.0.1:3308; dbname=skink';
        self::$bdd = new PDO($dns, 'root', '');
    }


}
?>