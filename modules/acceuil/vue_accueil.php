<?php

class VueAccueil {

	public function __construct (){
		include("composants/entete.php");
	}

	public function carousel(){
		?>
		    <section class="bg-secondary">

	<div class="container">
  <div class="row">
    <div class="col-lg-5 center">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/ponney.svg" class="d-block w-25" alt="..." >
          </div>
          <div class="carousel-item">
            <img src="images/tatoo2.png" class="d-block w-25" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/tatoo3.png" class="d-block w-25" alt="...">
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
    </div>
</div>
    <div class="col-lg-5 center border">
    	<div class="">
    		<h1>Skink tatoo</h1>
      <span>
      	Skink tatouage - Salon de tatoueur tout style. On est bien venez les gars. Regardez la galleries des differents tatoueur, faite votre choix de tatoueur et prenez contacte avec lui pour vos projet tatouage.
      </span></div>

    </div>


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

	public function pied(){
		include("composants/pied.php");
	}

}


?>