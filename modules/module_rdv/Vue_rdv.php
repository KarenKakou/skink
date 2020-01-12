<?php


class Vue_rdv
{

    public function __construct()
    {
    }

    public function formulaireRDV($listProjet) {
       echo "<form action =\"index.php?module=rdv&actionRDV=ajoutRDV\" method=\"POST\">
                <h1>Ajout d'un rendez-vous</h1>
                Choisissez une date : <input type='date' name='dateRDV' value='NOW()'>
                Heure du début du rendez-vous : <select name='heureDebRDV'>
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
                </select>";
        echo "                
                Choisissez un Projet : <select name='RDVProjet'>";
        foreach ($listProjet as $key => $value) {
            echo '<option value="'.$listProjet[$key]['idProj'].'">'.$listProjet[$key]['nomProjet'].' '.$listProjet[$key]['nomCompte'].' '.$listProjet[$key]['prenomCompte'].'</option>';
        }

       echo "
                </select>
                Durée rendez-vous : <select name='tempsRDV'>
                <option value='30'>30min</option>
                <option value='60'>1h</option>
                <option value='90'>1h30</option>
                <option value='120'>2h</option>
                </select>
                
                <input type='submit' value='Valider le RDV'>
            </form>";
    }

    public function afficheRdv(){
     
    }

    

}