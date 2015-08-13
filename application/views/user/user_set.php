
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Administrar Perfil</a></li>
        <li><a href="#tab_2" data-toggle="tab">Password</a></li>

        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div>
                <form role="form">
                    <div class="box box-primary">

                        <br> 

                        <!-- form start -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre de usuario</label>
                            <input type="user" class="form-control" id="exampleInputEmail1" value="<?php echo $username; ?>" placeholder="Ingrese usuario">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email; ?>" placeholder="Email">
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                </form>
            </div>
            <br>
            <div class="box box-primary">
                <br>



                <div class="form-group">
                    <!-- <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                     <img src="http://localhost/sportme/assets/admin/img/user_img.png" class="img-circle" alt="User Image">
                     <div id="image_preview"><img id="previewing" src="noimage.png" /></div>	
                     <br>
                     <label for="exampleInputFile">Cambiar imagen</label>
                   
                     <input type="file" id="file" name="file" />                   
                    -->
                    <div class="main">
                        <h3>Actualiza Imagen de Perfil</h3><br/>
                        <hr>
                        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                            <div id="image_preview"><img id="previewing" src="<?php echo base_url().$avatar;?>" /></div>	
                            <hr id="line">    
                            <div id="selectImage">
                                <label>Selecciona una imagen</label><br/>
                                <input type="file" name="file" id="file" required />
                            <input type="hidden" name="user_id"  value="<?php echo $user_id;?>" />
                            </div>                   
                   
                    </div> 
                    <h4 id='loading' style="display:none;position:absolute;top:50px;left:850px;font-size:25px;">loading...</h4>
                    <div id="message"> 			
                    </div>
                </div>

                <div class="box-footer">

                    <input type="submit" value="Upload" class="submit btn btn-primary" />
                </div>
     </form>		
            </div>


        </div>

    </div><!-- /.tab-pane -->
    <div class="tab-pane" id="tab_2">
        <!-- Formulario cambio clave -->
        <div class="">
            <form role="form">
                <div class="box-body">

                    <div class="form-group">
                        <label for="InputOldPassword">Clave actual</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" value="<?php ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="InputNewPassword">Nueva Clave</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" value="<?php ?>" placeholder="Ingrese clave">
                    </div>
                    <div class="form-group">
                        <label for="InputRepeteatNewPassword">Confirma Nueva Clave</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" value="<?php ?>" placeholder="Confirma clave">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>

                </div>
            </form>
        </div>
        <!--Fin formulario-->

    </div><!-- /.tab-pane -->
</div><!-- /.tab-content -->
</div>