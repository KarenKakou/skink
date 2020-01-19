<?php

class VueAccueil {

	public function __construct (){
	}

	public function carousel(){
		echo" 
		    <section>
	       <div class=\"container-fluide\">
          <div id=\"carouselExampleIndicators\" class=\"carousel slide\" data-ride=\"carousel\">
            <div class=\"carousel-inner\">
              <div class=\"carousel-item active\">
                <img src=\"images/tatoo4.png\" class=\"d-block w-100\" alt=\"...\" >
              </div>
              <div class=\"carousel-item\">
                <img src=\"images/tatoo5.png\" class=\"d-block w-100 \" alt=\"...\">
              </div>
              <div class=\"carousel-item\">
                <img src=\"images/tatoo6.png\" class=\"d-block w-100\" alt=\"...\">
              </div>
            </div>
              <a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"prev\">
                <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                <span class=\"sr-only\">Previous</span>
              </a>
              <a class=\"carousel-control-next\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"next\">
                <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                <span class=\"sr-only\">Next</span>
              </a>
              <ol class=\"carousel-indicators descend\">
                <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>
                <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"1\"></li>
                <li data-target=\"#carouselExampleIndicators\" data-slide-to=\"2\"></li>
              </ol>
            <div class=\"center front\">
                <div class=\"center\">
                  <h1>Skink tatoo</h1>
                </div>
                <span><strong>
                  Skink tatouage - Salon de tatoueur tout style. Professionel du tatouage depuis 2004. <br/>Vous pouvez contacter nos tatoueur directement sur ce site et prendre rdv avec eux.</strong>
                </span>
                </div>
            </div>
          </div>
        </div>
    </section>";
	}



	public function carteTatoueur($nomTatoueur){
		echo "
    <div id=\"carte\" class=\"container-fluide\">
      <div class='container'>";
					for($i=0; $i<count($nomTatoueur); $i++){
            if($i%2==0){
              $this->droite($nomTatoueur[$i]['idCompte'], $nomTatoueur[$i]['nomCompte'], $nomTatoueur[$i]['descriptionCompte'], $nomTatoueur[$i]['avatarCompte']);
            }
            else{
              $this->gauche($nomTatoueur[$i]['idCompte'], $nomTatoueur[$i]['nomCompte'], $nomTatoueur[$i]['descriptionCompte'], $nomTatoueur[$i]['avatarCompte']);
            }
						
          }

	}

  private function droite($id, $nom, $description, $avatar){
    echo "
      <div class='row carteTatoueur'>
        <div class='col-8'>
          <h5>$nom</h5>
          <p class='card-text'>$description</p>
          <a href='index.php?module=galerie&action=voirGalerie&id=$id' class='btn btn-primary'>Voir ses création</a>
        </div>
        <div class='col-4'>
          <img src='images/images_avatar/$avatar' class='rounded-circle imageCarte' style=\"width: 200px;
      height: 200px;\"/>
        </div>
      </div>";
  }

  private function gauche($id, $nom, $description, $avatar){
    echo "
      <div class='row carteTatoueur'>
        <div class='col-4'>
          <img src='images/images_avatar/$avatar' class='rounded-circle imageCarte' style=\"width: 200px;
      height: 200px;\"/>
        </div>
        <div class='col-8'>
          <h5>$nom</h5>
          <p class='card-text'>$description</p>
          <a href='index.php?module=galerie&action=voirGalerie&id=$id' class='btn btn-primary'>Voir ses création</a>
        </div>
      </div>";
  }
}
?>