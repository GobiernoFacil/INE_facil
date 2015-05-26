<?php	
	$body_class 	= "candidatos";
	$title 			= "Candidatos a Elecciones Federales 2015";
	$description 	= "Conoce los candidatos de tu distrito.";
	include $_SERVER['DOCUMENT_ROOT']."/templates/header.php";?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
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

  <!-- los candidatos a mantenidos del distrito -->
  <section id="district-candidates-container"></section>

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
			
		</div>
	</div>
<?php	include $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>
