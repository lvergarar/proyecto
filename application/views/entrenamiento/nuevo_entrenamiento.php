<!-- general form elements -->
<div class="alert alert-info alert-dismissable alerta"  style="display:none">  
    <i class="fa fa-info"></i>
    <div id="ex10errors"></div>
</div>

<div class="box box-primary">
    <div class="box-header  ">
        <h3 class="box-title"><?php echo $subtitulo; ?></h3>
    </div><!-- /.box-header -->

    <!-- form start -->
    <form   id="form_nuevo_entrenamiento"  method="post" role="form">

        <div class="box-body">
            
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion"  class="form-control"  
                       placeholder="" tabindex="0" aria-required="true" size="70" maxlength="70"   data-msg-required="Ingresa una descipción del evento (70 caracteres)" required/>
            </div>


            <label for="fecha evento">¿Cuándo?</label>
            <div class="input-group">

                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
        
                <input type="text" class="form-control calendario" name="fecha_entrenamiento"
                       data-bvalidator="required" data-bvalidator-msg="Debe ingresar la fecha" 
                       id="fecha_nuevo_entrenamiento"  data-msg-required="Ingresa una fecha el entrenamiento" tabindex="1" aria-required="true" required/>
                 
            </div>

            <label for="fecha evento">Hora</label>
            <div class="input-group">

                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
				
                <input type="text" class="form-control" name="hora_entrenamiento"                    
                       id="hora_entrenamiento" tabindex="2"  data-msg-required="Ingresa una hora para el entrenamiento" aria-required="true" required/>
            </div></br>
            <input type="button" value="Remover Ruta" onclick="removerPolyline();" > 
            <input type="button" value="Reiniciar Mapa" onclick="reiniciarMapa();" > 
            <label for="fecha evento">Genera ruta del entrenamiento</label>
            <label for="distancia"  style="float:right;" id="distancia"></label>
        
            <section id="contact" class="map">
                <input type="hidden" style="opacity:0.1;border:none;color:white;" class="form-control" name="ruta_entrenamiento"                    
                       id="ruta_entrenamiento" value="" data-msg-required="Ingresa una fecha el entrenamiento"  aria-required="true" required/>
                <div id="map_canvas" style="width: 35%px; height: 400px;"></div>
            </section>  
            <br>
            
  <div class="input-group">
                  <input  onclick="crear_entrenamiento();" type=button value="Crear Entrenamiento">
            </div>
    
              
        </div><!-- /.box-body -->
    </form>
</div><!-- /.box -->
