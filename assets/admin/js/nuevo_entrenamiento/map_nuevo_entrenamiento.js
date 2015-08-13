var map = null;
var drawingManager = null;
var infoWindow = null;
var poly;
var marker = null;
var coordenadas_ruta = "";


function initialize() {

    /*
     function openInfoWindow(marker) {
     var markerLatLng = marker.getPosition();
     infoWindow.setContent([
     '<strong>La posicion del marcador es:</strong><br/>',
     markerLatLng.lat(),
     ', ',
     markerLatLng.lng(),
     '<br/>Arrástrame para actualizar la posición.'
     ].join(''));
     infoWindow.open(map, marker);
     }
     */

    var myLatlng = new google.maps.LatLng(-33.4691199, -70.641997);
    var myOptions = {
        zoom: 13,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    // infoWindow = new google.maps.InfoWindow();

    /*  drawingManager = new google.maps.drawing.DrawingManager();
     drawingManager.setOptions({
     drawingControlOptions: {
     position: google.maps.ControlPosition.TOP_CENTER,
     drawingModes: [google.maps.drawing.OverlayType.POLYLINE]
     }
     });
     drawingManager.setMap(map);*/

    getGeolocation();
    crearPolyline();






}

function addLatLng(event) {

    var path = poly.getPath();
    // console.log("path"+path);
    // Because path is an MVCArray, we can simply append a new coordinate
    // and it will automatically appear.

    path.push(event.latLng);
    //console.log(path);
    getPath();

}

//Funci{ion que acorta num de metros
function zeroPad(num, pad) {
    var pd = Math.pow(10, pad);
    return Math.floor(num * pd) / pd;
}
function calcularDistancia(coordenadas) {


    var coordenas_separadas = coordenadas.split(' '); //Corto el string con las coordenadas de la polyline
    var distancia = new Array();
    var myArray = null;
    var myArray2 = null;
    var distanciaFinal = null;

    for (var i = 1; i < coordenas_separadas.length; i++) {

        var myArray = coordenas_separadas[i - 1].split(','); //Origen
        var myArray2 = coordenas_separadas[i].split(','); //Destino

        var origens = new google.maps.LatLng(myArray[0], myArray[1]);
        var destinos = new google.maps.LatLng(myArray2[0], myArray2[1]);
        distancia[i - 1] = google.maps.geometry.spherical.computeDistanceBetween(origens, destinos);

    }


    for (var i = 0; i < distancia.length; i++) {
        if (!isNaN(distancia[i])) {
            distanciaFinal += distancia[i];

        }
    }


    var km = zeroPad(distanciaFinal / 1000, 1);
    var metro = zeroPad(distanciaFinal, 1);
    $("#distancia").html(metro + " Metros / "+km + " KM ");
    

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
    /* marker.setPosition(current_position);
     marker.setMap(map);*/

}




function removerPolyline() {

    poly.setMap(null);
    $("#ruta_entrenamiento").val("");
    $("#distancia").html("");
    crearPolyline();

}


function crearPolyline() {

     var polyOptions = {
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 3,
        editable: true,
        draggable: true
    };


    poly = new google.maps.Polyline(polyOptions);
    poly.setMap(map);

    // Add a listener for the click event
    google.maps.event.addListener(map, 'click', addLatLng);
    google.maps.event.addListener(map, 'dragend', addLatLng);
    google.maps.event.addListener(poly, "dragend", getPath);
    google.maps.event.addListener(poly.getPath(), "insert_at", getPath);
    google.maps.event.addListener(poly.getPath(), "remove_at", getPath);
    google.maps.event.addListener(poly.getPath(), "set_at", getPath);

}

function reiniciarMapa() {
    map = null;
    $("#distancia").html("");
    $("#ruta_entrenamiento").val("");
    initialize();


}

function getPath() {
    var path = poly.getPath();
    console.log("path "+path);
    var len = path.getLength();
    var coordStr = "";
    var last_coordenada = null;
    var first_coordenada = null;
    for (var i = 0; i < len; i++) {
        if (i == (len - 1)) {
            last_coordenada = path.getAt(i).toUrlValue(6);
        }
        coordStr += path.getAt(i).toUrlValue(6) + " ";
    }

    first_coordenada = path.getAt(0).toUrlValue(6);
    //  console.log(last_coordenada);
    // console.log(coordStr);
    coordenadas_ruta = null;
    coordenadas_ruta = coordStr;

    if (first_coordenada != last_coordenada) {
        calcularDistancia(coordStr);
    }
    $("#ruta_entrenamiento").val(coordStr);
}

jQuery(document).ready(function () {
    initialize();
});
