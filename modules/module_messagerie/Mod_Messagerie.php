<?php

require_once ('modules/module_messagerie/Controleur_messagerie.php');

class Mod_Messagerie
{
    private $controleur;

    public function __construct()
    {
        $this->controleur= new Controleur_messagerie();
    }

    public function launchModMessagerie() {
        //Si pas de "actionMessagerie", error
        if (isset($_GET['actionMessagerie'])) {
            $actionMessagerie= $_GET['actionMessagerie'];
        } else {
            $actionMessagerie = 'errorMessagerie';
        }

        switch ($actionMessagerie) {
            case "DemarreDiscussion":
                $this->controleur->
                break;
        }
    }


}