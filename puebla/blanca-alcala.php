<?php	
	$body_class 	= "puebla candidato";
	
	$nombre 		= "Blanca María del Socorro Alcalá Ruiz";

	$title 			= $nombre . " candidato a Gobernador en Puebla 2016";
	$description 	= $nombre;
	$canonical		= "http://inefacil.com/puebla/blanca-alcala";
	include  $_SERVER['DOCUMENT_ROOT']."/templates/header.php";
	
	// datos candidato
	$pic 			= "/img/puebla/blanca-alcala.jpg";
	$edad			= 54;
	$lugar			= "Tlaxcala de Xicohténcatl, Tlaxcala";
	$civil			= "Casada";
	$conyuge		= "Eduardo Romero Corona";
	$academico		= "Doctorado en Administración pública";
	$tresdetres		= "Sí";
	$web			= "http://www.soyblancaalcala.com/";
	$tw				= "https://twitter.com/SoyBlancaAlcala";
	$fb				= "https://www.facebook.com/SoyBlancaAlcala";
	$partido		= "pri";

	//trayectoria
	$trayectoria = [
						["descripcion"=>"Senadora de la República en las legislaturas LXII y LXIII",
						 "fecha"	=> "1 de septiembre de 2012 a 28 de febrero de 2016",
						],
						["descripcion"=>"Presidenta Municipal de Puebla",
							"fecha"=>"2008-2011"
						],
						["descripcion"=>"Delegada del CEN del PRI en Colima",
						],
						["descripcion"=>"Secretaria General del CDE del PRI",
							"fecha"=>"4 de diciembre de 2011 - 11 de diciembre de 2012"
						],
						["descripcion"=>"Subsecretaria de Desarrollo Regional de la Secretaria de Desarrollo Social de Puebla",
						],
						["descripcion"=>"Directora del Instituto Poblano de la Mujer",
						],
						["descripcion"=>"Delegada General del Banco Nacional de Obras y Servicios Públicos",
						],
						["descripcion"=>"Secretaria de Finanzas de Puebla",
						],
						["descripcion"=>"Diputada Local en la LIII Legislatura del Congreso de Puebla",
							"fecha"=>"15 de enero de 1996 - 18 de junio de 1998"
						],
						["descripcion"=>"Presidenta de la Comisión de Hacienda",
						],
						["descripcion"=>"Directora del DIF Estatal",
						],
						["descripcion"=>"Delegada Municipal del PRI",
						],
						["descripcion"=>"Consejera Política Nacional del PRI",
						],
						["descripcion"=>"Consejera Directiva Estatal del PRI",
						],
						["descripcion"=>"Presidenta del Comité Directivo Municipal del PRI",
						],
						["descripcion"=>"Secretaria General Adjunta de la CNOP",
						],



					];
	///laboral
	$laboral	= [	
						
					
				  ];
	//patrimonial
	$ingreso_neto_anuales	= 1916622.09;
	$ingreso_cargo_publico	= 1802381.00;
	$ingreso_actividad_financiera =114241.09;
	//inmuebles
	$valor_inmueble			= 1126504.00;
	$moneda					= "MXN";
	$inmuebles				= 2;
	$sup_terreno_m2			= 3330.00;
	$sup_construccion		= 412;
	$credito				= 0;
	$cesion					= 0;
	$contado				= 1;
	$casas					= 1;
	$departamento			= 0;
	$terreno				= 1;
	//muebles
	$bienes_muebles		= 950000.00;
	$obras_arte			= 1;
	$joyas				= 1;
	$menaje				= 1;	
	//inversiones	
	$inversiones		= 4;
	$ceroa100			= 0;
	$ciena500			= 2;
	$quinientos			= 7;
?>

<?php include  $_SERVER['DOCUMENT_ROOT']."/puebla/template_candidato.php";?>


<?php include  $_SERVER['DOCUMENT_ROOT']."/templates/footer.php";?>