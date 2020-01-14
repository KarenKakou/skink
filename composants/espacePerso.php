
<?php
echo "<div class="container bg-dark">

	<div class="row">
		<div class="col lg-4">
			<h1><a href="">Messages</a></h1>
		</div>
		<div class="col lg-4">
			<h1><a href="">Mes rendez-vous</a></h1>
		</div>
		<div class="col lg-4">";
		if(isset($_SESSION['Statut'])) {
			if($_SESSION['Statut'] == 2) {
				echo "<h1><a href=\"index.php?module=paiement&action=tatoueur&id=$_SESSION['idCompte']\">Suivre mes paiements</a></h1>";
			}
			else {
				echo "<h1><a href=\"index.php?module=paiement&action=client&id=$_SESSION['idCompte']\">Suivre mes paiements</a></h1>";
			}
		}
		echo "</div>
	</div>

</div>";
?>