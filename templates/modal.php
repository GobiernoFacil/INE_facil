<!-- THE HTML TEMPLATES -->
	<script id="template-candidate-modal" type="text/x-handlebars-template">
    <div class="col-sm-3">
		<figure><img src="{{foto}}"></figure>
		
		<p class="info_gral"><span class="label">Edad:</span> 
			{{#if edad}} {{edad}} {{else}} Sin edad / No Sabe / No contestó{{/if}}
		</p>
		<p class="info_gral"><span class="label">Casa de campaña:</span> 
			{{#if casa_campana}} {{casa_campana}} {{else}} Indigente / No Sabe / No contestó{{/if}}
		</p>
		<p class="info_gral"><span class="label">Correo:</span> 
			{{#if correo}} {{correo}} {{else}} Sin correo / No Sabe / No contestó{{/if}}
		</p>
		<p class="info_gral"><span class="label">Enlaces:</span> 
			{{#if social}} {{social}} {{else}} Sin enlaces / No Sabe / No contestó{{/if}}
		</p>
	</div>
	<div class="col-sm-9">
		<h4>Candidato a Diputado Federal, Distrito 12, Puebla</h4>
		<h2>{{nombre}}</h2>
		<p class="partidin {{#each partidos}} {{this}} {{/each}}"></p>
		<p class="suplente"><span class="label">Suplente:</span> {{suplente}}</p>
		<div class="mentiras">
			{{#with mentiras}}
				<h3><a>Propuesta</a></h3>
				<p>{{templete}}</p>
				<h3><a>Trayectoria en administraciones públicas</a></h3>
				<p>{{trayectoria}}</p>			
				<h3><a>Trayectoria laboral</a></h3>
				<p>{{laborales}}</p>
			{{else}}
				<h3><a>Propuesta</a></h3>
				<p>Sin Propuesta / No Sabe / No contestó</p>
				<h3><a>Trayectoria en administraciones públicas</a></h3>
				<p>Sin Trayectoria / No Sabe / No contestó</p>			
				<h3><a>Trayectoria laboral</a></h3>
				<p>Sin Experiencia / No Sabe / No contestó</p>
			{{/with}}			
		</div>
	</div>
    
  </script>
  
<!-- diputables info -->
<div class="modal effect">
	<div class="close_modal"></div>
	<div class="md-content">
		<div id="diputable_info" class="row">

		</div>
	</div>
</div>
<!-- overlay -->
<div class="ine-overlay"></div>