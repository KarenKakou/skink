<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');



class Vue_Messagerie
{
    public function __construct()
    {
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

    public function vue_AffichesMessages($listConversation, $listMessage, $idConv) {
        echo "
                <section id='vue_messagerie'>
                    <div class=\"container-fluid\">
                    <h3 class=\"text-center\">Conversation</h3>
                    <div class=\"messaging\">
                          <div class=\"inbox_msg\">
                            <div class=\"inbox_people\">
                              <div class=\"headind_srch\">
                                <div class=\"recent_heading\">
                                  <h4>Vos conversations</h4>
                                </div>
                              </div>
                              <div class=\"inbox_chat\">";
        foreach ($listConversation as $key => $value) {
            if($idConv == $listConversation[$key]['idConv']) {
                $active = "active_chat";
            }
            else {
                $active ="";
            }
            echo "
                <div id=\"".$listConversation[$key]['idConv']."\" onClick=\"redirectionConv(this.id)\" class=\"chat_list ".$active."\">
                        <div class=\"chat_people \">";
                          if($listConversation[$key]['avatarCompte']) {
                            echo "
                            <div class=\"chat_img\"> <img src=\"images/images_avatar/".$listConversation[$key]['avatarCompte']."\" alt=\"sunil\" style=\"width: 35px; height: 35px;\"></div>";
                          }
                          else {
                            echo "
                            <div class=\"chat_img\"> <img src=\"https://ptetutorials.com/images/user-profile.png\" alt=\"sunil\" style=\"width: 35px; height: 35px;\"> </div>";
                          }
                            
                            

                            echo "<div class=\"chat_ib\">
                                 <h5>".$listConversation[$key]['nomCompte']." ".$listConversation[$key]['prenomCompte']."</h5>
                            </div>
                        </div>
                  </div>";
        }
        echo "
                              </div>
                            </div>
                            <div class=\"mesgs\">
                              <div id='Messagerie' class=\"msg_history\">";
        foreach ($listMessage as $key => $value) {
            if($listMessage[$key]['idCompte'] == $_SESSION['idCompte']){
                            echo "<div class=\"outgoing_msg\">
                                        <div class=\"sent_msg\">";
                                   if($listMessage[$key]['pieceJointeMessage'] != null) {
                                      echo "<img src=\"images/images_messagerie/".$listMessage[$key]['pieceJointeMessage']."\" alt=\"\"/>";
                                   }
                                echo "    <p>".$listMessage[$key]['corpsMessage']."</p>
                                        </div>
                                  </div>";
            }
            else {

                            echo "<div class=\"incoming_msg\">";
                              if(isset($listConversation[$key]['avatarCompte'])) {
                                  echo "
                                    <div class=\"chat_img\"> <img src=\"images/images_avatar/".$listConversation[$key]['avatarCompte']."\" alt=\"sunil\" style=\"width: 45px; height: 45px;\"></div>";
                              }
                              else {
                                  echo "
                                    <div class=\"chat_img\"> <img src=\"https://ptetutorials.com/images/user-profile.png\" alt=\"sunil\" style=\"width: 45px; height: 45px;\"> </div>";
                                }

                                      echo "
                                      <div class=\"received_msg\">";
                            if($listMessage[$key]['pieceJointeMessage'] != null) {
                                echo "<img src=\"images/images_messagerie/".$listMessage[$key]['pieceJointeMessage']."\" alt=\"\"/>";
                            }
                           echo "        <div class=\"received_withd_msg\">
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
                                  <form action =\"Envoyer_Message.php\" id='formMessage' method=\"POST\" enctype=\"multipart/form-data\">
                                    <input type=\"text\" id='Message' name ='messageconv' class=\"write_msg\" placeholder=\"Votre message\" /> 
                                    <!-- <input type=\"file\" id='MessageImage' name=\"MessageImage\" class='btn btn-light uploadButton'/> -->
                                    <input type='hidden' id='idConv' value='".$idConv."'>
                                    <button class=\"msg_send_btn\" id='envoi' name='submit' type=\"submit\">Send</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </div>
                        </div>
                        
                        </section>";
        if($_SESSION['Statut'] == 2) {
            echo "
                        <button id='addFormProjet' class='btn btn-info'>Créer un projet à ce client</button>";
        }
        echo "
                        <script src='modules/module_messagerie/changeConv.js'></script>
                        <script type='text/javascript' src='modules/module_messagerie/MessageScript.js'></script>
                        <script src='modules/module_messagerie/addFormProjet.js'></script>
                        ";
    }
}