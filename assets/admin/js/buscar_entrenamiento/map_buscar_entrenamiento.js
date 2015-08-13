var map = null;
var infoWindow = null;
var marker = new google.maps.Marker();
var geocoder = null;
//var marcasArray = new Array();
var marcaObj = {};



function initialize() {

    var myLatlng = new google.maps.LatLng(20.68017, -101.35437);
    var myOptions = {
        zoom: 13,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    infoWindow = new google.maps.InfoWindow();
    google.maps.event.addListener(map, 'click', function () {
        closeInfoWindow();
    });


    for (var index = 0; index < marcasArray.length; index++) {

        createMarker(marcasArray[index].usuarioMarca, 
                     marcasArray[index].descMarca,
                     marcasArray[index].lngMarca,
                     marcasArray[index].latMarca,
                     marcasArray[index].rutaMarca,
                     marcasArray[index].horaMarca,
                     marcasArray[index].fechaMarca,
                     marcasArray[index].usuarioIdMarca,
                     marcasArray[index].entrenamientoIdMarca,
                     marcasArray[index].participaEntrenamientoMarca);
    }

    getGeolocation();
}

//funcion que traduce la direccion en coordenadas
function codeAddress() {

    //obtengo la direccion del formulario
    var address = document.getElementById("ubicacion").value;
   // console.log(address);
    //hago la llamada al geodecoder
    geocoder.geocode({'address': address}, function (results, status) {

        //si el estado de la llamado es OK
        if (status == google.maps.GeocoderStatus.OK) {
            //centro el mapa en las coordenadas obtenidas
            map.setCenter(results[0].geometry.location);
            //coloco el marcador en dichas coordenadas
            marker.setPosition(results[0].geometry.location);
            //actualizo el formulario      
            updatePosition(results[0].geometry.location);

            //Añado un listener para cuando el markador se termine de arrastrar
            //actualize el formulario con las nuevas coordenadas
            google.maps.event.addListener(marker, 'dragend', function () {
                
            });
        } else {
            //si no es OK devuelvo error
            alert("No podemos encontrar la direcci&oacute;n, error: " + status);
        }
    });
}

function getGeolocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Ups!! No hay Geolocalización para ti, intenta con un navegador más actualizado.");
    }
}

function showPosition(position) {
    //$('#latitude').text(position.coords.latitude);
    //$('#longitude').text(position.coords.longitude);
    var current_position = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    map.setZoom(15);
    map.setCenter(current_position);
    marker.setPosition(current_position);
    marker.setMap(map);
}



function closeInfoWindow() {
    infoWindow.close();
}


function createMarker(usuario, descripcion, lng, lat, ruta,hora,fecha,usuario_id,evento_id,participa_entrenamiento) {
   // console.log(participa_entrenamiento);

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat, lng),
        map: map,
    });
    google.maps.event.addListener(marker, 'dragstart', function () {
        closeInfoWindow();
    });
    google.maps.event.addListener(marker, 'dragend', function () {
        openInfoWindow(marker, usuario, descripcion,ruta,hora,fecha,evento_id,participa_entrenamiento);
    });
    google.maps.event.addListener(marker, 'click', function () {
        openInfoWindow(marker, usuario, descripcion,ruta,hora,fecha,evento_id,participa_entrenamiento);
    });
}

function openInfoWindow(marker, usuario, descripcion,ruta,hora,fecha,evento_id,participa_entrenamiento) {
   // console.log("par" +participa_entrenamiento);
    var markerLatLng = marker.getPosition();
   //Genero path con coordenadas de ruta o polyline
   ruta = ruta.replace(/\s+/g, '|'); //Reemplaza espacios por pipe
   ruta = ruta.substr(0,ruta.length - 1); 
   var button_participa = "";
    if(participa_entrenamiento=='si'){
    button_participa ='<input id="unirse'+evento_id+'"  value="Participando" type="button" class="btn btn-success">';
   }else{
     button_participa ='<input id="unirse'+evento_id+'" onclick="unirse_entrenamiento('+evento_id+')" value="Unirse" type="button" class="btn btn-success">';   
   }
     //descripcion = descripcion.replace(/\s+/g, '</br>'); //Reemplaza espacios por pipe
   
  
    infoWindow.setContent([
      
       '<div class="box-body">\
                                    <dl class="dl-horizontal">\
                                      <dt> <img src="http://maps.googleapis.com/maps/api/staticmap?path='+ruta+'&zoom=13&size=200x200&zoom=8&sensor=false"></dt>\
                                        <dd>Entrenamiento publicado por: '+usuario+' <br/><i class="fa fa-fw fa-clock-o"></i> '+fecha+'<br/><br/> '+descripcion+'<br/><br/>'+button_participa+'</dd></dl>\                                </div>'
    ].join(''));
    infoWindow.open(map, marker);
}




jQuery(document).ready(function () {
    initialize();
    jQuery('#pasar').click(function(){
	        codeAddress();
	        return false;
	     });
});

