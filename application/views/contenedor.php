<?php $this->load->view("templates/includes/header"); ?>  
<body class="skin-sportme">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="<?php echo base_url() ?>" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <i class="fa fa-map-marker color-red"></i>  SPORTME
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <?php //   require_once("includes_header/mensajes.php")?>
                    <?php    require_once("templates/includes/notificaciones.php")?> 
                    <?php //   require_once("includes_header/tareas.php")?> 
             <?php $this->load->view("templates/includes/usuario"); ?>  
                </ul>
            </div>
        </nav>
    </header>
       <?php $this->load->view("templates/includes/left_side"); ?>  
    
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">                
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php //echo $titulo; ?>
            </h1>
            <ol class="breadcrumb">
                <?php //  echo $breadcrumbs; ?>
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php   
            
       
         
                  $this->load->view($contenido); ?>         
             </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<?php $this->load->view("templates/includes/footer"); ?>  