<!doctype html>
<!--
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::	
.oPYo.        8       o                              ooooo     .o         o 8 
8    8        8                                      8                      8 
8      .oPYo. 8oPYo. o8 .oPYo. oPYo. odYo. .oPYo.   o8oo   .oPYo. .oPYo. o8 8 
8   oo 8    8 8    8  8 8oooo8 8  `' 8' `8 8    8    8     .oooo8 8    '  8 8 
8    8 8    8 8    8  8 8.     8     8   8 8    8    8     8    8 8    .  8 8 
`YooP8 `YooP' `YooP'  8 `Yooo' 8     8   8 `YooP'    8     `YooP8 `YooP'  8 8 
:....8 :.....::.....::..:.....:..::::..::..:.....::::..:::::.....::.....::....
:::::8 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
:::::..:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
-->
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo !$title ? "" :  $title ;?></title>
    <meta name="description" content="<?php echo !$description ? "" :  $description ;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="canonical" href="<?php echo !$canonical ? "" :  $canonical ;?>">		
	
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Josefin+Slab:300,400,700,400italic' rel='stylesheet' type='text/css'></head>

<body <?php echo !$body_class ? "" : 'class="' . $body_class .'"';?>>
<div class="brand">
		<div class="row">
			<div class="col-sm-3">
				<a href="http://gobiernofacil.com/herramientas" class="tool">Otras herramientas de Gobierno Fácil &gt;</a>
			</div>
			<div class="col-sm-5 col-sm-offset-4 right">
				<span>un producto de</span> 
				<a href="http://gobiernofacil.com/" class="gobiernofacil">Gobierno Fácil</a>
			</div>
		</div>
	</div>
	
	<header class="main">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<h2><a href="/"><strong>INE</strong> Fácil</a></h2>
					<h1>Elecciones Federales <strong>2015</strong></h1>
				</div>
				<div class="col-sm-5">
					<?php if ($body_class != 'el_home'):?>
					<p class="date">Domingo 7 de junio</p>
					<?php endif;?>
					<div id="countdown" <?php echo $body_class != 'el_home' ? "" : 'class="wo_date"';?>></div>
				</div>
				
			</div>
		</div>
	</header>