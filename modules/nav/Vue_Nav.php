<?php

class VueNav {
    public function __construct() {
    }

    public function afficherNav() {
            echo "
            <header>
            <!-- jQuery est inclus ! -->
              <script src=\"https://code.jquery.com/jquery-3.1.1.min.js\"></script> <!-- jQuery est inclus ! -->
              <script src=\"jquery.redirect.js\"></script>
              <script src=\"modules/module_messagerie/changeConv.js\"></script>
              <nav class='navbar navbar-expand-lg navbar-dark bg-dark fixed-top'>
                <a class='navbar-brand' href='index.php?module=acceuil'>Skink</a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                  <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarNav'>
                  <ul class='navbar-nav'>
                    <li class='nav-item'>
                      <a class='nav-link' href='index.php?module=acceuil'>Home<span class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='index.php?module=galerie'>Galeries</a>
                    </li>";
                  if(isset($_SESSION['Login'])){
                    $login = $_SESSION['prenom'];
                    $idCompte = $_SESSION['idCompte'];
                    echo "
                    <li class='nav-item dropdown right'>
                      <a class='nav-link dropdown-toggle' href='index.php?module=connexion' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Mon espace <img src='images/compte.png' id='logoCompte'/>
                      </a>
                      <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                      <span class='dropdown-item text-danger'>$login</span>
                      <a class='dropdown-item' href='index.php?module=messagerie&actionMessagerie=lireConv'>Messagerie</a>
                      <a class='dropdown-item'  id=\".$idCompte.\" onClick='redirectionAfficheRdv(this.id)'>Mes rendez-vous</a>
                      <a class='dropdown-item' href='index.php?module=paiement&action=tatoueur&id=$idCompte'>Suivre mes paiements</a>";
                      if($_SESSION['Statut'] == 2) {
                        echo "
                        <a class='dropdown-item' href='index.php?module=projet&actionProjet=formProjet'>Ajouter projet</a>
                                  ";
                      }
                      echo 
                        "<a class='dropdown-item' href='index.php?module=modifier&action=formulaire&id=$idCompte'>Modifier le profil</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='index.php?module=connexion&actionConnexion=deconnexion'>se deconnecter</a>
                      </div>
                    </li>";
                  }
                  else {
                    $idCompte = 0;
                    echo 
                    "<li class='nav-item'>
                      <a class='nav-link' href='index.php?module=connexion'>Se connecter</a>
                    </li>";
                  }
                    echo "
                  </ul>
                </div>
              </nav>
            </header>";
    }

  }

?>
  