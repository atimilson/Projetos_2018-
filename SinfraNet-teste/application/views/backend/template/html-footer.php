 

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
</footer>

</div>
<!-- ./wrapper -->



<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->

<script src="<?php echo base_url('assets/backend/Admin/bower_components/jquery/dist/')?>jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!--<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
<script src="<?php echo base_url('assets/backend/Admin/bower_components/bootstrap/dist/js/')?>bootstrap.min.js"></script>
<!-- AdminLTE App -->
<!--<script src="dist/js/adminlte.min.js"></script>-->




<script src="<?php echo base_url('assets/backend/Admin/dist/js/')?>adminlte.min.js" ></script>


<script>
    $(document).ready(function(){
        // show the alert

        $(".alert-dismissible").fadeTo(3000, 500).slideUp(500, function () {
            $(".alert-dismissible").alert('close');
        });
    });

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
