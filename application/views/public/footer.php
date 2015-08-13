  <!--FOOTER SECTION -->
<footer class="page-footer" role="contentinfo">
        <div class="wrapper">
            <nav>
                <ul>
                    <li><a href="#">Información</a></li>
                    <li><a href="#">Asistencia</a></li>                    
                    <li><a href="#">Privacidad</a></li>
                    <li><a href="#">Condiciones</a></li>
                </ul>
            </nav>

            <p class="copyright">&copy; 2014 sportme</p>
        </div>
    </footer>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url();?>assets/public/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/public/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url();?>assets/public/js/custom.js"></script>
    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
