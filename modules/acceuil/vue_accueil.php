<?php

class VueAccueil {

	public function __construct (){
		include("composants/entete.php");
	}

	public function carousel(){
		?>
		    <section class="bg-secondary">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/tatoo1.png" class="d-block w-25" alt="..." >
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
    </section>

    <?php
	}

	public function carteTatoueur(){
		?>
		<div id="carte">
			<div class="row">
  				<div class="col-sm-4">
					<div class="card bg-secondary">
					  <div class="card-body">
					    <h5 class="card-title">DadyInk</h5>
					    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
					    <a href="#" class="btn btn-primary">Button</a>
					   </div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card bg-secondary">
					  <div class="card-body">
					    <h5 class="card-title">MotherInk</h5>
					    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
					    <a href="#" class="btn btn-primary">Button</a>
					  </div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card bg-secondary">
					  <div class="card-body">
					    <h5 class="card-title">Inkator</h5>
					    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
					    <a href="#" class="btn btn-primary">Button</a>
					  </div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}

	public function pied(){
		include("composants/pied.php");
	}

}


?>