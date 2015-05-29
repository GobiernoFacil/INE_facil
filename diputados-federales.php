<?php	
	$body_class 	= "diputados";
	$title 			= "Diputados Federales elegidos por Estado y circunscripciones electorales de México";
	$description 	= "Total de diputados federales elegidos por Estado y mapa de las circunscripciones electorales de México.";
	include $_SERVER['DOCUMENT_ROOT']."/templates/header.php";?>

<section class="container">
	<div class="row">		
		<div class="divider" data-text="Diputados por Estado"></div>
		<div class="col-md-12">	
			<h1>Total de Diputados elegidos por Estado</h1>
			<p class="lead">Para conocer tus candidatos busca primero tu distrito</p>
			<div class="row viz">
				<div id="graph"><p>hola</p></div>
			</div>
		<div class="divider" data-text="Circunscripciones Electorales"></div>
			<h2>Mapa de las circunscripciones electorales de México</h2>
			<p class="lead">Para conocer tus candidatos busca primero tu distrito</p>
			<div class="row viz">
				<div id="graph2"></div>
			</div>
		</div>
	</div><!-- ends row-->
</section><!-- ends container-->
<?php	include "templates/footer.php";?>
