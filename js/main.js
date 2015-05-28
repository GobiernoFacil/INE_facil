// API DE DON PATO - ELECCIONES 2015
// @package  : don_pato
// @location : /js
// @file     : main.js
// @author  : Gobierno fácil <howdy@gobiernofacil.com>
// @url     : http://gobiernofacil.com

var APP = function(){
  //
  // S E T   T H E   C O N F I G   V A R I A B L E S
  // --------------------------------------------------------------------------------
  //

  // [ SET DEFAULT VALUES ]
  // define los endpoints, la ruta para los CSV de estados, municipios y distritos.
  // También el punto de default para los mapas y las expresiones regulares que 
  // limpian las claves que regresa el api de don pato.
  var endpoint   = "http://elecciones.rob.mx/",
      search     = "http://representantes.pati.to/busqueda/geo/diputados/",
      candidates = "candidatoas/",
      locations  = "casillas/",
      states_csv    = "/js/data/estados_min.csv",
      cities_csv    = "/js/data/municipios.csv",
      districts_csv = "/js/data/distritos2.csv",
      district_key_regex  = /df-(\d+)-(\d+)/,
      location_regex      = /(\d+)-([a-z\d]+)/i,
      district_map_center = [19.2676, -98.4239], // san merlín!

  // [ CACHE THE UI ELEMENTS ]
  // crea una referencia a los elementos de UI.
      state_selector      = document.querySelector("#district-selector-container select[name='state']"),
      city_selector       = document.querySelector("#district-selector-container select[name='city']"),
      district_map        = document.querySelector("#district-map-container .map"),
      locations_map       = document.querySelector("#city-map-container .map"),
      candidate_container = document.querySelector("#district-candidates-container ul"),
      location_container  = document.querySelector("#locations-map-container"),
      geolocation_btn     = document.querySelector("a.location"),
  
  // [ SET THE DATA CONTAINERS ]
  // crea las variables que contendrán la información de los CSV, y de los objetos 
  // que se crean dinámicamente. También los apuntadores de ubicación actuales.
      states_array          = [],
      cities_array          = [],
      districts_array       = [],
      candidates_array      = [],
      cities_map_array      = [],
      districts_map_array   = [],
      district_cities_array = [],
      google_district_map  = null,
      google_location_map  = null,
      google_geocoder      = new google.maps.Geocoder(),
      district_key         = null,
      current_location     = null,
      current_location_key = null,
      current_polygon      = null,
      current_state        = null,
      current_city         = null,
      current_district     = null,
      current_district_data = null,
  // [ SET THE HANDLEBARS TEMPLATES ]
      candidate_source   = document.querySelector("#template-candidate").innerHTML,
      candidate_template = Handlebars.compile(candidate_source),
      location_source    = document.querySelector("#template-location").innerHTML,
      location_template  = Handlebars.compile(location_source),
      app;

  //
  // D E F I N E   T H E   A P P
  // --------------------------------------------------------------------------------
  //
  app = {

    //
    // [ G E O L O C A L I Z E   T H E   S T U F F ]
    // ---------------------------------------------
    //

    // [ GET LOCATION ]
    // ----------------
    //
    get_geolocation : function(){
      // obtiene la ubicación mediante el API de geolocalización HTML5
      navigator.geolocation.getCurrentPosition(this.success_geolocation);
    },

    // [ GET LOCATION SUCCESS ]
    // ------------------------
    //
    success_geolocation : function(loc){
      // en caso de que se consiga la ubicación, llama al api de don pato,
      // y obtiene el distrito, la casilla, y 
      // el polígono del distrito.
      app.get("search", [loc.coords.latitude, loc.coords.longitude]);
    },

    // [ GET LOCATION FAILS ]
    // ----------------------
    //
    error_geolocation : function(){
      // si el usuario no permite que lo geolocalicen, pues vale gorro.
      console.log("meh murió la geolocalización");
    },
    
    //
    // [ C A L L   T H E   "Don Pato"   A P I ]
    // ----------------------------------------
    //

    // [ MAKE THE CALL]
    // ----------------
    //
    get : function(method, params){
      // para conectarse al api de don Pato, utiliza d3. Se reciben dos 
      // variables:
      // * method : decide el endpoint al cual debe conectarse (search, candidate, location)
      // * params : es un array con las variables para el api de don pato. puede contener
      //            latitud y logintud o la clave del distrito o la clave de la casilla.
      var url, success_function;
      // dependiendo del método, es el endopoint que se genera, y la función que se 
      // debe ejecutar al recibir los datos del api. Las posibles funciones son:
      // * search_success
      // * candidate_success
      // * location_success
      switch(method){
        case "search":
          url = search + params[0] + "/" + params[1];
          success_function = this.search_success;
          break;

        case "candidate":
          url = endpoint + candidates + params[0] + ".json";
          success_function = this.candidate_success;
          break;

        case "location":
          url = endpoint + locations + params[0];
          success_function = this.location_success;
          break;

        default:
          return null;
          break;
      }
      // se le agrega a la función de success el array de params, y se 
      // corrige el scope de la función.
      success_function = success_function.bind(this, params);
      // se hace la llamada al api de don pato.  
      d3.json(url, success_function);
    },

    // [ DON-PATO-API-CALL-SUCCESS (SEARCH) ]
    // -------------------------------------
    //
    search_success : function(params, error, data){
      // si el api de don pato o algo más falla, 
      // se ejecuta la función de error (definda abajo),
      // y sale del script y no pasa nada
      if(error){
        this.error(error);
        return false;
      }
      // en caso de que sí funcione, con la información recibida
      // de enviar las coordenadas actuales, se capturan los siguientes 
      // valores:
      // [1] las coordenadas capturadas por mediante geolocalización o
      //      mediante el selector de municipios
      district_map_center  = params;
      // [2] la clave del distrito, ej. df-21-12
      district_key         = data.distrito;
      // [3] la clave de la sección más cercana, ej. 21-1245
      current_location     = data.seccion.id;
      // [4] las coordenadas del polígono del distrito
      current_polygon      = data.seccion.coords.coordinates[0];
      // [5] la clave del estado
      current_state        = district_key_regex.exec(district_key)[1];
      // [6] la clave del distrito
      current_district     = district_key_regex.exec(district_key)[2];
      // [7] la clave de la sección electoral
      current_location_key = location_regex.exec(current_location)[2];

      // Se actualiza el selector de estado, y se actualiza el selector de
      // ciudades. 
      state_selector.value = current_state;
      this.set_cities(current_state);
      // define la ciudad actual y y las ciudades que pertenecen al distrito
      this.set_cities_by_district(current_state, current_district);

      // se inicia el mapa de distrito, en caso de que no se haya iniciado ya.
      if(! google_district_map){
        this.initialize_district_map();
      }
      // si el mapa ya tiene datos, se actualiza el mapa
      else{
        google_district_map.setCenter({
          lat: district_map_center[0], 
          lng: district_map_center[1]
        });
      }

      // se manda a llamar la información de candidatos y de casilla
      this.get("candidate", [district_key]);
      this.get("location", [current_location]);
    },

    // [ DON-PATO-API-CALL-SUCCESS (CANDIDATE) ]
    // -----------------------------------------
    //
    candidate_success : function(params, error, data){
      // prepara el string del contenido para la lista
      // de diputados y vacía el contenedor por si las flys
      var html = "";
      candidates_array = data;
      candidate_container.innerHTML = "";

      // genera el HTML para cada canidato
      data.forEach(function(candidate, index, array){
        candidate._index = index;
        html += candidate_template(candidate);
      });

      // pega el HTML al contenedor. Easy as pie
      candidate_container.innerHTML = html;
    },

    // [ DON-PATO-API-CALL-SUCCESS (LOCATION) ]
    // ----------------------------------------
    //
    location_success : function(params, error, data){
      var first_element, html, address;
      
      // al parecer todas las casillas de una sección están en el
      // mismo lugar, por lo que para obtener la dirección solo se
      // ocupan los datos de la primera casilla
      first_element = data[0];
      address = first_element.nombre + ", " 
      + first_element.direccion.calle + " " 
      + (first_element.direccion.numero != "Sin Número" ? first_element.direccion.numero : "");

      console.log(address);
      // se comienza a generar el HTML para la sección de funcionarios de casilla
      html = '<div class="col-sm-5"><h3 class="address">' + address + "</h3>";
      html += "<h4>" + first_element.referencia + "</h4></div>";
	  
	  html += '<div class="col-sm-7">'
      // se genera el HTML para cada funcionario de casilla, y se agrega a la 
      // variable html
      data.forEach(function(location, i){
	    i++;
        html += '<div class="col-sm-6">';
        html += '<h3>Funcionarios de casilla ' + i + '</h3>';
        location.funcionarios.forEach(function(funcionario){
          html += location_template(funcionario);
        });
        html+= "</div>";
      });
	  
	  html += "</div>";
	  
      // se agrega el html al contenedor
      location_container.innerHTML = html;

      // se geolocaliza el chisme este
      this.get_geolocation_from_google(address);
    },

    // [ FUCK! ]
    // ---------
    //
    error : function(conn){
      // cuando algo falla al mandar a llamar al api de don pato, esto
      // es lo que se ejecuta
      console.log(error);
    },

    //
    // [ T H E   L O C A T I O N   S E L E C T O R ]
    // ---------------------------------------------
    //

    // [ FILL THE STATE SELECTOR ]
    set_states : function(states){
      states.unshift({clave_entidad : 0, nombre:"selecciona un estado", url : ""});
      states.forEach(function(value, index, array){
        var option = document.createElement('option');
        var text   = document.createTextNode(value.nombre);
        option.appendChild(text);
        option.setAttribute("value", value.clave_entidad);
        state_selector.appendChild(option);
      });
    },

    // [ LOAD THE STATE LIST ]
    get_states : function(){
      var that = this;
      d3.csv(states_csv, null, function(error, rows){
        states_array = rows;
        that.set_states(rows);
      });
    },

    // [ FILL THE CITY SELECTOR ]
    set_cities : function(e){
      var state_id = typeof e === "object" ? e.currentTarget.value : e;
      var cities = app.get_cities_by_state(state_id);
      cities.unshift({
        clave_entidad : 0, 
        clave_municipio:0, 
        nombre : "selecciona un municipio"
      });
      city_selector.innerHTML = "";
      cities.forEach(function(value, index, array){
        var option = document.createElement('option');
        var text   = document.createTextNode(value.nombre);
        option.appendChild(text);
        option.setAttribute("value", value.clave_municipio);
        city_selector.appendChild(option);
      });
    },

    // [ LOAD THE CITY LIST ]
    get_cities : function(){
      var that = this;
      d3.csv(cities_csv, null, function(error, rows){
        cities_array = rows;
        that.map_cities(rows);
      });
    },

    // [ MAP THE CITY ]
    map_cities : function(cities){
      var map  = [], 
      counter  = 0, 
      pointer  = 1,
      displace = 0;
      cities.forEach(function(value, index, array){
        if(pointer == value.clave_entidad){
          counter++;
        }
        else{
          map.push([displace, counter]);
          counter  = 1;
          displace = index;
          pointer  = value.clave_entidad;
        }

        if(array.length == index + 1){
          map.push([displace, counter]);
        }
      });

      cities_array     = cities;
      cities_map_array = map;
      app.set_cities("0");
    },

    // [ GET CITIES BY STATE ]
    get_cities_by_state : function(state_id){
      if(! +state_id) return [];

      var x  = cities_map_array[+state_id - 1],
      cities = cities_array.slice(x[0], x[0] + x[1]);
      return cities;
    },

    //
    // [ T H E   D I S T R I C T   D A T A ]
    // ---------------------------------------------
    //

    // [ LOAD THE DISTRICT LIST ]
    get_districts : function(){
      var that = this;
      d3.csv(districts_csv, null, function(error, rows){
        districts_array = rows;
        that.map_districts(rows);
      });
    },

    // [ MAP THE CITY ]
    map_districts : function(districts){
      var map          = [],
      state            = [],
      district         = [],
      state_pointer    = 0,
      district_pointer = 0;

      districts.forEach(function(value, index, array){ 
        // [A] STATES
        if(!state_pointer || state_pointer != value.clave_entidad){
          if(state_pointer) map.push(state);
          if(!state_pointer) district.push(value);
          state = [];
          state_pointer    = value.clave_entidad;
          district_pointer = value.distrito;
        }
        // [B]
        else{
          // [B.A] DISTRICTS 
          if(district_pointer != value.distrito){
            state.push(district);
            district = [];
            district_pointer = value.distrito;
            district.push(value);
          }
          // [B.B]
          else{
            district.push(value);
          } // [B.B]

          if(array.length === index+1 || array[index+1].clave_entidad != state_pointer){
            state.push(district);
            district = [];
            district_pointer = value.distrito;
            district.push(value);
          }
        } // [B]
        if(array.length === index+1) map.push(state);
      }); // forEach
      
      districts_map_array = map;

      return map;
    },

    set_cities_by_district : function(state, district){
      var _cities_array = districts_map_array[+state - 1][+district - 1],
          _city_list    = [],
          _loc          = parseInt(current_location_key),
          _city, _state, _cities = [];

      for(var i = 0; i < _cities_array.length; i++){
    
        if(_loc >= +_cities_array[i].inicia && _loc <= +_cities_array[i].termina){
          current_city = _cities_array[i].clave_municipio_inegi;
        }
        if(_city_list.indexOf(_cities_array[i].clave_municipio_inegi) == -1){
          _city_list.push(_cities_array[i].clave_municipio_inegi);
        }
      }
      district_cities_array = _city_list;
      _city = cities_array[+cities_map_array[current_state - 1][0] + (current_city - 1)];
      district_cities_array.forEach(function(ct){
        _cities.push(cities_array[+cities_map_array[current_state - 1][0] + (ct - 1)]);
      });
      _state = states_array[current_state];
      current_district_data = {
        state    : _state,
        city     : _city,
        cities   : _cities,
        district : current_district
      };
    },

    //
    // [ T H E   G O O G L E   D I S T R I C T   M A P ]
    // -------------------------------------------------
    //

    // [ INITIALIZE THE DISTRICT MAP ]
    initialize_district_map : function(e){
      var mapOptions = {
        center : {
          lat : district_map_center[0],
          lng : district_map_center[1]
        },
        zoom : 10
      };
      google_district_map = new google.maps.Map(district_map, mapOptions);
      this.draw_polygon(google_district_map);
    },

    // [ SET THE MAP CENTER ]
    set_district_map_center : function(e){
      var city_id  = typeof e === "object" ? e.currentTarget.value : e,
          state_id = state_selector.value,
          cities   = app.get_cities_by_state(state_id),
          city, i;

      if(! cities.length || ! +city_id) return;

      for(i = 0; i < cities.length; i++){
        if(cities[i].clave_municipio == city_id){
          city = cities[i];
          break;
        }
      }
      district_map_center = [+city.lat, +city.lng];
    },

    draw_polygon : function(map){
      var coords = [];
      current_polygon.forEach(function(point){
        coords.push(new google.maps.LatLng(point[1], point[0]));
      });

      district_polygon = new google.maps.Polygon({
        paths: coords,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35
      });

      console.log(coords, district_polygon, map);
      district_polygon.setMap(map);
    },

    // current_polygon

    //
    // [ T H E   G O O G L E   L O C A T I O N S   M A P ]
    // ---------------------------------------------------
    //

    initialize_locations_map : function(center){
      var mapOptions = {
        center : center,
        zoom : 15
      };
      google_location_map = new google.maps.Map(locations_map, mapOptions);
    },

    get_geolocation_from_google : function(address){
      var d    = current_district_data,
          that = this,
      location = [address, d.city.nombre, d.state.nombre, "México"].join();
      
      google_geocoder.geocode({address : location}, function(results, status){
        if(status == google.maps.GeocoderStatus.OK){
          that.initialize_locations_map(results[0].geometry.location);
        }
        else{
          console.log("fail fail fail");
        }
      });
    }
  };

  //
  // [ R I G   T H E   U I ]
  // -----------------------
  //
  state_selector.onchange = app.set_cities;
  city_selector.onchange  = app.set_district_map_center;
  geolocation_btn.onclick = app.get_geolocation();

  //
  // [ R E T U R N   T H E   A P P ]
  // -------------------------------
  //
  return app;
};



// inicia el API
app = new APP();

app.get_states();
app.get_cities();
app.get_districts();





