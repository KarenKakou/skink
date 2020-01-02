<?php

    class Vue_Paiement
    {
        public function __construct()
        {
        }

        public function afficherProjets($array) {
            foreach ($array as $row) {
                $idCompte = $row['idCompte'];
                $idProjet = $row['idProj'];
                $nomProjet = $row['nomProjet'];
                echo "</br>
                <a href=\"index.php?module=paiement&action=voirProjet&id=$idProjet\">$nomProjet</a>
                </br>";
            }
        }

        public function afficherProjet($projet) {
            $nomProjet = $projet['nomProjet'];
            $description = $projet['descriptionProjet'];
            $echeanceTotal = $projet['nbEcheancesTotales'];
            $echeancePayee = $projet['nbEcheancesPayees'];
            $arrhes = $projet['arrhesPayees'];
            echo "Nom du projet : $nomProjet</br>Description : $description</br>Nombre d'échéances payées : $echeancePayee/$echeanceTotal</br>Arrhes payées :";
            if($arrhes != 0) {
                echo "oui";
            }
            else {
                echo "non";
            }
            echo "</br>";
        }

        public function afficherClientProjet($projet) {
            $prenomClient = $projet['prenomCompte'];
            $nomClient = $projet['nomCompte'];
            $telClient = $projet['telephoneCompte'];
            echo "Client : $prenomClient $nomClient tel : $telClient
                </br>";
        }

        public function afficherTatoueurProjet($projet) {
            $prenomTatoueur = $projet['prenomCompte'];
            $nomTatoueur = $projet['nomCompte'];
            $telTatoueur = $projet['telephoneCompte'];
            echo "Tatoueur : $prenomTatoueur $nomTatoueur tel : $telTatoueur
                </br>";
        }

        public function afficherMajArrhes($projet) {
            echo "</br>
                <a href=\"index.php?module=paiement&action=majArrhes&id=$projet\">Paiement arrhes</a>
                </br>";
        }

        public function afficherIncrementerEcheances($projet) {
            echo "</br>
                <a href=\"index.php?module=paiement&action=incEcheances&id=$projet\">Incrémenter les echéances</a>
                </br>";
        }
    }
?>