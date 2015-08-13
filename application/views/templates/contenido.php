 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      <?php  echo $titulo; ?>
                    </h1>
                    <ol class="breadcrumb">
                        <?php //  echo $breadcrumbs; ?>
                        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                     
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    
                <?php $this->load->view($contenido);?>
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->