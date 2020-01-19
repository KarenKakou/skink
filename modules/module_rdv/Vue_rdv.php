<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');

require_once('lib/Token.php');
class Vue_rdv
{

    public function __construct()
    {
        echo "
        <div class='container pageRdv'>

            <div class='row'>
                <div class='col-md-3 bg-dark' id='blockBtnRdv'>
                    <div class='btnRdv'>
                        <button type='button' id=\"".$_SESSION['idCompte']."\" class='btn btn-primary btn-lg btn-block' onClick='redirectionAfficheRdv(this.id)'>Voir mes RDV</button><br/>";
                        if($_SESSION['Statut']==2){
                            echo "<button type='button' class='btn btn-primary btn-lg btn-block' onClick='redirectionFormRdv()'>Ajouter un rdv</button><br/>
                                <button type='button' class='btn btn-primary btn-lg btn-block' onClick='redirectionAjoutProjet()'>Ajouter un projet</button>";
                        }
                        else{
                            echo "<button type='button' class='btn btn-primary btn-lg btn-block' onClick='redirectionMessage()'>Modifier un rdv</button><br/>";
                        }
                        echo "
                    </div>
                </div>
                <div class='col-md-9' id='blockRdv'>
        ";
    }

    public function formulaireRDV($listProjet) {
       echo "
                <div class='mgAuto'>
                <form action =\"index.php?module=rdv&actionRDV=ajoutRDV\" method=\"POST\">
                <h1>Ajout d'un rendez-vous</h1>
                <div class='form-group'>
                    <label for='date'>Choisissez une date : </label>
                    <input type='date' name='dateRDV' value='NOW()' id='date'>
                </div>
                <div class='form-group'>
                    <label for='heure'>Heure du rendez-vous :</label>
                    <select name='heureDebRDV' id='heure'>
                    <option value='540'>9h</option>
                        <option value='570'>9h30</option>
                    <option value='600'>10h</option>
                        <option value='630'>10h30</option>
                    <option value='660'>11h</option>
                        <option value='690'>11h30</option>
                    <option value='840'>14h</option>
                        <option value='870'>14h30</option>
                    <option value='900'>15h</option>
                        <option value='930'>15h30</option>
                    <option value='960'>16h</option>
                        <option value='990'>16h30</option>
                    <option value='1020'>17h</option>
                        <option value='1050'>17h30</option>
                    <option value='1080'>18h</option>
                        <option value='1110'>18h30</option>
                    </select>
                </div>";
        echo "           
                <div class='form-group'>
                    <label for='projet'>Choisissez un Projet : </label>
                    <select name='RDVProjet'>
                ";
        foreach ($listProjet as $key => $value) {
            echo '<option value="'.$listProjet[$key]['idProj'].'">'.$listProjet[$key]['nomProjet'].' '.$listProjet[$key]['nomCompte'].' '.$listProjet[$key]['prenomCompte'].'</option>';
        }

       echo "
                    </select>
                </div>
                <div class='form-group'>
                    <label id='duree'>Durée rendez-vous : </label>
                    <select name='tempsRDV' id='duree'>
                    <option value='30'>30min</option>
                    <option value='60'>1h</option>
                    <option value='90'>1h30</option>
                    <option value='120'>2h</option>
                    <option value='150'>2h30</option>
                    <option value='180'>3h</option>
                    <option value='210'>3h30</option>
                    </select>
                </div>
                <input type='hidden' name='tokenRDV' value='".Token::createToken()."'>
                <input type='submit' value='Valider le RDV' class='btn btn-primary btn-lg btn-block'>
            </form>
            </div>
            </div>
        </div>";
    }

    public function afficheRdv($rdvs){

        foreach ($rdvs as $key => $value){
                $date = substr($value['debRdv'], 8,2)."/".substr($value['debRdv'], 5,2)."/".substr($value['debRdv'], 0,4);
                $heure = substr($value['debRdv'], 10,3);
                $min = substr($value['debRdv'], 14,2);

                if($_SESSION['Statut']==2){
                    $nom = $value['nomCompteClient']." ".$value['prenomCompte'];
                }
                else{
                    $nom = $value['nomCompteTatoueur'];
                }

                echo  "
                    <div class='container bg-light rdv'>
                        <h2>RDV</h2>
                        <span>vous avez rdv le : <strong>"; echo $date; echo "</strong> </span>
                        <span> à <strong>"; echo $heure; echo "H".$min."</strong></span>
                        <span>avec : <strong>"; echo $nom; echo "</strong> </span>
                    </div>
                ";
        }

        echo "</div>
            </div>
        </div>
        ";
    }

    

}