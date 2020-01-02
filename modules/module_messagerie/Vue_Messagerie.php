<?php


class Vue_Messagerie
{
    public function __construct()
    {

    }

    public function formCreationOuAccesConv() {
        echo "<form action =\"index.php?module=messagerie&actionMessagerie=accesConv\" method=\"POST\">
                    <input type='submit' value='Accéder à ses conversations'>
              </form>
              <form action =\"index.php?module=messagerie&actionMessagerie=formCreatConv\" method=\"POST\">
                    <input type='submit' value='Créer une nouvelle Conversation'>
              </form>";
    }

    public function formCreationConv($listTatoueur) {
        if (isset($_SESSION['Login'])) {
            if($_SESSION['Statut'] == 1) {
                echo "Client, nous allons pouvoir vous faire démarrer une discussion :";

                echo "<form action =\"index.php?module=messagerie&actionMessagerie=creatConv\" method=\"POST\">
                        Choisissez un Tatoueur : <select name='CompteTatoueurNewMessage'>";
                foreach ($listTatoueur as $key => $value) {
                    echo '<option value="'.$listTatoueur[$key]['idCompte'].'">'.$listTatoueur[$key]['prenomCompte'].' '.$listTatoueur[$key]['nomCompte'].'</option>';
                }
                echo "</select>

                       <input type='submit' value='Commencer une discussion avec ce tatoueur'>
                       </form>";

            } else {
                echo "Vous devez être client pour démarrer une discussion";
            }

        }else {
            echo "Vous n'êtes pas connecté, vous ne pouvez pas créer de conversation";
        }
    }

    public function choisirDiscussion($listConv) {
        echo " <form action =\"index.php?module=messagerie&actionMessagerie=lireConv\" method=\"POST\">
        Choisissez une conversation : <select name='idConvMessagerie'>";
        foreach ($listConv as $key => $value) {
            echo '<option value="'.$listConv[$key]['idConv'].'">'.$listConv[$key]['prenomCompte'].' '.$listConv[$key]['nomCompte'].'</option>';
        }
        echo "</select>
            <input type='submit' value='Commencer une discussion avec ce tatoueur'>
            </form>";
    }

    public function afficheMessages($listMessage, $idConv) {
        foreach ($listMessage as $key => $value) {
            if($listMessage[$key]['idCompte'] == $_SESSION['idCompte']){
                echo '<br/>Emetteur : <br/>'.$listMessage[$key]['corpsMessage'].'';
            }
            else {
                echo '<br/>Receveur : <br/>'.$listMessage[$key]['corpsMessage'].'';
            }
        }
        echo "<form action =\"index.php?module=messagerie&actionMessagerie=envoyerMessage&idConv=$idConv\" method=\"POST\">
              <textarea name='MessageConv' placeholder='Votre nouveau message'></textarea>
              <input type='submit' value='Envoyer message'>
              </form>";
    }
}