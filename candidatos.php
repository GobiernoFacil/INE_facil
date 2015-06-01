<?php	
	$body_class 	= "candidatos";
	$title 			= "Candidatos a Elecciones Federales 2015";
	$description 	= "Conoce los candidatos de tu distrito.";
	include $_SERVER['DOCUMENT_ROOT']."/templates/header.php";?>
	<!-- THE HTML TEMPLATES -->
	<!-- CANDIDATE TEMPLATE -->
	<script id="template-candidate" type="text/x-handlebars-template">
    <li class="col-xs-4 col-sm-3">
      <div data-index="{{_index}}">
        <figure><img src="{{foto}}"></img>
        	<b>+ información</b>
        </figure>
        <h2>{{nombre}}</h2>
        <p class="partidin {{#each partidos}} {{this}} {{/each}}">{{partidos}}</p>
      </div>
    </li>
	</script>
	<!-- LOCATION TEMPLATE -->
	<script id="template-location" type="text/x-handlebars-template">
    	<p><span class="label">{{cargo}}:</span> {{nombre}} {{apellidos}} </p>
	</script>
	<!-- TITLE TEMPLATE -->
	<script id="template-title" type="text/x-handlebars-template">
	  02. Conoce los candidatos del 
	  <strong>Distrito {{district}}</strong>.
	  <span>{{city}}, {{state}}</span>
	</script>
<section class="container">
	<div class="row">		
		<!-- Inica la conlaboración con don pato. -->
		<div id="main">
			<div class="divider" data-text="Candidatos y Casillas"></div>
			<div class="col-md-12">	
				<h2 class="live">01. Busca tu distrito</h2>
				<p class="lead">Para conocer tus candidatos proporciona una ubicación:</p>
				
				<!-- [ el selector de distrito ]  -->
				<!-- Esta información se carga de un para de CSVs -->
				<section id="district-selector-container">
					<div class="row">
					<div class="col-sm-6 ubica">
						<h3 class="ubica">Ubicación Actual</h3>
						<a class="location">Utiliza tu ubicación actual</a>
					</div>
					<div class="col-sm-6 ubica">
				  <form>
					  <h3 class="ubica">O busca por municipio</h3>
				    <p>
				     <!-- <label>Selecciona tu estado:</label>-->
				      <select name="state"></select>
				    </p>
				    <p>
				    <!--  <label>Selecciona tu municipio:</label>-->
				      <select name="city"></select>
				    </p>
				  </form>
				  </div>
				    </div>
				    <!-- el mapa del distrito -->
				  <div id="district-map-container">
				  	<div class="map"></div>
				  </div>
				  
				</section>
				
			</div>

			
			
			<div class="col-md-12">
				<!-- los candidatos a mantenidos del distrito -->
				<section id="district-candidates-container">
				    <h2>02. Conoce a los candidatos</h2>
				    <ul class="row diputables"></ul>
				</section>
				<!-- la información del distrito -->
				<section id="district-data-container"></section>
				
				<!-- la información de las ciudades del distrito -->
				<section id="cities-data-container"></section>
				
				<!-- la sección de la radiografía electoral del distrito -->
				<section id="election-data-container"></section>
								
				<!-- la información de la casilla seleccionada -->
				<section class="casilla">
					 <h2>03. Ubica tu casilla</h2>
					 <!-- el mapa de las casillas -->
					 <div id="city-map-container">
					 	<div class="map"></div>
					 </div>
					 <!-- la información de la casilla seleccionada -->
					 <div class="row las_casillas">
					 	<div id="locations-map-container"></div>
					 </div>
				</section>
			</div>
		</div>	<!-- ends main-->
	</div><!-- ends row-->
</section><!-- ends container-->
<?php	include $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>
