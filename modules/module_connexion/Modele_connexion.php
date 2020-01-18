<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');


require_once('connexion.php');

class Modele_connexion extends Connexion
{
    public function __construct()
    {
    }

    //Connect teste la connection et la permet si le login et le motDePasse correspond
    public function connect($emailNonSafe, $passwordNonSafe) {
        $email = htmlspecialchars($emailNonSafe, ENT_QUOTES);
        $password = htmlspecialchars($passwordNonSafe, ENT_QUOTES);

        $selectUser = $this::$bdd->prepare('SELECT * from COMPTE where emailCompte=?');
        $array = array($email);
        $selectUser->execute($array);
        $resultUser = $selectUser->fetchAll();
        $varUser= array_shift($resultUser);
        if(password_verify($password, $varUser['motDePasseCompte']))
        {
            $_SESSION['Login'] = $email;
            $_SESSION['prenom'] = $varUser['prenomCompte'];
            $_SESSION['Statut'] = $varUser['idStatut'];
            $_SESSION['idCompte'] = $varUser['idCompte'];
            $_SESSION['Avatar'] = $varUser['avatarCompte'];
            echo "Vous etes connecté $email !";
        }
        else
        {
            echo "Le mot de passe ou l'identifiant sont incorrects";
        }
    }

    //deconnect permet la deconnexion a la session
    public function deconnect() {
        if(isset($_SESSION['Login'])) {
            $log = $_SESSION['Login'];
            session_destroy();
            $_SESSION = [];
            echo "Vous êtes déconnecté $log";
        }else{
            echo "Vous n'êtes pas connecté";
        }
    }

    //Methode permettant d'ajouter un compte a la base de donnee / Statut est par défaut a 1 pour les clients
    public function ajoutCompte($nomNonSafe, $prenomNonSafe, $adresseNonSafe, $telephoneNonSafe, $emailNonSafe, $passwordNonSafe, $statut = 1) {
        $nom = htmlspecialchars($nomNonSafe, ENT_QUOTES);
        $prenom = htmlspecialchars($prenomNonSafe, ENT_QUOTES);
        $adresse = htmlspecialchars($adresseNonSafe, ENT_QUOTES);
        $telephone = htmlspecialchars($telephoneNonSafe, ENT_QUOTES);
        $email = htmlspecialchars($emailNonSafe, ENT_QUOTES);
        $password = htmlspecialchars($passwordNonSafe, ENT_QUOTES);

        //Verification que l'email n'existe pas déjà
        $selectUser = $this::$bdd->prepare('SELECT * from COMPTE where emailCompte=?');
        $array = array($email);
        $selectUser->execute($array);
        $resultUser = $selectUser->fetchAll();
        if(empty($resultUser)) {
            if ($this->verifEmail($email)) {
                $hashpassword = password_hash($password, PASSWORD_DEFAULT);

                switch ($statut) {
                    case 'Client':
                        $nbStatut = 1;
                        break;
                    case 'Tatoueur' :
                        $nbStatut = 2;
                        break;
                    case 'Admin':
                        $nbStatut = 3;
                        break;
                    default:
                        $nbStatut = 1;
                }
                $this::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                $insertPrepare = $this::$bdd->prepare('INSERT into COMPTE values(DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $array = array($nom, $prenom, $adresse, $telephone, $hashpassword, $email, NULL, NULL, $nbStatut);
                if ($insertPrepare->execute($array)) {
                    echo "L'utilisateur $nom $prenom a bien été enregistré au statut de $statut";
                } else {
                    // echo $this::$bdd->errorInfo();
                    echo "linsert na pas marché";
                }
            } else {
                echo "L'adresse email n'est pas valide";
            }
        }else {
            echo "<section>Cette adresse e-mail existe déjà</section>";
        }
    }

    //Method qui verifie si l'adresse mail contient un @
    private function verifEmail($emailNonSafe) {
        $email = htmlspecialchars($emailNonSafe, ENT_QUOTES);
        if(strpos($email, "@") === false) {
            return false;
        }else {
            return true;
        }
    }

    //Method qui permet de supprimer un compte
    public function deleteCompte($emailNonSafe) {
        $email = htmlspecialchars($emailNonSafe, ENT_QUOTES);
        $deleteUser = $this::$bdd->prepare('DELETE from COMPTE where emailCompte=?');
        $array = array($email);
        if ($deleteUser->execute($array)) {
            echo "L'utilisateur $email a bien été supprimé";
        } else {
            echo "Il y a eu un problème avec la suppression de $email";
        }
    }

}
?>
