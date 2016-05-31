<?php	
	$body_class 	= "puebla candidato";
	$nombre 		= "Roxana  Luna Porquillo";

	$title 			= $nombre . " candidato a Gobernador en Puebla 2016";
	$description 	= $nombre;
	$canonical		= "http://inefacil.com/puebla/roxana-luna";


	include  $_SERVER['DOCUMENT_ROOT']."/templates/header.php";
	
	// datos candidato
	$pic 			= "/img/puebla/roxana-luna.jpg";
	$edad			= 35;
	$lugar			= "San Pedro Cholula, Puebla";
	$civil			= "Soltera";
	$conyuge		= "No aplica";
	$academico		= "Maestría en Derecho civil y mercantil";
	$tresdetres		= "Sí";
	$web			= "http://www.roxanaluna.mx/";
	$tw				= "https://twitter.com/roxanalunap";
	$fb				= "https://www.facebook.com/roxanalunap";
	$partido		= "prd";
	
	//trayectoria
	$trayectoria = [
						["descripcion"=>"Diputada federal por el PRD.",
						"fecha"=>"1 de septiembre de 2012 - 31 de agosto de 2015"
						],
						["descripcion"=>"Consejera Nacional del PRD.",
						"fecha"=>"2011"
						],
						["descripcion"=>"Secretariado Nacional, Secretaría de Desarrollo Sustentable y Ecología del PRD",
						"fecha"=>"2009-2012"
						],
						["descripcion"=>"Subsecretaria de Derechos Humanos y Pueblos Indígenas del PRD.",
						"fecha"=>"2007"
						],
						["descripcion"=>"Integrante del Frente de Pueblos en Defensa de la Tierra y el Agua de Puebla y Tlaxcala.",
						],
						
					];
	///laboral
	$laboral	= [	
						["descripcion"=>"Fundadora de la Organización Nacional los de Abajo.",
						"fecha"=>"2008",
						],
						["descripcion"=>"Abogada litigante",
						"fecha"=>"2002 a la fecha",
						],
				  ];
	//patrimonial
	$ingreso_neto_anuales	= 1202266.00;
	$ingreso_cargo_publico	= 1202266.00;
	$ingreso_actividad_financiera =0;
	//inmuebles
	$valor_inmueble			= 739063.00;
	$inmuebles				= 2;
	$sup_terreno_m2			= 695;
	$sup_construccion		= 1328.90;
	$credito				= 1;
	$cesion					= 1;
	$contado				= 0;
	$casas					= 0;
	$departamento			= 0;
	$terreno				= 2;
	//muebles
	$bienes_muebles		= 0;
	$obras_arte			= 0;
	$joyas				= 0;
	$menaje				= 0;	
	//inversiones	
	$inversiones		= 2;
	$ceroa100			= 0;
	$ciena500			= 1;
	$quinientos			= 1;
?>

<?php include  $_SERVER['DOCUMENT_ROOT']."/puebla/template_candidato.php";?>


<?php include  $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>