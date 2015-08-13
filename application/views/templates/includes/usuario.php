   <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                         <!--   <a href="">
                                <i class="glyphicon glyphicon-off"></i>
                                <span>Desconectar <!-- <i class="caret"></i></span>
--                            </a>-->
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span> <?php echo $username; ?> <i class="caret"></i></span>
                            </a>
                           <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url().$avatar;?>" class="img-circle" alt="User Image" />
                                    <p>
                                      <?php echo $username; ?> 
                                        <small></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                            <!--  <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Amigos</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#"></a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Amigos</a>
                                    </div>-->
                                </li>
                                <!-- Menu Footer-->
                               <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url();?>actualizar_datos_usuario" class="btn btn-default btn-flat">Actualizar Datos</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url();?>logout" class="btn btn-default btn-flat">Desconectar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>