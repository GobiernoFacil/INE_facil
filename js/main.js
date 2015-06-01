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
      district_map_container  = document.querySelector("#district-map-container"),
      locations_map_container = document.querySelector("#city-map-container"),
      district_map        = document.querySelector("#district-map-container .map"),
      locations_map       = document.querySelector("#city-map-container .map"),
      candidate_container = document.querySelector("#district-candidates-container ul"),
      location_container  = document.querySelector("#locations-map-container"),
      geolocation_btn     = document.querySelector("a.location"),
      modal_background    = document.querySelector("div.ine-overlay"),
      modal_container     = document.querySelector("div.modal"),
      modal               = document.querySelector("#diputable_info"),
      close_modal_btn     = document.querySelector(".close_modal"),
      candidates_title    = document.querySelector("#district-candidates-container h2"),
      casilla_title    	  = document.querySelector(".casilla h2"),
      casilla_lead    	  = document.querySelector(".casilla .lead"),
  
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
      google_markers_array  = [],
      google_district_map   = null,
      google_location_map   = null,
      google_geocoder       = new google.maps.Geocoder(),
      google_polygon        = null,
      google_polygon_marker = null,
      district_key          = null,
      current_location      = null,
      current_location_key  = null,
      current_polygon       = null,
      current_state         = null,
      current_city          = null,
      current_district      = null,
      current_district_data = null,
  // [ SET THE HANDLEBARS TEMPLATES ]
      candidate_source   = document.querySelector("#template-candidate").innerHTML,
      candidate_template = Handlebars.compile(candidate_source),
      candidate_full_src = document.querySelector("#template-candidate-modal").innerHTML,
      candidate_full_tmp = Handlebars.compile(candidate_full_src),
      location_source    = document.querySelector("#template-location").innerHTML,
      location_template  = Handlebars.compile(location_source),
      title_source       = document.querySelector("#template-title").innerHTML,
      title_template     = Handlebars.compile(title_source),
      app;

  //
  // D E F I N E   T H E   A P P
  // --------------------------------------------------------------------------------
  //
  app = {

    // /-------------------------------------------\
    // | G E O L O C A L I Z E   T H E   S T U F F |
    // \-------------------------------------------/ 
    //

    // [ GET LOCATION ]
    // ----------------
    //
    get_geolocation : function(){
      // obtiene la ubicación mediante el API de geolocalización HTML5
      navigator.geolocation.getCurrentPosition(app.success_geolocation);
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
    
    // /--------------------------------------\
    // | C A L L   T H E   "Don Pato"   A P I |
    // \--------------------------------------/ 
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
        // this._draw_polygon(google_district_map);
        this._draw_markers(google_district_map, current_district_data.cities);
      }

      // se inicia el mapa de casilla, en caso de que no se haya iniciado aún
      if(! google_location_map){
        this.initialize_locations_map();
      }
      else{
        google_location_map.setCenter({
          lat: district_map_center[0], 
          lng: district_map_center[1]
        });
        this._draw_polygon(google_location_map);
      }

      // se manda a llamar la información de candidatos y de casilla
      this.get("candidate", [district_key]);
      this.get("location", [current_location]);

      var _title_data = {
        district : current_district_data.district,
        state    : current_district_data.state.nombre,
        city     : current_district_data.city.nombre
      }
      candidates_title.innerHTML = title_template(_title_data);
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

      // se comienza a generar el HTML para la sección de funcionarios de casilla
      html = '<div class="col-sm-5"><h3>Ubicación de la Casilla</h3>';
      html += '<h3 class="address">' + address + "</h3>";
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

      // se geolocaliza el chisme este.
      // ACTUALIZACIÓN: Ya no se geolocaliza :P
      // this.get_geolocation_from_google(address);
    },

    // [ FUCK! ]
    // ---------
    //
    error : function(conn){
      // cuando algo falla al mandar a llamar al api de don pato, esto
      // es lo que se ejecuta
      console.log(error);
    },

    // /----------------------------------------------------------\
    // | T H E   L O C A T I O N   S E L E C T O R  - S T A T E S |
    // \----------------------------------------------------------/ 
    //

    // [ LOAD THE STATE LIST ]
    // -----------------------
    //
    get_states : function(){
      // carga el archivo de estados y manda a llamar a la
      // función que llena el selector de estado
      var that = this;
      d3.csv(states_csv, null, function(error, rows){
        states_array = rows;
        that.set_states(rows);
      });
    },

    // [ FILL THE STATE SELECTOR ]
    // ---------------------------
    //
    set_states : function(states){
      // después de obtener la lista de estados, se llena el 
      // selector de estado. Al inicio de la lista, se agrega 
      // una entrada para la frase "selecciona estado"
      states.unshift({clave_entidad : 0, nombre:"selecciona un estado", url : ""});
      states.forEach(function(value, index, array){
        var option = document.createElement('option');
        var text   = document.createTextNode(value.nombre);
        option.appendChild(text);
        option.setAttribute("value", value.clave_entidad);
        state_selector.appendChild(option);
      });
    },

    // /----------------------------------------------------------\
    // | T H E   L O C A T I O N   S E L E C T O R  - C I T I E S |
    // \----------------------------------------------------------/ 
    //

    // [ LOAD THE CITY LIST ]
    // ----------------------
    //
    get_cities : function(){
      var that = this;
      d3.csv(cities_csv, null, function(error, rows){
        cities_array = rows;
        that.map_cities(rows);
      });
    },

    // [ MAP THE CITIES ]
    // ------------------
    //
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

    // [ FILL THE CITY SELECTOR ]
    // --------------------------
    //
    set_cities : function(e){
      // actualiza la lista de ciudades. La variable que recibe puede
      // ser un evento o el id del destado. Con este id, obtiene la 
      // lista de municipios y actualiza el apuntador de estado
      var state_id = typeof e === "object" ? e.currentTarget.value : e,
          _cities  = app.get_cities_by_state(state_id);

      current_state = state_id;

      // a la lista de ciudades agrega la leyenda "selecciona un municipio"
      _cities.unshift({
        clave_entidad : 0, 
        clave_municipio:0, 
        nombre : "selecciona un municipio"
      });

      // vacía el <select>, y luego genera un <option> para 
      // cada ciudad
      city_selector.innerHTML = "";
      _cities.forEach(function(value, index, array){
        var option = document.createElement('option');
        var text   = document.createTextNode(value.nombre);
        option.appendChild(text);
        option.setAttribute("value", value.clave_municipio);
        city_selector.appendChild(option);
      });
    },

    // [ SELECT A CITY ]
    // -----------------
    //
    set_city : function(e){
      var city_id    = typeof e === "object" ? e.currentTarget.value : e,
      state_displace = cities_map_array[current_state - 1][0],
      city_object    = cities_array[+state_displace+(city_id-1)];

      current_city = city_id;

      this.get("search", [+city_object.lat, +city_object.lng]);
    },

    // [ GET CITIES BY STATE ]
    // -----------------------
    //
    get_cities_by_state : function(state_id){
      if(! +state_id) return [];

      var x  = cities_map_array[+state_id - 1],
      cities = cities_array.slice(x[0], x[0] + x[1]);
      return cities;
    },

    // /-----------------------------------\
    // | T H E   D I S T R I C T   D A T A |
    // \-----------------------------------/ 
    //

    // [ LOAD THE DISTRICT LIST ]
    // --------------------------
    //
    get_districts : function(){
      var that = this;
      d3.csv(districts_csv, null, function(error, rows){
        districts_array = rows;
        that.map_districts(rows);
      });
    },

    // [ MAP THE CITY ]
    // ----------------
    //
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

    // [ GET THE CITIES FROM THE DISTRICT ]
    // ------------------------------------
    //
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

    // /---------------------------------------------------\
    // | T H E   G O O G L E   M A P S   F U N C T I O N S |
    // \---------------------------------------------------/ 
    //

    // [ INITIALIZE THE DISTRICT MAP ]
    // -------------------------------
    //
    initialize_district_map : function(e){
      var center = {lat : district_map_center[0],lng : district_map_center[1]};
      
      google_district_map = this._draw_map(center, 15, district_map);
      console.log(this._draw_markers,google_district_map, current_district_data.cities);
      // this._draw_polygon(google_district_map);
      this._draw_markers(google_district_map, current_district_data.cities);
      district_map_container.className = "open";
      candidates_title.className 	   = "live";
      casilla_title.className 	   = "live";
      casilla_lead.className 	   = "lead show";
    },

    // [ INITIALIZE THE LOCATION MAP ]
    // -------------------------------
    //
    initialize_locations_map : function(){
      var center = {lat : district_map_center[0],lng : district_map_center[1]};
      google_location_map = this._draw_map(center, 15, locations_map);
      this._draw_polygon(google_location_map);
      locations_map_container.className = "open";
    },

    // [ DRAW MAP ]
    // ------------
    //
    _draw_map : function(point, zoom, element){
      var mapOptions = {
        center : point,
        zoom : zoom,
        scrollwheel :false
      };
      return new google.maps.Map(element, mapOptions);
    },

    // [ DRAW POLYGON ]
    // ----------------
    //
    _draw_polygon : function(map){
      var coords = [],
          that   = this, 
          center = {lat : district_map_center[0],lng : district_map_center[1]};

      if(google_polygon_marker) google_polygon_marker.setMap(null);


      google_polygon_marker = new google.maps.Marker({
        position: new google.maps.LatLng(+center.lat, +center.lng),
        map: map,
        draggable:true
      });

      current_polygon.forEach(function(point){
        coords.push(new google.maps.LatLng(point[1], point[0]));
      });

      if(google_polygon) google_polygon.setMap(null);

      google_polygon = new google.maps.Polygon({
        paths: coords,
        strokeColor: '#FF3B77',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF3B77',
        fillOpacity: 0.35
      });

      google_polygon.setMap(map);
      //this._set_bounds(map, coords);

      google.maps.event.addListener(google_polygon_marker,'dragend',function(event){
        that.get("search", [event.latLng.lat(), event.latLng.lng()]);
      });
    },

    // [ DRAW MARKERS ]
    // ----------------
    //
    _draw_markers : function(map, cities){
      console.log("markers!!!");
      var points = [];
      google_markers_array.forEach(function(el){
        el.setMap(null);
      });

      cities.forEach(function(city){
        var infowindow = new google.maps.InfoWindow({
          content: city.nombre
        }),
        point  = new google.maps.LatLng(+city.lat, +city.lng),
        marker = new google.maps.Marker({
          position: point,
          map: map,
          title: city.nombre,
          visible : true
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
        });

        google_markers_array.push(marker);
        points.push(point);

        if(current_city == city.clave_municipio) infowindow.open(map,marker);
      });
      this._set_bounds(map, points);
    },

    // [ SET BOUNDS ]
    // ----------------
    //
    _set_bounds : function(map, points){
      console.log(map, points);
      var bounds = new google.maps.LatLngBounds();

      points.forEach(function(point){
        bounds.extend(point);
      });

      map.fitBounds(bounds);
    },

    // [ GEOLOCATE FROM GOOGLE ]
    // -------------------------
    //
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
    },

    // /-------------------------------\
    // | T H E   M O D A L   S T U F F |
    // \-------------------------------/ 
    //

    // [ SHOW THE MODAL ]
    // ------------------
    //
    set_modal : function(e){
      var candidate_id = e.delegateTarget.getAttribute("data-index"),
          _candidate   = candidates_array[candidate_id],
          html         = candidate_full_tmp(_candidate);
      
      modal.innerHTML = html;

      modal_background.style.visibility = "visible";
      modal_background.style.opacity = 1;
      modal_container.style.visibility = "visible";
      modal_container.querySelector(".md-content").style.opacity = 1;
    },

    // [ CLOSE THE MODAL ]
    // -------------------
    //
    close_modal : function(){
      modal_container.querySelector(".md-content").style.opacity = 0;
      modal_background.style.opacity = 0;
      modal_background.style.visibility = "hidden";
      modal_container.style.visibility = "hidden";
      modal.innerHTML = "";
    }
  };

  // [ FILTER THE DIV WITH THE MODAL ID ]
  // ------------------------------------
  //
  var is_candidate = function(el){
    return el.getAttribute('data-index');
  }

  // [ THE DELEGATE HELPER ]
  // -----------------------
  //
  var delegate = function(criteria, listener, scope){
    return function(e){
      var el = e.target;
      do{
        if(!criteria(el)) continue;
        e.delegateTarget = el;
        listener.apply(scope, arguments);
        return;
      } while((el = el.parentNode));
    }
  }

  // /---------------------\
  // | R I G   T H E   U I |
  // \---------------------/ 
  //
  state_selector.onchange = app.set_cities;
  city_selector.onchange  = app.set_city.bind(app);
  geolocation_btn.onclick = app.get_geolocation;
  candidate_container.addEventListener('click', delegate(is_candidate, app.set_modal, app));
  close_modal_btn.onclick = app.close_modal;


  // /-----------------------------\
  // | R E T U R N   T H E   A P P |
  // \-----------------------------/ 
  //
  return app;
};



// inicia el API
app = new APP();

app.get_states();
app.get_cities();
app.get_districts();





