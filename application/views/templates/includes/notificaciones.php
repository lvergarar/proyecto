   <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning"><?php echo count($notificaciones); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Tienes <?php echo count($notificaciones); ?> notificaciones</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                       <!-- <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>-->
                                      <?php  if($notificaciones){
                   
                               $cont=1;      foreach ($notificaciones as $item) {         ?>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-check-square-o success"></i><?php echo $item['usuario']; ?> se unió a tu entrenamiento
                                            </a>
                                        </li>
                                      <?php } } ?>
                              <!--
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                      <!--  <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>-->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Ver todo</a></li>
                            </ul>
                        </li>