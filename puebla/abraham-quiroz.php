<?php	
	$body_class 	= "puebla candidato";
	
	$nombre 		= "Abraham Quiroz Palacios";

	$title 			= $nombre . " candidato a Gobernador en Puebla 2016";
	$description 	= $nombre;
	$canonical		= "http://inefacil.com/puebla/abraham-quiroz";


	include  $_SERVER['DOCUMENT_ROOT']."/templates/header.php";
	
	// datos candidato
	$pic 			= "/img/puebla/abraham-quiroz.jpg";
	$edad			= 69;
	$lugar			= "Guerrero";
	$civil			= "Casado";
	$conyuge		= "Maria Antonia del Carmen Clemente";
	$academico		= "Doctor en Sociología Política";
	$tresdetres		= "Sí";
	$web			= "http://www.abrahamquiroz.org/morena";
	$tw				= "https://twitter.com/abrahamquiroz_";
	$fb				= "https://www.facebook.com/Texmeluquenses-con-Abraham-Quiroz-Palacios-Morena-455003484696003";
	$partido		= "morena";
	
	///laboral
	$laboral	= [	
						[
							"descripcion"=>"Profesor-Investigador de tiempo completo en la BUAP",
			
						],
						["descripcion"=>"Miembro del Sistema Nacional de Investigadores - CONACYT",
						"fecha"=>"Vigencia dic/2016"
						],
						["descripcion"=>"Miembro del Padrón de Investigadores de la VIEP-BUAP",
						"fecha"=>"Vigencia 2017"
						],
						["descripcion"=>"Perfil PRODEP",
						"fecha"=>"Vigencia 2014-2017"
						],
						["descripcion"=>"Director de Extensión y Difusión de la BUAP",
						],
						["descripcion"=>"Secretario de Investigación y Estudios de Posgrado de la Facultad de Psicología, BUAP",
						],
						["descripcion"=>"Director de la escuela de Filosofía y Letras",
						],
						["descripcion"=>"Coordinador de la Maestría en Psicología, Facultad de Psicología, BUAP",
						],
						
						
					
				  ];
	//patrimonial
	$ingreso_neto_anuales	= 836070.00;
	$ingreso_cargo_publico	= 836070.00;
	$ingreso_actividad_financiera =0;
	//inmuebles
	$valor_inmueble			= 117958000.00;
	$moneda					= "MXP – Viejos pesos";
	$inmuebles				= 2;
	$sup_terreno_m2			= 0;
	$sup_construccion		= 115;
	$credito				= 2;
	$cesion					= 0;
	$contado				= 0;
	$casas					= 0;
	$departamento			= 2;
	$terreno				= 0;
	//muebles
	$bienes_muebles		= 71500.00;
	$obras_arte			= 0;
	$joyas				= 0;
	$menaje				= 1;	
	//inversiones	
	$inversiones		= 2;
	$ceroa100			= 1;
	$ciena500			= 1;
	$quinientos			= 0;
?>

<?php include  $_SERVER['DOCUMENT_ROOT']."/puebla/template_candidato.php";?>


<?php include  $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>