<?php	
	$body_class 	= "el_home";
	$title 			= "INE Fácil, Elecciones Federales 2015";
	$description 	= "Conoce los candidatos de tu distrito y encuentra tu casilla para votar en las Elecciones Federales 2015.";
	include $_SERVER['DOCUMENT_ROOT']."/templates/header.php";?>

<section class="home">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Junio <strong>7</strong> <span>8am - 6pm</span></h2>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="row links">
					<div class="col-md-8 col-md-offset-2">
						<a class="hvr-bounce-to-right" href="/candidatos.php">Conoce los Candidatos de tu distrito
							y encuentra tu casilla <strong>&gt;</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="se_vota">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>¿Qué se elige en las Elecciones Federales 2015?</h2>
				<p>Se eligen los 500 diputados federales que integrarán la LXIII Legislatura del Congreso de la Unión</p>
				<p>300 diputados serán electos por mayoría simple en cada uno de los distritos electorales en que se divide el país y los 200 	
					restantes mediante el principio de representación proporcional.</p>
			</div>
		</div>
	</div>
</section>

<?php	include $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>
