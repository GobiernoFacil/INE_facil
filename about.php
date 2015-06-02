<?php	
	$body_class 	= "about";
	$title 			= "Acerca de INE Fácil";
	$description 	= "Información sobre INE Fácil.";
	$canonical		= "http://inefacil.com/acerca-de-ine-facil/";
	include $_SERVER['DOCUMENT_ROOT']."/templates/header.php";?>
	
<section class="container">
	<div class="row">		
		<div class="divider" data-text="Acerca de INE Fácil"><h1>Acerca de INE Fácil</h1></div>
		<div class="col-sm-8 col-sm-offset-2">	
			<p>Esta aplicación surge de la invitación de <a href="http://rob.mx/">Rob Hidalgo</a> a utilizar su <a href="https://github.com/unRob/api-elecciones">api de datos electorales</a>. El distrito, los candidatos y la sección (con sus funcionarios), se obtienen enviando un par de coordenadas. <strong>Fácil y rápido</strong>.</p>
			<p>El plan era dedicarle un par de días a la programación y diseño, pero al final tomó una semana el armado de este mini sitio. El nombre original era “el api de don pato”, haciendo referencia al logo del <a href="http://surrealista.mx/">Partido Surrealista</a>, pero no resistimos la tentación de llamarla <strong>INE fácil</strong>, tal vez como el anuncio de un proyecto más grande, que al igual que <a href="http://inegifacil.com/">INEGI fácil</a>, simplifique el acceso a la información federal.</p>
			<p>Durante el desarrollo recibimos ayuda de <a href="http://blog.diegovalle.net/">Diego Valle-Jones</a>, que nos proporcionó un <a href="https://github.com/diegovalle/download-maps12">archivo para convertir las claves de los municipios, del estándar INEGI a las ocurrencias del INE</a>.</p>
			<p>Desafortunadamente, este proyecto no se lo pudimos cobrar a nadie, pero fue muy entretenido (y educativo!) desarrollarlo.</p>
			<p>1 junio 2015</p>
		</div>
	</div>
</section>
<?php include $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>
