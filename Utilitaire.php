
<?php 
class Utilitaire extends Connexion{ 
      
    public function obtenirTatoueur($tatoueur) {
        $selectTatoueur = $this::$bdd->prepare('SELECT * from COMPTE where idCompte=?');
        $array = array($tatoueur);
        $selectTatoueur->execute($array);
        $resultTatoueur = $selectTatoueur->fetchAll();
        return $resultTatoueur;
    }
} 
?> 
