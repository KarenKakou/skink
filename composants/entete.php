<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" /> 
    <link href="modules/acceuil/style.css" rel="stylesheet" type="text/css" /> 
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"/>

    <title>Skink</title> 

  </head>


  <body class="bg-secondary">
    <header>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> <!-- jQuery est inclus ! -->

<?php
  $idCompte = $_SESSION['idCompte']; 
  echo "

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
          </li>
          <li class='nav-item dropdown right'>
            <a class='nav-link dropdown-toggle' href='index.php?module=connexion' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              Mon espace <img src='images/compte.png' id='logoCompte'/>
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
            ";

            if(isset($_SESSION['Login'])){
              $login = $_SESSION['prenom'];
              echo "<span class='dropdown-item text-danger'>$login</span>";
            }

            echo "
              <a class='dropdown-item' href='#'>Messagerie</a>
              <a class='dropdown-item' href='index.php?module=rdv'>Mes rendez-vous</a>";
              if(isset($_SESSION['Statut'])) {
                if($_SESSION['Statut'] == 2) {
                  echo "<a class='dropdown-item' href='http://localhost/skink/index.php?module=paiement&action=tatoueur&id=$idCompte'>Suivre mes paiements</a>";
                }
                else {
                  echo "<a class='dropdown-item' href='http://localhost/skink/index.php?module=paiement&action=client&id=$idCompte'>Suivre mes paiements</a>";
                }
              }
              if(isset($_SESSION['Login'])) {
                echo "<div class='dropdown-divider'></div>
                <a class='dropdown-item' href='index.php?module=connexion'>Se déconnecter</a>";
              }
              else {
                echo "<div class='dropdown-divider'></div>
                <a class='dropdown-item' href='index.php?module=connexion'>Se connecter</a>";
              }
            echo "</div>
          </li>
        </ul>
      </div>
    </nav>";

?>

    </header>
    <section>