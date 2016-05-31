<div class="breadcrumb">
		<a href="/puebla">< Candidatos a Gobernador de Puebla</a>

</div>
<article class="gobernador_info">
	<div class="container">
		<div class="row">
			
			<!-- info-->
			<div class="col-sm-3">
				<img src="<?php echo $pic;?>" alt="<?php echo $nombre;?>">
				<div class="info_gral">
					<p><span>Edad:</span>
						<?php echo $edad;?> años
					</p>
					<p><span>Lugar de Nacimiento:</span>
						<?php echo $lugar;?> 
					</p>
					<p><span>Estado Civil:</span>
						<?php echo $civil;?>
					</p>
					<p><span>Cónyuge:</span>
						<?php echo $conyuge;?>
					</p>
					<p><span>Grado Académico:</span>
						<?php echo $academico;?>
					</p>
					<p><span>Declaración Tres de Tres:</span>
						<?php echo $tresdetres;?>
					</p>
					<p><span>Enlaces:</span>
						<a href="<?php echo $web;?>" class="links">web</a>
						<a href="<?php echo $tw;?>" class="links">twitter</a>
						<a href="<?php echo $fb;?>" class="links">fb</a>
					</p>
				</div>
				
			</div>
			<?php 
			
			?>
			<div class="col-sm-9">
				<header>
					<h4>Candidato a Gobernador de Puebla.</h4>
					<h2><?php echo $nombre;?></h2>
					<p class="partidin <?php echo $partido;?>"><?php echo !$partido ? "Independiente" :  '' ;?></p>
				</header>
				<h3>Trayectoria en administraciones públicas</h3>
				<ul>
					<?php foreach ($trayectoria as $t):?>
					<li><?php echo $t['descripcion'];?> <?php echo $t['fecha'] ? '<span>(' .$t['fecha'] .')</span>' : '';?></li>
					<?php endforeach;?>
				</ul>
				<!--laboral-->
				<h3>Trayectoria laboral</h3>
				<ul>
					<?php if ($laboral):?>
					<?php foreach ($laboral as $l):?>
					<li><?php echo $l['descripcion'];?> <?php echo $l['fecha'] ? '<span>(' .$l['fecha'] .')</span>' : '';?></li>
					<?php endforeach;?>
					<?php else:?>
					<li>Sin Datos</li>
					<?php endif;?>
				</ul>
				<!--- patrimonial--->
				<h3>Declaración Patrimonial</h3>
				<div class="row patrimonial">
					<div class="col-sm-12">
						<h3>Ingreso Neto Anual: <strong>$<?php echo number_format($ingreso_neto_anuales, 2, '.', ',');?></strong></h3>
						<ul class="row">
							<li class="col-sm-5"><span>Ingresos por cargo público</span> <strong>$<?php echo number_format($ingreso_cargo_publico, 2, '.', ',');?></strong></li>
							<li class="col-sm-5"><span>Ingresos por Actividad Financiera</span> <strong>$<?php echo number_format($ingreso_actividad_financiera, 2, '.', ',');?></strong></li>
						</ul>
						<!--inmuebles-->
						<h3>Bienes inmuebles: <strong>$<?php echo number_format($valor_inmueble, 2, '.', ',');?></strong></h3>
						<ul class="row">
							<li class="col-sm-4"><span>Inmuebles</span> <strong><?php echo $inmuebles ;?></strong></li>
							<li class="col-sm-4"><span>Superficie de Terreno</span> <strong><?php echo number_format($sup_terreno_m2, 2,'.',',') ;?></strong></li>
							<li class="col-sm-4"><span>Superficie de Construcción</span> <strong><?php echo number_format($sup_construccion, 2,'.',',') ;?></strong></li>
						
							<li class="col-sm-4"><span>Crédito</span> <strong><?php echo $credito ;?></strong></li>
							<li class="col-sm-4"><span>Cesión</span> <strong><?php echo $cesion ;?></strong></li>
							<li class="col-sm-4"><span>Contado</span> <strong><?php echo $contado ;?></strong></li>
							
							<li class="col-sm-4"><span>Casas</span> <strong><?php echo $casas ;?></strong></li>
							<li class="col-sm-4"><span>Departamentos</span> <strong><?php echo $departamento ;?></strong></li>
							<li class="col-sm-4"><span>Terreno</span> <strong><?php echo $terreno ;?></strong></li>
						</ul>
						<!--muebles-->
						<h3>Bienes muebles: <strong>$<?php echo number_format($bienes_muebles, 2, '.', ',');?></strong></h3>
						<ul class="row">
							<li class="col-sm-4"><span>Obras de arte</span> <strong><?php echo $obras_arte ;?></strong></li>
							<li class="col-sm-4"><span>Joyas</span> <strong><?php echo $joyas ;?></strong></li>
							<li class="col-sm-4"><span>Menaje</span> <strong><?php echo $menaje ;?></strong></li>
						</ul>
						<!--inversiones-->
						<h3>Inversiones Bancarias: <strong><?php echo $inversiones;?></strong></h3>
						<ul class="row">
							<li class="col-sm-4"><span>Menor o igual a $100,000.00</span> <strong><?php echo $ceroa100 ;?></strong></li>
							<li class="col-sm-4"><span>Entre $100,000.01 y $500,000.00</span> <strong><?php echo $ciena500 ;?></strong></li>
							<li class="col-sm-4"><span>Mayor o igual a $500,000.01</span> <strong><?php echo $quinientos ;?></strong></li>
						</ul>
					</div>
				</div>
				
				
			</div>
			
			<!--source-->
			<div class="col-sm-12">
				<div class="source">
					<h4>Fuentes:</h4>
					<ul>
						<li><a href="http://www.ine.mx/">INE</a></li>
						<li><a href="http://www.ieepuebla.org.mx/">IEE</a></li>
						<li><a href="http://3de3.mx/#/elecciones/2016">TresDeTres</a></li>
						<li><a href="http://ladobe.com.mx/2016/04/estas-son-las-cinco-personas-que-quieren-tu-voto/">Lado B</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</article>