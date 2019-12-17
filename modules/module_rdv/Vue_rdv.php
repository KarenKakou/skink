<?php


class Vue_rdv
{

    public function __construct()
    {
    }

    public function formulaireRDV($listProjet) {
       echo "<form action =\"index.php?module=rdv&actionRDV=ajoutRDV\" method=\"POST\">
                <h1>Ajout d'un rendez-vous</h1>
                Choisissez une date : <input type='date' name='dateRDV' value='NOW()'> ";

        echo "                
                Choisissez un Projet : <select name='RDVProjet'>";
        foreach ($listProjet as $key => $value) {
            echo '<option value="'.$listProjet[$key]['idProj'].'">'.$listProjet[$key]['nomProjet'].'</option>';
        }

       echo "
                </select>
                Durée rendez-vous : <select name='tempsRDV'>
                <option value='30'>30min</option>
                <option value='60'>1h</option>
                <option value='90'>1h30</option>
                <option value='120'>2h</option>
                </select>
                
                Mode de Paiement : <select name='modePaiementRDV'>
                    <option>Espece</option>
                    <option>Carte</option>
                </select>
                
                <input type='submit' value='Valider le RDV'>
            </form>";
    }

}