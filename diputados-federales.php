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
			<div class="row viz">
				<div class="col-sm-8 col-sm-offset-2">
				<div id="graph"><p>hola</p></div>
				</div>
			</div>
		<div class="divider" data-text="Circunscripciones Electorales"></div>
			<h2>Mapa de las circunscripciones electorales de México</h2>
			<div class="row viz">
				<div class="col-sm-8 col-sm-offset-2">
				<div id="graph2">
					<?php	include "templates/mexico_map.php";?>
				</div>
				
				</div>
			</div>
			<div class="col-sm-8 col-sm-offset-2">
				<div class="row">
				

					<div class="col-sm-4">
						<h3><i class="cir1"></i>Circunscripción 1</h3>
						<ol>
							<li>Baja California</li>
							<li>Baja California Sur</li>
							<li>Sonora</li>
							<li>Chihuahua</li>
							<li>Sinaloa</li>
							<li>Durango</li>
							<li>Nayarit</li>
							<li>Jalisco</li>
						</ol>
					</div>
					
					<div class="col-sm-4">
						<h3><i class="cir2"></i>Circunscripción 2</h3>
						<ol>
							<li>Coahuila</li>
							<li>Nuevo León</li>
							<li>Tamaulipas</li>
							<li>Zacatecas</li>
							<li>Aguscalientes</li>
							<li>San Luis Potosí</li>
							<li>Guanajuato</li>
							<li>Querétaro</li>
						</ol>
					</div>
					
					<div class="col-sm-4">
						<h3><i class="cir3"></i>Circunscripción 3</h3>
						<ol>
							<li>Veracruz</li>
							<li>Oaxaca</li>
							<li>Tabasco</li>
							<li>Chiapas</li>
							<li>Campeche</li>
							<li>Yucatán</li>
							<li>Quintana Roo</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<h3><i class="cir4"></i>Circunscripción 4</h3>
						<ol>
							<li>Guerrero</li>
							<li>Morelos</li>
							<li>Distrito Federal</li>
							<li>Puebla</li>
							<li>Tlaxcala</li>
						</ol>
					</div>
					<div class="col-sm-4">
						<h3><i class="cir5"></i>Circunscripción 5</h3>
						<ol>
							<li>Guerrero</li>
							<li>Morelos</li>
							<li>Distrito Federal</li>
							<li>Puebla</li>
							<li>Tlaxcala</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div><!-- ends row-->
</section><!-- ends container-->
<?php	include "templates/footer.php";?>
