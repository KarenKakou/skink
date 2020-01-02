<?php

    class Vue_Image
    {
        public function __construct()
        {
        }

        public function afficherImage($image) {
            $chemin = "images/images_galerie/".$image['cheminImage'];
            $date = $image['dateAjoutImage'];
            echo "<img src=\"$chemin\"alt=\"modifiée le $date\"/>";
        }

        public function optionSuppression($image) {
            echo "</br><a href=\"index.php?module=image&id=$image&action=supprimer\">Supprimer cette image</a></br>";
        }
    }
?>