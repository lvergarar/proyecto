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
                                   
                                    <!--<div class="box-body">
                                            <div class="form-group">
                                            <label for="ubicacion">Ubicación</label>
                                            <input type="text" id="ot" name="ubicacion"  data-bvalidator="required" data-bvalidator-msg="Ingresa una dirección"   class="form-control"   placeholder="Ingresa una dirección" tabindex="0">
                                        </div>-->
                                        
                                            <section id="contact" class="map">
        <!--<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small>
        </iframe>-->
        <script type="text/javascript">
		var centreGot = false;
	</script>
	<?php echo $map['js']; ?>
        <?php echo $map['html']; ?>
    </section>
                                   
                                      
                                   
                                    </div><!-- /.box-body -->

                                  <!--  <div class="box-footer">
                                       
                                          <input id="btn_crea_proy" class="btn btn-primary btn_form" type="button" onclick="crear_proyecto();" value="Crear" />
                                       
                                    </div>-->
                                    
                                </form>
                            </div><!-- /.box -->
                            