<!-- Vista principal de pagina web usando Google maps -->
<!DOCTYPE HTML>
<html>
<head>
<?php
if($marcasTotal == 0)
{
?>
<!-- no hubo marcas -->
<?php
}
else
{
?>
<script src="http://maps.google.com/maps?file=api&amp;amp;v=2&amp;amp;key=[la API KEY]" type="text/javascript"></script>
<script type="text/javascript"> 
//<![CDATA[
  
    function load() {
      if (GBrowserIsCompatible())
      {
           var map = new GMap2(document.getElementById("map"));
     
         map.addControl(new GMapTypeControl());
           map.addControl(new GLargeMapControl());
           map.addControl(new GScaleControl());
         // map.addControl(new GOverviewMapControl());
           map.setCenter(new GLatLng(24.4359914, -102.00231), 5);
         // map.setMapType(G_HYBRID_TYPE);
    
         //EL ICONO
         var iconoMarca = new GIcon(G_DEFAULT_ICON);  // Icono por default que se mostrara
         iconoMarca.image = "statics/imgs/azul.png";  // ruta del icono
         var tamanoIcono = new GSize(17,17);          // Tamaño del icono
         iconoMarca.iconSize = tamanoIcono;
         iconoMarca.shadow = "statics/imgs/azul-2.png";  // Sombra de icono 
         var tamanoSombra = new GSize(22,18);         // Tamaño de la sombra
         iconoMarca.shadowSize = tamanoSombra;
         iconoMarca.iconAnchor = new GPoint(11, 16);     
    
          
    
         function createMarker(point, nombre, direccion, imagen)
         {
            //Creamos el infowindow dinamico para todas las marcas
            var marker = new GMarker(point, iconoMarca);
            GEvent.addListener(marker, 'click', function() {
            marker.openInfoWindowHtml("<span style='font-size: 8pt; font-family: verdana'>" + nombre + "<br>" + direccion + "</span><br><img src='" + imagen + "' /> ");
            });
            return marker;
         }
         /* Inicia ciclo de marcas */
         <?php 
         foreach($marcas as $mIndividual):
         ?>
            var point = new GPoint (<?php echo $mIndividual['lat']; ?>, <?php echo $mIndividual['lng']; ?>);
            var nombre = <?php echo $mIndividual['nombre']; ?>;
            var direccion = "<?php echo $mIndividual['direccion']; ?>";
            var imagen = "<?php echo $mIndividual['imagen']; ?>";
            var marker = createMarker (point, nombre, direccion , imagen);
            map.addOverlay(marker); 
         <?php 
         endforeach;
         ?>
    }
    window.onload=load
//]]>
</script> 
<?php
}
?>
  
</head>
 
<body>
<?php
if($marcasTotal == 0)
{
   $attributos = array('width' => '640px', 'height' => '480px');
?>
Por el momento no se encontraron marcas en la base de datos. <?php echo anchor_popup('mapas/nuevaMarca', 'Nueva marca en el mapa',$attributos)?>
<?php
}
else
{
?>
<div id="mapa" style="width: 765px; height: 470px;"></div>
<?php
}
?>
</body>
</html>