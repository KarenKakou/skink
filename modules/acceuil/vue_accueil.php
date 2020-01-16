<?php

class VueAccueil {

	public function __construct (){
	}

	public function carousel(){
		?>
		    <section class="bg-secondary">

	<div class="container-fluide">
 
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="images/tatoo4.png" class="d-block w-100" alt="..." >
                </div>
                <div class="carousel-item">
                  <img src="images/tatoo5.png" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                  <img src="images/tatoo6.png" class="d-block w-100" alt="...">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              <ol class="carousel-indicators descend">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
          </div>
    
          <div class="center front">
          	<div class="center">
          		<h1>Skink tatoo</h1>
            </div>
            <span><strong>
            	Skink tatouage - Salon de tatoueur tout style. Professionel du tatouage depuis 2004. <br/>Vous pouvez contacter nos tatoueur directement sur ce site et prendre rdv avec eux.</strong>
            </span>
          </div>

</div>

    </section>

    <?php
	}

	public function carteTatoueur($nomTatoueur){
		?>
  
		<div id="carte" class="container">
			<div class="row">

				<?php
					for($i=0; $i<count($nomTatoueur); $i++){
						?>
						<div class="col-lg">
							<div class="card bg-secondary">
							  <img src="images/dadyInk.png" alt="photo de dadyink" class="rounded-circle">
							  <div class="card-body">
							    <h5 class="card-title"><?php echo $nomTatoueur[$i]["nomCompte"];?></h5>
							    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							    <a href="index.php?module=galerie&action=voirGalerie&id=<?php echo $i+1; ?>" class="btn btn-primary">Voir ses créations</a>
							   </div>
							</div>
						</div>

					<?php } ?>

			</div>
    </div>

	<?php
	}

}


?>