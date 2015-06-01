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
							<li><span>Baja California</span></li>
							<li><span>Baja California Sur</span></li>
							<li><span>Sonora</span></li>
							<li><span>Chihuahua</span></li>
							<li><span>Sinaloa</span></li>
							<li><span>Durango</span></li>
							<li><span>Nayarit</span></li>
							<li><span>Jalisco</span></li>
						</ol>
					</div>
					
					<div class="col-sm-4">
						<h3><i class="cir2"></i>Circunscripción 2</h3>
						<ol>
							<li><span>Coahuila</span></li>
							<li><span>Nuevo León</span></li>
							<li><span>Tamaulipas</span></li>
							<li><span>Zacatecas</span></li>
							<li><span>Aguscalientes</span></li>
							<li><span>San Luis Potosí</span></li>
							<li><span>Guanajuato</span></li>
							<li><span>Querétaro</span></li>
						</ol>
					</div>
					
					<div class="col-sm-4">
						<h3><i class="cir3"></i>Circunscripción 3</h3>
						<ol>
							<li><span>Veracruz</span></li>
							<li><span>Oaxaca</span></li>
							<li><span>Tabasco</span></li>
							<li><span>Chiapas</span></li>
							<li><span>Campeche</span></li>
							<li><span>Yucatán</span></li>
							<li><span>Quintana Roo</span></li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<h3><i class="cir4"></i>Circunscripción 4</h3>
						<ol>
							<li><span>Guerrero</span></li>
							<li><span>Morelos</span></li>
							<li><span>Distrito Federal</span></li>
							<li><span>Puebla</span></li>
							<li><span>Tlaxcala</span></li>
						</ol>
					</div>
					<div class="col-sm-4">
						<h3><i class="cir5"></i>Circunscripción 5</h3>
						<ol>
							<li><span>Guerrero</span></li>
							<li><span>Morelos</span></li>
							<li><span>Distrito Federal</span></li>
							<li><span>Puebla</span></li>
							<li><span>Tlaxcala</span></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div><!-- ends row-->
</section><!-- ends container-->
<?php	include "templates/footer.php";?>
