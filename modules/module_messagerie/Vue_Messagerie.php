<?php


include_once ('modules/module_messagerie/Envoyer_Message.php');

class Vue_Messagerie
{
    public function __construct()
    {
        include('composants/entete.php');
    }

    public function formCreationOuAccesConv() {
        echo "<section>
              <form action =\"index.php?module=messagerie&actionMessagerie=accesConv\" method=\"POST\">
                    <button type='submit' class='btn btn-light'>Accéder à ses conversations</button>
              </form>
              <form action =\"index.php?module=messagerie&actionMessagerie=formCreatConv\" method=\"POST\">
                    <button type='submit' class='btn btn-light'>Créer une nouvelle Conversation</button>
              </form>
              </section>";
    }

    public function formCreationConv($listTatoueur) {
        if (isset($_SESSION['Login'])) {
            if($_SESSION['Statut'] == 1) {
                echo "
                <section>
                Client, nous allons pouvoir vous faire démarrer une discussion :";

                echo "<form action =\"index.php?module=messagerie&actionMessagerie=creatConv\" method=\"POST\">
                        Choisissez un Tatoueur : <select name='CompteTatoueurNewMessage' class='form-control'>";
                foreach ($listTatoueur as $key => $value) {
                    echo '<option value="'.$listTatoueur[$key]['idCompte'].'">'.$listTatoueur[$key]['prenomCompte'].' '.$listTatoueur[$key]['nomCompte'].'</option>';
                }
                echo "</select>

                       <button type='submit' class='btn btn-light'>Commencer une discussion avec ce tatoueur</button>
                       </form>
                       </section>";

            } else {
                echo "Vous devez être client pour démarrer une discussion";
            }

        }else {
            echo "Vous n'êtes pas connecté, vous ne pouvez pas créer de conversation";
        }
    }

    public function choisirDiscussion($listConv) {
        echo "<section>
            <form action =\"index.php?module=messagerie&actionMessagerie=lireConv\" method=\"POST\">
                Choisissez une conversation : <select name='idConvMessagerie' class='form-control'>";
        foreach ($listConv as $key => $value) {
            echo '<option value="'.$listConv[$key]['idConv'].'">'.$listConv[$key]['prenomCompte'].' '.$listConv[$key]['nomCompte'].'</option>';
        }
        echo "</select>
            <input type='submit' value='Continuer la conversation'>
            </form>
            </section>";
    }

    public function vue_AffichesMessages($listMessage, $idConv) {
        include("composants/entete.php");
        echo "<body>
                <section>
                    <div class=\"container\">
                    <h3 class=\" text-center\">Messaging</h3>
                    <div class=\"messaging\">
                          <div class=\"inbox_msg\">
                          
                            <div class=\"mesgs\">
                              <div class=\"msg_history\">";
        foreach ($listMessage as $key => $value) {
            if($listMessage[$key]['idCompte'] == $_SESSION['idCompte']){
                echo "<div class=\"outgoing_msg\">
                            <div class=\"sent_msg\">";
                                   if($listMessage[$key]['pieceJointeMessage'] != null) {
                                      echo "<img src=\"images/images_messagerie/".$listMessage[$key]['pieceJointeMessage']."\" alt=\"\"/>";
                                   }
                                echo "<p>".$listMessage[$key]['corpsMessage']."</p>
                            </div>
                       </div>";
            }
            else {

                echo "<div class=\"incoming_msg\">
                          <div class=\"incoming_msg_img\"> <img src=\"https://ptetutorials.com/images/user-profile.png\" alt=\"sunil\"> </div>
                          <div class=\"received_msg\">";
                            if($listMessage[$key]['pieceJointeMessage'] != null) {
                                echo "<img src=\"images/images_messagerie/".$listMessage[$key]['pieceJointeMessage']."\" alt=\"\"/>";
                            }
                           echo "<div class=\"received_withd_msg\">
                              <p>".$listMessage[$key]['corpsMessage']."</p>
                            </div>
                          </div>
                      </div>";
            }
        }
        echo "
          </div>
          <div class=\"type_msg\">
            <div class=\"input_msg_write\">
              <form action =\"modules/module_messagerie/Envoyer_Message.php\" method=\"POST\" enctype=\"multipart/form-data\">
                <input type=\"text\" name ='MessageConv' class=\"write_msg\" placeholder=\"Type a message\" /> 
                <input type=\"file\" name=\"MessageImage\" class='btn btn-light uploadButton'/>
                <button class=\"msg_send_btn\" type=\"submit\"><i class=\"fa fa-paper-plane-o\" aria-hidden=\"true\"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    </div>
    </section>
    </body>";
        include ("composants/pied.php");
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