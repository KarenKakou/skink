<?php

    class Vue_Galerie
    {
        public function __construct()
        {
        }

        public function afficherTatoueurGalerie($row) {
            $prenomTatoueur = $row['prenomCompte'];
            $nomTatoueur = $row['nomCompte'];
            echo "</br>Travaux de $prenomTatoueur $nomTatoueur</br>";
        }

        public function afficherTousTatoueursGalerie($array) {
            foreach ($array as $row) {
                $idTatoueur = $row['idCompte'];
                $prenomTatoueur = $row['prenomCompte'];
                $nomTatoueur = $row['nomCompte'];
                echo "</br><a href=\"index.php?module=galerie&action=voirGalerie&id=$idTatoueur\">$prenomTatoueur $nomTatoueur</a></br>";
            }
            
        }

        public function afficherImagesGalerie($array) {
            $i=0;
            foreach ($array as $row) 
            {
                $chemin = "images/images_galerie/".$row['cheminImage'];
                $idImage = $row['idImage'];
                $date = $row['dateAjoutImage'];
                echo "<a href=\"index.php?module=image&action=noAction&id=$idImage\"><img src=\"$chemin\"alt=\"modifiée le $date\"width=\"300\" height=\"300\"/></a>";
                //permet d'avoir un affichage sous forme de tableau (provisoir)
                if($i===2) {
                    echo "</br>";
                    $i=0;
                }
                $i++;
            }
        }

        public function afficherUpload($idTatoueur) {
            echo 
            "<form action=\"index.php?module=galerie&id=$idTatoueur&action=upload\" method=\"post\" 
            enctype=\"multipart/form-data\">
                <input type=\"file\" name=\"image\" >
                <input type=\"submit\" value=\"submit\">
            </form>";
        }
    }
?>