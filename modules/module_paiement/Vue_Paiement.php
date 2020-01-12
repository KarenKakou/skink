<?php
    include("composants/entete.php");
    class Vue_Paiement
    {
        public function __construct()
        {
        }

        public function afficherAvancementPaiement($projet, $client, $tatoueur) {
            $idProjet = $projet['idProj'];
            $nomProjet = $projet['nomProjet'];
            $description = $projet['descriptionProjet'];
            $arrhes = $projet['arrhesPayees'];
            $prenomClient = $client['prenomCompte'];
            $nomClient = $client['nomCompte'];
            $telClient = $client['telephoneCompte'];
            $mailClient = $client['emailCompte'];
            $prenomTatoueur = $tatoueur['prenomCompte'];
            $nomTatoueur = $tatoueur['nomCompte'];
            $telTatoueur = $tatoueur['telephoneCompte'];
            $echeanceTotal = $projet['nbEcheancesTotales'];
            $echeancePayee = $projet['nbEcheancesPayees'];
            $pourcentage = 0;
            if($echeanceTotal!=0) {
                $pourcentage = intval(($echeancePayee/$echeanceTotal)*100);
            }
            echo "<section>
                <div class=\"container\">
                    <div class = \"row\">
                        <div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12\">
                            <div class=\"row\">
                                <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\" style=\"border-radius: 16px;\">
                                    <div class=\"well profile col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                                        <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center\">
                                        <h3 style=\"text-align:center;\"><strong id=\"user-name\">$nomProjet</strong></h5>
                                        <p style=\"text-align:center;font-size: smaller;\" id=\"user-frid\">projet n° $idProjet</p>
                                        <p style=\"text-align:center;font-size: smaller;overflow-wrap: break-word;\" id=\"email du client\">$mailClient</p>
                                        <p style=\"text-align:center;font-size: smaller;\"><strong>Status du paiement : 
                                            ";
                                            if($arrhes != 0 && $echeancePayee == $echeanceTotal) {
                                                echo "</strong><span class=\"tags1\" id=\"user-status\">Terminé</span></p>";
                                            }
                                            else {
                                                echo "</strong><span class=\"tags2\" id=\"user-status\">En cours</span></p>";
                                            }
                                        echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center\"></div>
                                        <p style=\"text-align:center;font-size: smaller;\"><strong>Description</strong></p>
                                        <p style=\"text-align:center;font-size: smaller;\" id=\"user-role\">$description</p>
                                        <div class=row>
                                            <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 divider text-center\"></div>
                                            <div class=\"col-lg-6\" style=\"text-align:center;overflow-wrap: break-word;\">
                                                </strong><span class=\"tags3\" id=\"user-status\">Tatoueur</span></p>
                                                <p style=\"text-align: center;\"><strong>$nomTatoueur $prenomTatoueur</strong></p>
                                                <p style=\"text-align: center;\">tel : $telTatoueur</p>          
                                            </div>
                                            <div class=\" col-lg-6\" style=\"text-align:center;overflow-wrap: break-word;\">               
                                                </strong><span class=\"tags4\" id=\"user-status\">Client</span></p>
                                                <p style=\"text-align: center;\"><strong>$nomClient $prenomClient</strong></p>
                                                <p style=\"text-align: center;\">tel : $telClient</p>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                            echo "</div>
                        <div class = \"col-md-8\">
                            <div class = row>
                                <div class=\"col-sm-6\">";
                                if($echeancePayee == $echeanceTotal) {
                                    echo "<div class=\"tile-progress tile-green\">";
                                }
                                else {
                                    echo "<div class=\"tile-progress tile-red\">";
                                }
                                    echo "<div class=\"tile-header\">
                                        <h4 style=\"text-align:center\";>Echéances</h4>
                                        <span>échéances payées : $echeancePayee/$echeanceTotal</span>
                                    </div>
                                    <div class=\"tile-progressbar\">
                                        <span data-fill=\"$pourcentage%\" style=\"width: $pourcentage%;\"></span>
                                    </div>
                                    <div class=\"tile-footer\">";
                                    if($_SESSION['Statut'] == 2) {
                                        echo "<a href=\"index.php?module=paiement&action=incEcheances&id=$idProjet\">
                                            <div class=\"alert alert-warning\">Incrémenter</div>
                                        </a>";
                                    }
                                echo " </div>
                            </div>
                        </div>
                        <div class=\"col-sm-6\">";
                            if($arrhes!=0) {
                                echo "<div class=\"tile-progress tile-green\">
                                <div class=\"tile-header\">
                                        <h4 style=\"text-align:center\";>Arrhes</h4>
                                        <span>Les arrhes ont été payées !</span>
                                    </div>";
                            }
                            
                            else {
                               echo "<div class=\"tile-progress tile-red\">
                                <div class=\"tile-header\">
                                        <h4 style=\"text-align:center\";>Arrhes</h4>
                                        <span>Les arrhes n'ont pas été payées !</span>
                                    </div>
                                    <div class=\"tile-footer\">
                                        <a href=\"index.php?module=paiement&action=majArrhes&id=$idProjet\">
                                            <div class=\"alert alert-warning\">Activer les arrhes pour ce client</div>
                                        </a>
                                    </div>";
                            }
                            echo "</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>";
        }

        public function afficherProjetsPaiement($array) {
            echo "
            <section>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"span5 col-lg-10 center\">
                        <table class=\"table table-striped table-condensed\">
                        <thead>
                            <tr>
                                <th>Nom du projet</th>";
                                if($_SESSION['Statut']==2) {
                                    echo "<th>Client</th>";
                                }
                                else {
                                    echo "<th>Tatoueur</th>";
                                }
                                echo "<th>Paiement</th>                                          
                            </tr>
                        </thead>   
                        <tbody>";
                        foreach ($array as $row) {
                            if ($_SESSION['Statut']==2) {
                                 $nomCompte = $row['nomCompte']." ".$row['prenomCompte'];
                            }
                            else {
                                $nomCompte = $row['nomCompteTatoueur']." ".$row['prenomCompteTatoueur'];
                            }
                            $nomProjet = $row['nomProjet'];
                            $idProjet = $row['idProj'];
                            $echeanceTotal = $row['nbEcheancesTotales'];
                            $echeancePayee = $row['nbEcheancesPayees'];
                            $arrhes = $row['arrhesPayees'];
                            echo "<tr>
                                <td>$nomProjet</td>
                                <td>$nomCompte</td>
                                <td>
                                    <a href=\"index.php?module=paiement&action=voirProjet&id=$idProjet\"></strong>";
                                    if($arrhes != 0 && $echeancePayee == $echeanceTotal) {
                                                echo "</strong><span class=\"tags1\" id=\"user-status\">Terminé</span></p>";
                                            }
                                            else {
                                                echo "</strong><span class=\"tags2\" id=\"user-status\">En cours</span></p>";
                                            }
                                echo"</td>                              
                            </tr>";
                        }                      
                        echo "</tbody>
                    </table>
                </div>
            </div>
        </div>
        </section>";
        }
    }
?>