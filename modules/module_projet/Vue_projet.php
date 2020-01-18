<?php

require_once('modules/module_projet/Modele_projet.php');

class Vue_projet
{
    public function __construct()
    {
    }

    public function formCreationProjet($listClient, $listTatoueur) {

        echo "
        <div class='container center'>
            <h1>Creation de Projet</h1>
            <form action =\"index.php?module=projet&actionProjet=ajoutProjet\" method=\"POST\">
            <div class='row'>
                <div class='col-md'>
                        <div class='form-group'>
                            <label for='nom'>Nom du projet :</label>
                            <input type='text' name='NomProjet' id='nom' class='form-control'>
                        </div>

                        <div class='form-group'>
                            <label for='description'>Description Projet : </label>
                            <textarea name='DescriptionProjet' id='description' class='form-control'></textarea>
                        </div>
                </div>

                <div class='col-md'>

                    <div class='form-group'>
                        <label for='client'>Choisissez un Client : </label>
                        <select name='CompteClientProjet' id='client' class='form-control'>";

                foreach ($listClient as $key => $value) {
                    echo '<option value="'.$listClient[$key]['idCompte'].'">'.$listClient[$key]['prenomCompte'].' '.$listClient[$key]['nomCompte'].'</option>';
                }
         echo "
                            </select>
                        </div>
                        
                        <div class='form-group'>
                            <label for='nomTatoo'> Choisissez un Tatoueur : </label>
                            <select name='CompteTatoueurProjet' id='nomTatoo' class='form-control'>";
                foreach ($listTatoueur as $key => $value) {
                    echo '<option value="'.$listTatoueur[$key]['idCompte'].'">'.$listTatoueur[$key]['prenomCompte'].' '.$listTatoueur[$key]['nomCompte'].'</option>';
                }
        echo "
                        </select>
                    </div>
                </div>
            </div>
            <div class='row borderTop'>
                <div class='col-md'>
                    <div class='form-group'>
                        <label id='montant'>Montant à payer : </label>
                        <input type='number' name='MontantProjet' id='montant'>
                    </div>
                </div>
                <div class='col-md'>
                    <div class='form-group'>
                        <label for='nbEcheance'>Nombre d'échéance : </label>
                        <select name='NbEcheanceProjet' id='nbEcheance'>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>

                        </select>
                    </div>    
                </div>        
            </div>
            <input type='submit' value='Valider Projet' class='btn btn-primary btn-lg btn-block'>
                </form>
            </div>";
    }
}