<?php

require_once('modules/module_projet/Modele_projet.php');

class Vue_projet
{
    public function __construct()
    {
    }

    public function formCreationProjet($listClient, $listTatoueur) {

        echo "
            <form action =\"index.php?module=projet&actionProjet=ajoutProjet\" method=\"POST\">
                <h1>Creation de Projet</h1>
                Nom du projet : <input type='text' name='NomProjet'>
                Choisissez un Client : <select name='CompteClientProjet'>";

                foreach ($listClient as $key => $value) {
                    echo '<option value="'.$listClient[$key]['idCompte'].'">'.$listClient[$key]['prenomCompte'].' '.$listClient[$key]['nomCompte'].'</option>';
                }
         echo "
                </select>
                
                Choisissez un Tatoueur : <select name='CompteTatoueurProjet'>";
                foreach ($listTatoueur as $key => $value) {
                    echo '<option value="'.$listTatoueur[$key]['idCompte'].'">'.$listTatoueur[$key]['prenomCompte'].' '.$listTatoueur[$key]['nomCompte'].'</option>';
                }
        echo "
                </select>
                Description Projet : <textarea name='DescriptionProjet'></textarea>
                Montant à payer : <input type='number' name='MontantProjet'>
                
                Nombre d'échéance : <select name='NbEcheanceProjet'>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>

                </select>
                <input type='submit' value='Valider Projet'>
            </form>";
    }
}