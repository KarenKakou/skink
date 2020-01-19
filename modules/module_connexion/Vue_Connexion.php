<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');


require_once('lib/Token.php');

    class   Vue_Connexion
    {
        public function __construct()
        {
        }

        public function form_Connexion_Inscription() {
            $idToken = Token::createToken();
            echo"
            <div class='container bg-dark' id='inscription'>
                <div class='row'>
                    <div class='col-10 col-md-6 padcenter'>
                        <form action =\"index.php?module=connexion&actionConnexion=connexion\" method=\"POST\">
                            <h1>Déjà inscrit</h1>
                            <div class='form-group'>
                                <label for='email'>Entrez votre identifiant (e-mail)</label> 
                                <input type='text' name='identifiantConnexion' id='email' class='form-control deuxTiers'>
                            </div>
                            <div class='form-group'>
                                <label for='mdp'>Entrez votre MotDePasse</label>
                                <input type='password' name='MotDePasseConnexion' id='mdp' class='form-control deuxTiers'>
                            </div>
                            <input type='hidden' name='tokenConnexion' value='".$idToken."'>
                            <input type='submit' value='Se connecter' class='btn btn-light'>
                        </form>
                    </div>
                    <div class='col-10 col-md-6 padcenter'>
                        <form action =\"index.php?module=connexion&actionConnexion=ajoutInscription\" method=\"POST\">
                            <h1>Pas encore de compte ?</h1>
                            <div class='form-group'>
                                <label for='nom'>Entrez votre nom* </label> 
                                <input type='text' name='nomInscription' id='nom' class='form-control deuxTiers'>
                            </div>
                            <div class='form-group'>
                                <label for='prenom'>Entrez votre prenom* </label> 
                                <input type='text' name='prenomInscription' id='prenom' class='form-control deuxTiers'>
                            </div>
                            <div class='form-group'>
                                <label for='adresse'>Adresse</label> 
                                <input type='text' name='adresseInscription' id='adresse' class='form-control deuxTiers'>
                            </div> 
                            <div class='form-group'>
                                <label for='tel'>Telephone*</label> 
                                <input type='text' name='telephoneInscription' id='tel' class='form-control deuxTiers'>
                            </div>
                            <div class='form-group'>
                                <label for='mail'>Email*</label>
                                <input type='text' name='emailInscription' id='mail' class='form-control deuxTiers'>
                            </div>
                            <div class='form-group'>
                                <label for='mdp'>Mot de passe* </label>
                                <input type='password' name='motDePasseInscription' id='mdp' class='form-control deuxTiers'>
                            </div>
                            <input type='hidden' name='tokenInscription' value='".$idToken."'>
                            <input type='submit' value='Valider inscription' class='btn btn-light'>
                        </form>
                     </div>
                </div>
            </div>";
        }

        public function form_InscriptionClient() {
            echo"
            <div class='container bg-dark'>
            <form action =\"index.php?module=connexion&actionConnexion=ajoutInscription\" method=\"POST\">
                <h1>Creation de compte</h1>
                Entrez votre nom : <input type='text' name='nomInscription'>
                Entrez votre prenom : <input type='text' name='prenomInscription'>
                Adresse (Non obligatoire) : <input type='text' name='adresseInscription'>
                Telepone (Non obligatoire) : <input type='text' name='telephoneInscription'>
                Email (Obligatoire) : <input type='text' name='emailInscription'>
                Mot de passe : <input type='password' name='motDePasseInscription'>
                <input type='submit' value='Valider inscription'>
            </form>
            </div>";
        }

        public function form_InscriptionParAdmin() {
            echo"
            <div class='container bg-dark'>
            <form action =\"index.php?module=connexion&actionConnexion=ajoutInscriptionAdmin\" method=\"POST\">
                <h1>Creation de compte par Admin</h1>
                Entrez le nom : <input type='text' name='nomInscriptionAdmin'>
                Entrez le prenom : <input type='text' name='prenomInscriptionAdmin'>
                Adresse (Non obligatoire) : <input type='text' name='adresseInscriptionAdmin'>
                Telepone (Non obligatoire) : <input type='text' name='telephoneInscriptionAdmin'>
                Email (Non obligatoire) : <input type='text' name='emailInscriptionAdmin'>
                Mot de passe : <input type='password' name='motDePasseInscriptionAdmin'>
                Statut : <select name='statutInscriptionAdmin' size='1'>
                                <option>Client</option>
                                <option>Tatoueur</option>
                                <option>Admin</option>
                        </select> 
                <input type='hidden' name='tokenInscription' value='".Token::createToken()."'>
                <input type='submit' value='Valider inscription'>
            </form>
            </div>";
        }

    }
?>