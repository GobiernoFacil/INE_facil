// el script de la gráfica

var graph = document.querySelector("#graph");

// CLEAN THE BARCHART
graph.innerHTML = "";


//Width and height
var w 			 	 = 500,
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
    "entidad":"Coahuila",
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
    "entidad":"Michoacán",
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
    "entidad":"Veracruz",
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
	
//agrega escala para color
	  var colorScaleBar = d3.scale.linear()
		.range(['#999', '#FF3B77']) 
		.domain([0, d3.max(dataset, function(d, i) { return d.diputados; })])	
	
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
        // agrega colorScaleBar
        .style('background', function(d){
		return colorScaleBar(d.diputados);
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



// MAP
// SELECT THE DATA


      var 
          // ADD A d3.scale
          colorScale = d3.scale.linear()
            .range(['#7ec8f2', '#bc1d78']) 
            .domain([750000, 8000000]),
          colorScale250 = d3.scale.linear()
            .range(['#cff3ff', '#7ec8f2']) 
            .domain([1, 750000]);

  /*    // RENDER THE TOTAL TOURIST LABEL
      this.$('#tourist-year-map-label').html(year);
      this.$('#tourist-total-map-label').html(this.format(total));*/

      
      // PREPARE THE DATA			
var dataset_map = [
  {
    "id_estado":1,
    "entidad":"Aguascalientes",
    "circunscripcion":2
  },
  {
    "id_estado":2,
    "entidad":"Baja California",
    "circunscripcion":1
  },
  {
    "id_estado":3,
    "entidad":"Baja California Sur",
    "circunscripcion":1
  },
  {
    "id_estado":4,
    "entidad":"Campeche",
    "circunscripcion":3
  },
  {
    "id_estado":5,
    "entidad":"Coahuila",
    "circunscripcion":2
  },
  {
    "id_estado":6,
    "entidad":"Colima",
    "circunscripcion":5
  },
  {
    "id_estado":7,
    "entidad":"Chiapas",
    "circunscripcion":3
  },
  {
    "id_estado":8,
    "entidad":"Chihuahua",
    "circunscripcion":1
  },
  {
    "id_estado":9,
    "entidad":"Distrito Federal",
    "circunscripcion":4
  },
  {
    "id_estado":10,
    "entidad":"Durango",
    "circunscripcion":1
  },
  {
    "id_estado":11,
    "entidad":"Guanajuato",
    "circunscripcion":2
  },
  {
    "id_estado":12,
    "entidad":"Guerrero",
    "circunscripcion":4
  },
  {
    "id_estado":13,
    "entidad":"Hidalgo",
    "circunscripcion":5
  },
  {
    "id_estado":14,
    "entidad":"Jalisco",
    "circunscripcion":1
  },
  {
    "id_estado":15,
    "entidad":"Estado de México",
    "circunscripcion":5
  },
  {
    "id_estado":16,
    "entidad":"Michoacán",
    "circunscripcion":5
  },
  {
    "id_estado":17,
    "entidad":"Morelos",
    "circunscripcion":4
  },
  {
    "id_estado":18,
    "entidad":"Nayarit",
    "circunscripcion":1
  },
  {
    "id_estado":19,
    "entidad":"Nuevo León",
    "circunscripcion":2
  },
  {
    "id_estado":20,
    "entidad":"Oaxaca",
    "circunscripcion":3
  },
  {
    "id_estado":21,
    "entidad":"Puebla",
    "circunscripcion":4
  },
  {
    "id_estado":22,
    "entidad":"Querétaro",
    "circunscripcion":2
  },
  {
    "id_estado":23,
    "entidad":"Quintana Roo",
    "circunscripcion":3
  },
  {
    "id_estado":24,
    "entidad":"San Luis Potosí",
    "circunscripcion":2
  },
  {
    "id_estado":25,
    "entidad":"Sinaloa",
    "circunscripcion":1
  },
  {
    "id_estado":26,
    "entidad":"Sonora",
    "circunscripcion":1
  },
  {
    "id_estado":27,
    "entidad":"Tabasco",
    "circunscripcion":3
  },
  {
    "id_estado":28,
    "entidad":"Tamaulipas",
    "circunscripcion":2
  },
  {
    "id_estado":29,
    "entidad":"Tlaxcala",
    "circunscripcion":4
  },
  {
    "id_estado":30,
    "entidad":"Veracruz",
    "circunscripcion":3
  },
  {
    "id_estado":31,
    "entidad":"Yucatán",
    "circunscripcion":3
  },
  {
    "id_estado":32,
    "entidad":"Zacatecas",
    "circunscripcion":2
  }
];


	 

      // SET THE COLORS ON THE MAP
      var states = d3.select('#Mexico')
        .selectAll('path')
        .attr('style', function(){
          var id = this.getAttribute('id'),
		  total  = dataset_map[id - 1].circunscripcion;
          fill   = '';

          if(total == 5) {
            fill = "#FF7F66";
          }
          else if(total ==4){
            fill = "#FFF6E5";
          }
          
           else if(total == 3){
            fill = "#63A69F";
          }
          else if(total == 2){
            fill = "#2185C5";
          }
          else if(total == 1){
            fill = "#3E454C";
          }
          else{
            fill = "#f2f2f2";
          }

          return 'fill: ' + fill + '; cursor: pointer';
        })

        // SHOW THE STATE LABEL ON MOUSEOVER
        .on('mouseover', function(){
          var bb = this.getBBox(),
              id = this.getAttribute('id'),
              d  = dataset_map[id - 1],
              y  = bb.y + (bb.height/2)
              x  = bb.x + (bb.width/2);
              if ((id==23) || (id==31)) {
	              x = x - 80;  
              }			  
          // remove the previous labels
          d3.selectAll('#Mexico text').remove();
          d3.selectAll('#Mexico rect').remove();
		  
		  // esto es solo para calcular ancho
		  d3.select('#Mexico') 
            .append("text")
            	.attr('id','azul')
				.text(d.entidad)
				.attr("x", (x +5))
                .attr("y", (y +15));
          
          var widthS = document.getElementById('azul').offsetWidth;
		  //elimina text trazado solo para calcular
		  d3.selectAll('#Mexico text').remove();

          
          //agrega rectángulo    		
          d3.select('#Mexico')
          	.append("rect")
          		.attr("width", widthS + 10)
                .attr("height", 30)
             	.attr("x", (x))
                .attr("y", y)
                .attr('fill', '#FF3B77')
                .attr('fill-opacity', 0.8);
                
           //agrega texto sobre rectángulo 
           d3.select('#Mexico') 
            .append("text")
				.text(d.entidad)
				.attr("x", (x +5))
                .attr("y", (y +15));
         
        });
