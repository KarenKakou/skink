<?php

require_once ('modules/module_messagerie/Modele_Messagerie.php');
require_once ('modules/module_messagerie/Vue_Messagerie.php');

class Controleur_messagerie
{
    private $vueMessagerie;
    private $modeleMessagerie;

    public function __construct()
    {
        $this->vueMessagerie= new Vue_Messagerie();
        $this->modeleMessagerie= new Modele_Messagerie();
    }
}