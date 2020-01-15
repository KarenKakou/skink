<?php

    class Vue_Galerie
    {
        public function __construct()
        {
        }

        //affiche tous les tatoueurs
        public function afficherTousTatoueursGalerie($array) {
            ?>
                <div class="container bg-dark">
                    <div class="row">

            <?php

            foreach ($array as $row) {
                $idTatoueur = $row['idCompte'];
                $nomTatoueur = $row['nomCompte'];
                $avatar = $row['avatarCompte'];
                echo " 
                        <div class='col-12 col-md'>
                        <div class='card carteGalerie'>
                            </br><a href=\"index.php?module=galerie&action=voirGalerie&id=$idTatoueur\"><img src='images/$avatar' class='card-img-top'></img></a></br>
                            <div class='card-body'>
                                <a href='index.php?module=galerie&action=voirGalerie&id=$idTatoueur'><h5 class='card-text text-body'>$nomTatoueur</h5></a>
                            </div>
                        </div></div>";
            }
                ?>
                    </div>
                </div><?php
            
        }

        public function afficheGaleriePerso($tatoo, $img){

            $nomTatoueur = $tatoo[0]['nomCompte'];
            $avatar = $tatoo[0]['avatarCompte'];
            $idCompte = $tatoo[0]['idCompte'];
            $i=0;
            echo "
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-4 bg-dark'>
                            <img src='images/$avatar' class='rounded-circle' width='200'>
                            <h2>$nomTatoueur</h2>
                            <div class='logo'>
                                <a href=''><img src='images/logoFB.png' width='50' height='50'/></a>
                            </div>
                            <div class='logo'>
                                <a href=''><img src='images/logoInsta.png' width='50' height='50'/></a>
                            </div>";
                            if(isset($_SESSION['Login'])){
                                echo "
                            <input type='button' id=\"".$idCompte."\" onClick='redirectionConvTatoueur(this.id)' value='contacter $nomTatoueur'>";
                            }
                            else{
                                echo "
                            <input type='button' onClick='redirectionInscription()' value='contacter $nomTatoueur'>
                                ";
                            }
                        echo "    
                        </div>

                        <div class='col-md-8'>";
            foreach ($img as $row) 
            {
                $chemin = "images/images_galerie/".$row['cheminImage'];
                $idImage = $row['idImage'];
                $date = $row['dateAjoutImage'];
            
                if($i%2==0){
                    echo "
                            <div class='row'>
                            ";
                }
                echo "
                                <div class='col-lg imgGalerie'>
                                     <a href=\"index.php?module=image&action=noAction&id=$idImage\"><img src=\"$chemin\"alt=\"modifiée le $date\"width=\"250\" height=\"250\"/></a>
                                </div>
                ";
                if($i%2 != 0){
                    echo "</div>";
                }

                $i++;
            }

            echo "     </div>
                    </div>
                </div>";
            
            

        }

        public function afficherTatoueurGalerie($row) {
            $prenomTatoueur = $row['prenomCompte'];
            $nomTatoueur = $row['nomCompte'];
            echo "</br>Travaux de $nomTatoueur</br>";
        }

        public function afficherImagesGalerie($array) {
            $i=0;
            foreach ($array as $row) 
            {
                $chemin = "images/images_galerie/".$row['cheminImage'];
                $idImage = $row['idImage'];
                $date = $row['dateAjoutImage'];
                echo "<a href=\"index.php?module=galerie&action=voirImage&id=$idImage\"><img src=\"$chemin\"alt=\"modifiée le $date\"width=\"300\" height=\"300\"/></a>";
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

        public function afficherImage($image) {
            $chemin = "images/images_galerie/".$image['cheminImage'];
            $date = $image['dateAjoutImage'];
            echo "<img src=\"$chemin\"alt=\"modifiée le $date\"/>";
        }

        public function optionSuppression($image) {
            echo "</br><a href=\"index.php?module=galerie&action=supprimer&id=$image\">Supprimer cette image</a></br>";
        }
    }
?>