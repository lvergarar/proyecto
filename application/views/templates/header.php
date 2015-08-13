   <body class="skin-sportme">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
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
                     <?php //   require_once("includes_header/notificaciones.php")?> 
                     <?php //   require_once("includes_header/tareas.php")?> 
                     <?php require_once 'includes_header/user.php';?>
                    </ul>
                </div>
            </nav>
        </header>