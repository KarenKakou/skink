<?php


    class Vue_Connexion
    {
        public function __construct()
        {
        }

        public function form_Connexion() {
            echo"
            <form action =\"index.php?module=connexion&actionConnexion=connexion\" method=\"POST\">
                <h1>Connexion a SKINK</h1>
                Entrez votre identifiant (e-mail) : <input type='text' name='identifiantConnexion'>
                Entrez votre MotDePasse : <input type='password' name='MotDePasseConnexion'>
                <input type='submit' value='Se connecter'>
            </form>";
        }

        public function form_InscriptionClient() {
            echo"
            <form action =\"index.php?module=connexion&actionConnexion=ajoutInscription\" method=\"POST\">
                <h1>Creation de compte</h1>
                Entrez votre nom : <input type='text' name='nomInscription'>
                Entrez votre prenom : <input type='text' name='prenomInscription'>
                Adresse (Non obligatoire) : <input type='text' name='adresseInscription'>
                Telepone (Non obligatoire) : <input type='text' name='telephoneInscription'>
                Email (Obligatoire) : <input type='text' name='emailInscription'>
                Mot de passe : <input type='password' name='motDePasseInscription'>
                <input type='submit' value='Valider inscription'>
            </form>";
        }

        public function form_InscriptionParAdmin() {
            echo"
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
                <input type='submit' value='Valider inscription'>
            </form>";
        }
    }