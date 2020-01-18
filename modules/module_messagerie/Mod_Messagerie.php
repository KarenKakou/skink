<?php
if(!defined('CONST_INCLUDE'))
    die('Error 282');

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
            case "creerOuAcceder":
                break;

            case "formCreatConv":
                $this->controleur->formCreateConv();
                break;

            case "accesConv":
                $this->controleur->accessConv();
                break;

            case "creatConv":
                $this->controleur->createConv($_POST['CompteTatoueurNewMessage']);
                break;

            case "lireConv" :
                if(isset($_POST['idConvMessagerie']))
                    $idConv = $_POST['idConvMessagerie'];
                else
                    $idConv = null;

                $this->controleur->afficheConv($idConv);
                break;

            case "envoyerMessage":
                $this->controleur->envoyerMessage($_POST['MessageConv'], $_GET['idConv'], $_SESSION['idCompte']);
                break;
        }
    }


}