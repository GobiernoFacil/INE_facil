<?php	
	$body_class 	= "candidatos";
	$title 			= "Candidatos a Elecciones Federales 2015";
	$description 	= "Conoce los candidatos de tu distrito.";
	include $_SERVER['DOCUMENT_ROOT']."/templates/header.php";?>
<section class="container">
	<div class="row">		
		<!-- Inica la conlaboración con don pato. -->
		<div id="main">
			<div class="divider" data-text="Candidatos"></div>
			<div class="col-md-4">	
				<h2>01. Busca el distrito</h2>
				<p>Para conocer tus candidatos busca primero tu distrito</p>

				<!-- [ el selector de distrito ]  -->
				<!-- Esta información se carga de un para de CSVs -->
				<section id="district-selector-container">
				  <form>
				    <p>
				      <label>Selecciona tu estado:</label>
				      <select name="state"></select>
				    </p>
				    <p>
				      <label>Selecciona tu municipio:</label>
				      <select name="city"></select>
				    </p>
				  </form>
				</section>

				<!-- el mapa del distrito -->
				<section id="district-map-container">
				  <div class="map" style="border:1px solid red; width:300px; height:300px;"></div>
				</section>

			</div>

			<div class="col-md-8">
				<p>Encuentra tu candidato</p>
			</div>		
			
			<div class="col-md-12">
  <!-- los candidatos a mantenidos del distrito -->
  <section id="district-candidates-container">
	  <h2>02. Conoce los candidatos</h2>
	  <p>Estos son los candidatos del distrito</p>
	  <ul class="row diputables"></ul>
  </section>





  <!-- la información del distrito -->
  <section id="district-data-container"></section>

  <!-- la información de las ciudades del distrito -->
  <section id="cities-data-container"></section>

  <!-- la sección de la radiografía electoral del distrito -->
  <section id="election-data-container"></section>

  <!-- el mapa de las casillas -->
  <section id="city-map-container"></section>

  <!-- la información de la casilla seleccionada -->
  <section id="locations-map-container"></section>

</div>

		</div>	<!-- ends col-8-->
	</div><!-- ends row-->
</section><!-- ends container-->
<?php	include $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>
