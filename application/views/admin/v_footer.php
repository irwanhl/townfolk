      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
          <center><strong>Copyright &copy; 2015 Townfolk Jurnalist</strong> All rights reserved.</center>
      </footer>
    </div><!-- ./wrapper -->        
        <!-- jQuery 2.1.3 -->
    <script src="<?php echo $assets_url;?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo $assets_url;?>js/bootstrap.min.js"></script>
    <!--<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->   
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo $assets_url;?>plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo $assets_url;?>plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo $assets_url;?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_url;?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo $assets_url;?>plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?php echo $assets_url;?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo $assets_url;?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo $assets_url;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo $assets_url;?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo $assets_url;?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo $assets_url;?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $assets_url;?>js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo $assets_url;?>js/fungsi.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo $assets_url;?>js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo $assets_url;?>js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo $assets_url;?>plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo $assets_url;?>plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
            $("#example1").dataTable();
            $("#example2").dataTable();
    </script>
    
    <script>
        $('input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="month"], input[type="time"], input[type="week"]').each(function() {
                var el = this, type = $(el).attr('type');
                if ($(el).val() == '') $(el).attr('type', 'text');
                $(el).focus(function() {
                    $(el).attr('type', type);
                    el.click();
                });
                $(el).blur(function() {
                    if ($(el).val() == '') $(el).attr('type', 'text');
                });
            });
    </script>
    </body>
</html>