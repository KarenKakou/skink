<?php

class Modele_Paiement extends Connexion {

        public function __construct()
        {
          $this::$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        }

        public function obtenirProjetsDeClient($compte) {
          $selectProjets = $this::$bdd->prepare('SELECT 
          idProj, nomProjet, arrhesPayees, nbEcheancesTotales, nbEcheancesPayees, 
          CLIENT.nomCompte as nomCompteClient, CLIENT.prenomCompte as prenomCompteClient, 
          TATOUEUR.nomCompte as nomCompteTatoueur, TATOUEUR.prenomCompte as prenomCompteTatoueur
          FROM PROJET NATURAL JOIN GERER 
          INNER JOIN COMPTE as CLIENT on GERER.idCompte = CLIENT.idCompte
          INNER JOIN COMPTE as TATOUEUR on GERER.idCompte_COMPTE = TATOUEUR.idCompte 
          WHERE CLIENT.idCompte = ?');

          $array = array($compte);
          $selectProjets->execute($array);
          $resultProjets = $selectProjets->fetchAll();
          //var_dump($this::$bdd->errorInfo());
          return $resultProjets;
        }

        public function obtenirProjetsDeTatoueur($compte) {
          $selectProjets = $this::$bdd->prepare('SELECT * FROM PROJET NATURAL JOIN GERER NATURAL JOIN COMPTE WHERE idCompte_COMPTE = ?');
          $array = array($compte);
          $selectProjets->execute($array);
          $resultProjets = $selectProjets->fetchAll();
          //var_dump($this::$bdd->errorInfo());
          return $resultProjets;
        }

        public function obtenirProjet($idProjet) {
          $selectProjet = $this::$bdd->prepare('SELECT * from PROJET NATURAL JOIN GERER NATURAL JOIN COMPTE where idProj = ?');
          $array = array($idProjet);
          $selectProjet->execute($array);
          $resultProjet = $selectProjet->fetchAll();
          //var_dump($this::$bdd->errorInfo());
          return $resultProjet;
        }

        public function obtenirTatoueurProjet($idProjet) {
          $selectTatoueur = $this::$bdd->prepare('SELECT * from PROJET NATURAL JOIN GERER INNER JOIN COMPTE on GERER.idCompte_COMPTE = COMPTE.idCompte where idProj = ?');
          $array = array($idProjet);
          $selectTatoueur->execute($array);
          $resultTatoueur = $selectTatoueur->fetchAll();
          //var_dump($this::$bdd->errorInfo());
          return $resultTatoueur;
        }

        //fonctions destinées au tatoueur
        public function majArrhes($idProjet) {
          $updateProjet = $this::$bdd->prepare('UPDATE PROJET SET arrhesPayees = 2 where idProj = ?');
          $array = array($idProjet);
          if($updateProjet->execute($array)) {
            echo "le projet à été mis à jour";
          }
          else {
            echo "problème lors de la mise à jour du projet";
          }
        }

        public function incrementerEcheances($projet) {
          $idProjet = $projet['idProj'];
          $nbEcheancesTotales = $projet['nbEcheancesTotales'];
          $nbEcheancesPayees = $projet['nbEcheancesPayees'];

          if($nbEcheancesPayees+1<=$nbEcheancesTotales) {
            $updateProjet = $this::$bdd->prepare('UPDATE PROJET SET nbEcheancesPayees = nbEcheancesPayees+1 where idProj = ?');
            $array = array($idProjet);
            if($updateProjet->execute($array)) {
              echo "le projet à été mis à jour";
            }
            else {
              echo "problème lors de la mise à jour du projet";
            }
          }
          else {
            echo "impossible d'incrémenter les échances";
          }
        }
  }
?>