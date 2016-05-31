<?php	
	$body_class 	= "puebla candidato";
	
	$nombre 		= "Ana Teresa Aranda Orozco";

	$title 			= $nombre . " candidato a Gobernador en Puebla 2016";
	$description 	= $nombre;
	$canonical		= "http://inefacil.com/puebla/ana-teresa-aranda";


	include  $_SERVER['DOCUMENT_ROOT']."/templates/header.php";
	
	// datos candidato
	$pic 			= "/img/puebla/ana-teresa-aranda.jpg";
	$edad			= 62;
	$lugar			= "León, Guanajuato";
	$civil			= "Viuda";
	$conyuge		= "Luis Alejandro Orea Martínez";
	$academico		= "Licenciatura en Ciencias Políticas";
	$tresdetres		= "Sí";
	$web			= "";
	$tw				= "https://twitter.com/anaterearanda";
	$fb				= "";
	
	//trayectoria
	$trayectoria = [
						["descripcion"=>"Subsecretaria de Población Migración y Asuntos Religiosos de la Secretaria de Gobernación",
						 "fecha"	=> "2008-2009",
						],
						["descripcion"=>"Precandidata a la gubernatura de Puebla por el PAN",
						"fecha"=>"2007"
						],
						["descripcion"=>"Secretaria de Desarrollo Social  (SEDESOL)",
						"fecha"=>"2006"
						],
						["descripcion"=>"Directora del Sistema Nacional para el Desarrollo Integral de la Familia (DIF)",
						"fecha"=>"2000 - 2006"
						],
						["descripcion"=>"Candidata a Senadora",
						"fecha"=>"2000"
						],
						
						["descripcion"=>"Candidata a gobernadora de Puebla",
						"fecha"=>"1998",
						],
						["descripcion"=>"Integrante del CEN en 1995, dirigente estatal del PAN",
						],
						["descripcion"=>"Secretaria de Acción Ciudadana y Promoción Política de la Mujer en el PAN",
						
						],
						["descripcion"=>"Miembro del PAN desde 1980",
						],
					];
	///laboral
	$laboral	= [	
						
					
				  ];
	//patrimonial
	$ingreso_neto_anuales	= 0;
	$ingreso_cargo_publico	= 0;
	$ingreso_actividad_financiera =0;
	//inmuebles
	$valor_inmueble			= 3400028.00;
	$moneda					= "MXN";
	$inmuebles				= 2;
	$sup_terreno_m2			= 517;
	$sup_construccion		= 370;
	$credito				= 2;
	$cesion					= 0;
	$contado				= 0;
	$casas					= 1;
	$departamento			= 1;
	$terreno				= 0;
	//muebles
	$bienes_muebles		= 400000.00;
	$obras_arte			= 0;
	$joyas				= 0;
	$menaje				= 1;	
	//inversiones	
	$inversiones		= 2;
	$ceroa100			= 2;
	$ciena500			= 0;
	$quinientos			= 0;
?>

<?php include  $_SERVER['DOCUMENT_ROOT']."/puebla/template_candidato.php";?>


<?php include  $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>