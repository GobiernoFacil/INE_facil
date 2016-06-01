<?php	
	$body_class 	= "puebla candidatos";
	$title 			= "Elección a Gobernador en Puebla 2016";
	$description 	= "Conoce los candidatos a Gobernador en Puebla.";
	$canonical		= "http://inefacil.com/puebla";
	include  $_SERVER['DOCUMENT_ROOT']."/templates/header.php";?>


<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="live">Conoce a los candidatos a <strong>Gobernador en Puebla 2016</strong></h2>
				<!--<p class="lead"><strong>12 gobernadores</strong>, 448 diputados, y 965 ayuntamientos.</p>-->
				<ul class="row diputables">
					<li class="col-xs-6 col-sm-3">
					  <a class="profile_candito" href="/puebla/blanca-alcala">
					    <figure><img src="/img/puebla/blanca-alcala.jpg" alt="Blanca Alcalá">
					    	<b>+ información</b>
					    </figure>
					    <span>Blanca María del Socorro Alcalá Ruiz</span>
					    <span class="partidin pri">pri</span>
					  </a>
					</li>
					<li class="col-xs-6 col-sm-3">
					  <a class="profile_candito" href="/puebla/ana-teresa-aranda">
					    <figure><img src="/img/puebla/ana-teresa-aranda.jpg" alt="ANA TERESA ARANDA OROZCO">
					    	<b>+ información</b>
					    </figure>
					    <span>Ana Teresa Aranda Orozco</span>
					    <span class="partidin">Independiente</span>
					  </a>
					</li>
					<li class="col-xs-6 col-sm-3">
					  <a class="profile_candito" href="/puebla/tony-gali">
					    <figure><img src="/img/puebla/tony-gali.jpg" alt="Tony Gali">
					    	<b>+ información</b>
					    </figure>
					    <span>José Antonio Gali Fayad</span>
					    <span class="partidin pan">pan</span>
					  </a>
					</li>
					
					<li class="col-xs-6 col-sm-3">
					  <a class="profile_candito" href="/puebla/roxana-luna">
					    <figure><img src="/img/puebla/roxana-luna.jpg" alt="Roxana Luna">
					    	<b>+ información</b>
					    </figure>
					    <span>Roxana  Luna Porquillo</span>
					    <span class="partidin prd">prd</span>
					  </a>
					</li>
					
					<li class="col-xs-6 col-sm-3">
					  <a class="profile_candito" href="/puebla/abraham-quiroz">
					    <figure><img src="/img/puebla/abraham-quiroz.jpg" alt="Abraham Quiroz">
					    	<b>+ información</b>
					    </figure>
					    <span>Abraham Quiroz Palacios</span>
					    <span class="partidin morena">Morena</span>
					  </a>
					</li>
				</ul>
			</div>

			</div>
		</div>
	</div>
</section>


<?php	include  $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>
