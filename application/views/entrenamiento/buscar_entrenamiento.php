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
    <form   id="form_crear_proy"  method="post" role="form">

        <div class="box-body">
         
            <div class="input-group input-group-sm">
                                        <input type="text"  id="ubicacion" name="ubicacion"  class="form-control"  placeholder="Ingresa una dirección" >
                                        <span class="input-group-btn">
                                            <button type="button" id="pasar" class="btn btn-info btn-flat">Buscar</button>
                                        </span>
                                    </div>
          

            <section id="contact" class="map">


                <script type="text/javascript">
                    
              var marcasArray = new Array();
                    <?php 
                       if($entrenamientos){
                        $i=0;
			foreach($marcas as $mIndividual):
			?>
                       
			   var marca = {usuarioMarca: <?php echo "\"" . $mIndividual['usuarioMarca']. "\""  ?>,
                                        descMarca: <?php echo "\"" . $mIndividual['descMarca']. "\""  ?>,
                                        latMarca:<?php echo "\"" . $mIndividual['latMarca']. "\""  ?>,
                                        lngMarca:<?php echo "\"" . $mIndividual['lngMarca']. "\"" ?>,
                                        rutaMarca:<?php echo "\"" . $mIndividual['rutaMarca']. "\"" ?>,
                                        horaMarca:<?php echo "\"" . $mIndividual['horaMarca']. "\"" ?>,
                                        fechaMarca:<?php echo "\"" . $mIndividual['fechaMarca']. "\"" ?>,
                                        usuarioIdMarca:<?php echo "\"" . $mIndividual['usuarioIdMarca']. "\"" ?>,
                                        entrenamientoIdMarca:<?php echo "\"" . $mIndividual['entrenamientoIdMarca']. "\"" ?>,
                                        participaEntrenamientoMarca:<?php echo "\"" . $mIndividual['participaEntrenamientoMarca']. "\"" ?>};
                           marcasArray[<?php echo $i; ?>] = marca; 
			<?php 
                        $i++;
			endforeach;
                       }
                        ?>
                </script> 
               
                <div id="map_canvas" style="width: 35%px; height: 400px;"></div>
                
            </section>        
        </div><!-- /.box-body -->
    </form>
</div><!-- /.box -->
