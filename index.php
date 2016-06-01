<?php	
	$body_class 	= "el_home";
	$title 			= "INE Fácil, Elecciones a Gobernadores 2016";
	$description 	= "Conoce los candidatos de tu distrito y encuentra tu casilla para votar en las Elecciones Federales 2015.";
	$canonical		= "http://inefacil.com/";
	include  $_SERVER['DOCUMENT_ROOT']."/templates/header.php";?>

<section class="home">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Junio <strong>5</strong> <span>8am - 6pm</span></h2>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="row links">
					<div class="col-md-8 col-md-offset-2">
					<!--	<a class="hvr-bounce-to-right" href="/candidatos-diputados-federales-2015/">
							Conoce los Candidatos de tu distrito y encuentra tu casilla <strong>&gt;</strong>
						</a>-->
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
				<h2>¿Qué se elige en las <strong>Elecciones 2016</strong>?</h2>
				<!--<p class="lead"><strong>12 gobernadores</strong>, 448 diputados, y 965 ayuntamientos.</p>-->
				<div class="row">
					<div class="col-md-12">
						<p><i class="electos"></i> <strong>12</strong> gobernadores </p>
						<?php echo str_repeat('<i class="electos"></i>',12);?>
						
					</div>
					<div class="col-md-12">
						<p><i class="electos"></i>  <strong>448</strong> diputados</p>
						<?php echo str_repeat('<i class="electos"></i>',448);?>
						<p></p>
					</div>
					<div class="col-md-12">
						<p><i class="electos"></i>  <strong>965</strong> ayuntamientos</p>
						<?php echo str_repeat('<i class="electos"></i>',965);?>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-2">
				<div class="links">
					<a class="hvr-bounce-to-right" href="/puebla/">
						Conoce a los candidatos a Gobernador en Puebla 2016 <strong>&gt;</strong>
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
				<h2>¿Cuánto dinero dimos los mexicanos a los partidos políticos en 2016?
				</h2>
				<p class="lead"><strong>$3,953 millones de pesos</strong></p>
				
				<div class="row">
					<p class="labels"><span><i class="perma"></i>Actividades Ordinarias Permanentes</span>
						<span><i class="espec"> </i>Actividades Específicas</span>
					</p>
					<div class="col-md-3">
						<p class="lana">$3,838,503,224</p>
					</div>
					<div class="col-md-9">
						<div class="permanentes" style="width: 97.01%"></div>
					</div>
					
					<div class="col-md-3">
						<p class="lana">$115,155,096</p>
					</div>
					<div class="col-md-9">
						<div class="especificas" style="width: 2.99%"></div>
					</div>
				</div>
								
				<div class="col-md-8 col-md-offset-2">
				<div class="links">
						<a class="hvr-bounce-to-right" href="http://gobiernofacil.com/herramientas/financiamiento-publico-partidos-politicos/">Financiamiento público de los partidos políticos en México
1997 - 2016<strong>&gt;</strong>
						</a>
				</div>
			</div>

			</div>
		</div>
	</div>
</section>

<?php	include  $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>
