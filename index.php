<?php	
	$body_class 	= "el_home";
	$title 			= "INE Fácil, Elecciones Federales 2015";
	$description 	= "Conoce los candidatos de tu distrito y encuentra tu casilla para votar en las Elecciones Federales 2015.";
	include "templates/header.php";?>

<section class="home">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Junio <strong>7</strong> <span>8am - 6pm</span></h2>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="row links">
					<div class="col-md-4 col-md-offset-2">
						<a class="hvr-bounce-to-right" href="/candidatos.php">Candidatos por distrito</a>
					</div>
					<div class="col-md-4">
						<a class="hvr-bounce-to-right" href="/casillas.php">Encuentra tu casilla</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php	include "templates/footer.php";?>
