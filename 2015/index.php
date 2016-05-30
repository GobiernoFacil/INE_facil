<?php	
	$body_class 	= "el_home_15";
	$title 			= "INE Fácil, Elecciones Federales 2015";
	$description 	= "Conoce los candidatos de tu distrito y encuentra tu casilla para votar en las Elecciones Federales 2015.";
	$canonical		= "http://inefacil.com/";
	include  $_SERVER['DOCUMENT_ROOT']."/templates/header.php";?>

<section class="home">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Junio <strong>7</strong> <span>8am - 6pm</span></h2>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="row links">
					<div class="col-md-8 col-md-offset-2">
						<a class="hvr-bounce-to-right" href="/candidatos-diputados-federales-2015/">
							Conoce los Candidatos de tu distrito y encuentra tu casilla <strong>&gt;</strong>
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
			<div class="col-md-8 col-md-offset-2">
				<h2>¿Qué se elige en las <strong>Elecciones Federales 2015</strong>?</h2>
				<p class="lead"><strong>500 diputados federales</strong> que integrarán la <strong>LXIII Legislatura</strong> del Congreso de la Unión.</p>
				<div class="row">
					<div class="col-md-6">
						<p><i class="electos"></i> <strong>300</strong> electos por mayoría simple </p>
						<?php echo str_repeat('<i class="electos"></i>',300);?>
						
					</div>
					<div class="col-md-6">
						<p><i class="representacion"></i>  <strong>200</strong> por representación proporcional</p>
						<?php echo str_repeat('<i class="representacion"></i>',200);?>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-2">
				<div class="links">
					<a class="hvr-bounce-to-right" href="/diputados-por-estado-circunscripciones-electorales/">
						¿Cuántos Diputados federales se eligen por estado? <strong>&gt;</strong>
					</a>
				</div>
			</div>

			</div>
		</div>
	</div>
</section>

<section class="se_gasta">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>¿Cuánto dinero dimos los mexicanos a los partidos políticos en 2015?
				</h2>
				<p class="lead"><strong>$5,199 millones de pesos</strong></p>
				
				<div class="row">
					<p class="labels"><span><i class="perma"></i>Actividades Ordinarias Permanentes</span>
						<span><i class="gastos"></i>Gastos de Campaña</span>
						<span><i class="espec"> </i>Actividades Específicas</span>
					</p>
					<div class="col-md-3">
						<p class="lana">$3,909,545,803</p>
					</div>
					<div class="col-md-9">
						<div class="permanentes"></div>
					</div>
					<div class="col-md-3">
						<p class="lana">$1,172,863,740</p>
					</div>
					<div class="col-md-9">
						<div class="campaign"></div>
					</div>
					<div class="col-md-3">
						<p class="lana">$117,286,374</p>
					</div>
					<div class="col-md-9">
						<div class="especificas"></div>
					</div>
				</div>
								
				<div class="col-md-8 col-md-offset-2">
				<div class="links">
						<a class="hvr-bounce-to-right" href="http://gobiernofacil.com/herramientas/financiamiento-publico-partidos-politicos/">Financiamiento público de los partidos políticos en México
1997 - 2015<strong>&gt;</strong>
						</a>
				</div>
			</div>

			</div>
		</div>
	</div>
</section>

<?php	include  $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>
