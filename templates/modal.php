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
			{{#if correo}} <a href="mailto:{{correo}}" class="links">{{correo}}</a> {{else}} Sin correo / No Sabe / No contestó{{/if}}
		</p>
		<p class="info_gral"><span class="label">Enlaces:</span> 
			{{#if social}} 
				{{#each social}}
					<a href="{{url}}" target="_blank" class="links">{{red}}</a>
				{{/each}}
			{{else}} 
				Sin enlaces / No Sabe / No contestó
			{{/if}}
		</p>
	</div>
	<div class="col-sm-9">
		<h4>Candidato a Diputado Federal, Distrito {{district}}, {{city}}, {{state}}.</h4>
		<h2>{{nombre}}</h2>
		<p class="partidin {{#each partidos}} {{this}} {{/each}}"></p>
		<p class="suplente"><span class="label">Suplente:</span> {{suplente}}</p>
		<div class="mentiras">
			{{#with mentiras}}
				<h3><a>Propuesta</a></h3>
				{{#if templete}} 
					<p>{{templete}}</p>
				{{else}}
					<p>Sin Propuesta / No Sabe / No contestó</p>
				{{/if}}
				<h3><a>Trayectoria en administraciones públicas</a></h3>
				{{#if trayectoria}} 
					<p>{{trayectoria}}</p>
				{{else}}
					<p>Sin Trayectoria / No Sabe / No contestó</p>			
				{{/if}}
				<h3><a>Trayectoria laboral</a></h3>
				{{#if laborales}} 
					<p>{{laborales}}</p>
				{{else}}
					<p>Sin Experiencia / No Sabe / No contestó</p>
				{{/if}}
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