<?php
if(!defined('CONST_INCLUDE'))
    die('Acces direct interdit !');

require_once('lib/Token.php');

    class Vue_Galerie
    {
        public function __construct()
        {
        }

        //affiche tous les tatoueurs
        public function afficherTousTatoueursGalerie($array) {
            ?>

            <div class='container presentation'>

                <p>Vous pouvez consulter en ligne les créations de nos tatoueurs</br>
                N'hésitez pas à venir nous voir au shop pour tout renseignement !</br>
                Mais si vous n'aimez pas vous déplacer, contactez les tatoueurs qui vous intéressent.</p>

            </div>
            <div class="container presGaleries">
                  <div class="row">

            <?php

            foreach ($array as $row) {
                $idTatoueur = $row['idCompte'];
                $nomTatoueur = $row['nomCompte'];
                $avatar = $row['avatarCompte'];
                echo " 
                        <div class='col-12 col-md'>
                        <div class='card carteGalerie'>
                            </br><a href=\"index.php?module=galerie&action=voirGalerie&id=".$idTatoueur."\">

                            <img src='images/images_avatar/$avatar' width='200' height='200 ' class='rounded-circle'></a></br>
                            </a></br>
                            <div class='card-body'>
                                <a href='index.php?module=galerie&action=voirGalerie&id=".$idTatoueur."'><h5 class='card-text text-body'>$nomTatoueur</h5></a>
                            </div>
                        </div></div>";
            }
                ?>
                    </div>
                </div>
            </section><?php
            
        }

        public function afficheGaleriePerso($tatoo, $img){

            $nomTatoueur = $tatoo[0]['nomCompte'];
            $avatar = $tatoo[0]['avatarCompte'];
            $idCompte = $tatoo[0]['idCompte'];
            $description = $tatoo[0]['descriptionCompte'];
            $i=0;
            echo "
                <div class='container-fluide galeriePerso'>
                    <div class='row'>
                        <div class='col-md-3 well profile'>
                            <div class='logoDesc'>";
                                if($avatar) {
                                    echo "<img src='images/images_avatar/$avatar' style=\"width: 200px; height: 200px; border-radius: 50%\"></a></br>";
                                }
                                else {
                                    echo "<img src='images/compte.png' style=\"width: 200px; height: 200px; border-radius: 50%\"></a></br>";
                                }
                                echo"
                                <h2>$nomTatoueur</h2>
                                <div class='logo'>
                                    <a href=''><img src='images/logoFB.png' width='30' height='30'/></a>
                                </div>
                                <div class='logo'>
                                    <a href=''><img src='images/logoInstaSf.png' width='30' height='30'/></a>
                                </div>
                                <p></br>$description</p>
                            </div>
                            ";
                            if(isset($_SESSION['Login'])){
                                if($_SESSION['Statut'] == 1) {
                                    echo "<input type='button' id=\"" . $idCompte . "\" onClick='redirectionConvTatoueur(this.id)' value=\"Contacter " . $nomTatoueur . "\" class='btnCarteGalerie'>";
                                }
                            }
                            else{
                                echo "
                            <input type='button' onClick='redirectionInscription()' value='contacter $nomTatoueur' class='btnCarteGalerie'>
                                ";
                            }
                        echo "    
                        </div>

                        <div class='col-md-9'>
                            <div class='row blockImg'>";
            foreach ($img as $row) 
            {
                $chemin = "images/images_galerie/".$row['cheminImage'];
                $idImage = $row['idImage'];
                $date = $row['dateAjoutImage'];
                echo "
                                <div class='col-lg-4 imgGalerie'>";
                                if(isset($_SESSION['Login']) && $_SESSION['Statut']==2)

                                    echo "   <a href=\"index.php?module=galerie&action=voirImage&id=$idImage\"><img src=\"$chemin\" width='300' height='300'/></a>";
                                else{
                                    echo"<img src=\"$chemin\" width='300' height='300'/>";
                                }
                                echo "</div>
                ";
                $i++;
            }

            echo "     </div>
                    </div>
                </div>";
            
            

        }

        public function afficherUpload($idTatoueur) {
            echo
            "<form action=\"index.php?module=galerie&id=$idTatoueur&action=upload\" method=\"post\" 
            enctype=\"multipart/form-data\">
                <input type=\"file\" name=\"image\" >
                <input type='hidden' name='tokenImage' value='".Token::createToken()."'>
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