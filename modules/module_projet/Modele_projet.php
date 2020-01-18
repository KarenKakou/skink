<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');


class Modele_projet extends Connexion
{
        public function __construct()
        {
        }

        public function listeDeComptePar($typeCompte) {

            switch ($typeCompte){
                case "Client" :
                    $idStatut = 1;
                    break;
                case "Tatoueur" :
                    $idStatut = 2;
                    break;
                case "Admin" :
                    $idStatut = 3;
                    break;
            }

            $listCompte = $this::$bdd->prepare('SELECT * from COMPTE where idStatut=?');
            $array = array($idStatut);
            $listCompte->execute($array);
            return $listCompte->fetchAll();
        }

        public function ajoutProjet($nomProjetNonSafe, $idClient, $idTatoueur, $descriptionProjetNonSafe, $montantProjet, $nbEcheance) {
            $nomProjet = htmlspecialchars($nomProjetNonSafe, ENT_QUOTES);
            $descriptionProjet = htmlspecialchars($descriptionProjetNonSafe, ENT_QUOTES);

           $insertProjet = $this::$bdd->prepare('INSERT into PROJET values(DEFAULT, ?, ?, ?, ?, ?, ?)');
           $array = array($nomProjet, $descriptionProjet, intval($montantProjet), intval($nbEcheance), 0, 0);
           if($insertProjet->execute($array)) {
               echo "Le projet $nomProjet a bien été enregistré";
               //Select idProjet
               $selectProjet = $this::$bdd->prepare('SELECT idProj from PROJET where nomProjet=?');
               $array=array($nomProjet);
               $selectProjet->execute($array);
               $resultProjet = $selectProjet->fetchAll();
               $projet = array_shift($resultProjet);
               $idProjet=$projet['idProj'];

               //Insertion dans Gerer
               $insertGererProjet = $this::$bdd->prepare('INSERT into GERER values(?, ?, ?)');
               $array = array($idClient, $idProjet, $idTatoueur);
               if($insertGererProjet->execute($array)) {
                   echo "Le projet est inséré avec succès, IdProjet = $idProjet";
               }
               else {
                   echo "Le projet n'a pas pu être inséré";
               }
           }
           else {
               echo "Il y a une erreur dans les données insérée dans le formulaire";
           }

        }
}