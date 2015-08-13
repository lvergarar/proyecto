    <!-- general form elements -->
        <div class="alert alert-info alert-dismissable alerta"  style="display:none">  
            <i class="fa fa-info"></i>

                                <div id="ex10errors"></div>
                                </div>

                            <div class="box">
                               
                             
                                <!-- form start -->
                                <form   id="form_crear_proy"  method="post" role="form">
                                   
                                    <div class="box-body">
                                            <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <input type="text" id="ot" name="descripcion"  data-bvalidator="required" data-bvalidator-msg="Debe ingresar la descripcion"   class="form-control solonum"   placeholder="Ingresa OC" tabindex="0">
                                        </div>
                                      
                                      
                                       <label for="fecha evento">Fecha</label>
                                       <div class="input-group">
                                           
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="fecha_ingreso" data-bvalidator="required" data-bvalidator-msg="Debe ingresar la fecha"  id="date" tabindex="5">
                                        </div>
                                          
                                        <label for="fecha evento">Hora</label>
                                       <div class="input-group">
                                           
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control timepicker" name="fecha_ingreso" data-bvalidator="required" data-bvalidator-msg="Debe ingresar la fecha"  id="date" tabindex="5">
                                        </div>
                                
                                      
                                   
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                       
                                          <input id="btn_crea_proy" class="btn btn-primary btn_form" type="button" onclick="crear_proyecto();" value="Crear" />
                                       
                                    </div>
                                    
                                </form>
                            </div><!-- /.box -->
                            