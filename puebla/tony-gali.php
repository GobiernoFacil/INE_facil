<?php	
	$body_class 	= "puebla candidato";
	$title 			= "Tony Gali candidato a Gobernador en Puebla 2016";
	$description 	= "Tony Gali";
	$canonical		= "http://inefacil.com/";
	include  $_SERVER['DOCUMENT_ROOT']."/templates/header.php";
	
	// datos candidato
	$nombre 		= "José Antonio Gali Fayad";
	$pic 			= "/img/puebla/tony-gali.jpg";
	$edad			= 56;
	$lugar			= "Puebla de Zaragoza";
	$civil			= "Casado";
	$conyuge		= "Alma Dinorah López Gargallo";
	$academico		= "Maestría en Administración pública";
	$tresdetres		= "Sí";
	$web			= "http://tonygali.mx/";
	$tw				= "https://twitter.com/TonyGali";
	$fb				= "https://www.facebook.com/TonyGaliFayad";
	$partido		= "pan";
	
	//trayectoria
	$trayectoria = [
						["descripcion"=>"Presidente Municipal de Puebla",
						 "fecha"	=> "15 de febrero de 2014 a 19 de febrero de 2016",
						],
						["descripcion"=>"Secretario de Infraestructura del Gobierno del Estado",
						],
						["descripcion"=>"Subsecretario de Comunicaciones y Transportes del Estado de Puebla",
						],
						["descripcion"=>"Delegado de la Comisión Nacional para la Protección y Defensa de los Usuarios de Servicios Financieros",
						],
						["descripcion"=>"Administrador Estatal en Puebla del Servicio de Administración Tributaria de la Secretaría de Hacienda y Crédito Público",
						],
						["descripcion"=>"Delegado Regional de Evaluación Pacífico-Centro",
						],
					];
	///laboral
	$laboral	= [	
						["descripcion"=>"Asesor fiscal, corporativo y de servicios integrales para las empresas y organizaciones estatales y federales, del despacho Auditores y Asesores del Sureste",
						],
					
				  ];
	//patrimonial
	$ingreso_neto_anuales	= 1553107.24;
	$ingreso_cargo_publico	= 1347732.00;
	$ingreso_actividad_financiera =205375.24;
	//inmuebles
	$valor_inmueble			= 16713961.8;
	$inmuebles				= 6;
	$sup_terreno_m2			= 19544.53;
	$sup_construccion		= 1596.26;
	$credito				= 0;
	$cesion					= 0;
	$contado				= 6;
	$casas					= 2;
	$departamento			= 0;
	$terreno				= 4;
	//muebles
	$bienes_muebles		= 3500000.00;
	$obras_arte			= 0;
	$joyas				= 1;
	$menaje				= 1;	
	//inversiones	
	$inversiones		= 6;
	$ceroa100			= 0;
	$ciena500			= 1;
	$quinientos			= 5;
?>

<?php include  $_SERVER['DOCUMENT_ROOT']."/puebla/template_candidato.php";?>


<?php include  $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>