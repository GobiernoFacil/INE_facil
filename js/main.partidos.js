// el script de la gráfica

var graph = document.querySelector("#graph");

// CLEAN THE BARCHART
graph.innerHTML = "";


//Width and height
var w 			 	 = 600,
	h 			 	 = 420,
	barPadding 	 	 = 1, 
	padding 	 	 = 30,
	ypadding	 	 = 45;

// PREPARE THE DATA			
var dataset = [
  {
    "entidad":"Aguascalientes",
    "diputados":3
  },
  {
    "entidad":"Baja California",
    "diputados":8
  },
  {
    "entidad":"Baja California Sur",
    "diputados":2
  },
  {
    "entidad":"Campeche",
    "diputados":2
  },
  {
    "entidad":"Coahuila de Zaragoza",
    "diputados":7
  },
  {
    "entidad":"Colima",
    "diputados":2
  },
  {
    "entidad":"Chiapas",
    "diputados":12
  },
  {
    "entidad":"Chihuahua",
    "diputados":9
  },
  {
    "entidad":"Distrito Federal",
    "diputados":27
  },
  {
    "entidad":"Durango",
    "diputados":4
  },
  {
    "entidad":"Guanajuato",
    "diputados":14
  },
  {
    "entidad":"Guerrero",
    "diputados":9
  },
  {
    "entidad":"Hidalgo",
    "diputados":7
  },
  {
    "entidad":"Jalisco",
    "diputados":19
  },
  {
    "entidad":"Estado de México",
    "diputados":40
  },
  {
    "entidad":"Michoacán de Ocampo",
    "diputados":12
  },
  {
    "entidad":"Morelos",
    "diputados":5
  },
  {
    "entidad":"Nayarit",
    "diputados":3
  },
  {
    "entidad":"Nuevo León",
    "diputados":12
  },
  {
    "entidad":"Oaxaca",
    "diputados":11
  },
  {
    "entidad":"Puebla",
    "diputados":16
  },
  {
    "entidad":"Querétaro",
    "diputados":4
  },
  {
    "entidad":"Quintana Roo",
    "diputados":3
  },
  {
    "entidad":"San Luis Potosí",
    "diputados":7
  },
  {
    "entidad":"Sinaloa",
    "diputados":8
  },
  {
    "entidad":"Sonora",
    "diputados":7
  },
  {
    "entidad":"Tabasco",
    "diputados":6
  },
  {
    "entidad":"Tamaulipas",
    "diputados":8
  },
  {
    "entidad":"Tlaxcala",
    "diputados":3
  },
  {
    "entidad":"Veracruz de Ignacio de la Llave",
    "diputados":21
  },
  {
    "entidad":"Yucatán",
    "diputados":5
  },
  {
    "entidad":"Zacatecas",
    "diputados":4
  }
];
		
dataset = dataset.sort(function(x,y){return y.diputados - x.diputados } );
		
//Create scale functions
var xScale = d3.scale.linear()
 				.domain([0, d3.max(dataset, function(d, i) { return d.diputados; })])
				.range([0,w]);
						 
var yScale = d3.scale.linear()
					.domain([0, 1])
					.range([1, h - padding  * 2]);	

var yScaleAxis = d3.scale.linear()
					.domain([0,1])
					.range([h - padding , padding]);
	
	
	
			// draw the bars container
      var bars = d3.select('#graph')
        .selectAll('p')
        .data(dataset)
        .enter()
          .append('p');
      
      // draw the labels
      bars.append('span')
        .attr('class', 'label')
		.text(function(d,i){
				return  (i+1) + '. ';
		})
		//agrega strong para diferencia de index
		.append('strong')
		 	.text(function(d,i){
           return  d.entidad + ': ';
        });

      // draw the bars
      bars.append('span')
        .attr('class', 'bar')        
        .style('width', function(d){
          return xScale(d.diputados) + 'px';

        })
        
		//metemos valor en span
		.append('span')
        	.attr('class','value')
			.text(function(d){
				var value 	= d.diputados,
					//formato a valor
					valuef 	= value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				return valuef;
		});