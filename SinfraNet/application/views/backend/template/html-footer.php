        <!-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
        <!-- Bootstrap Js CDN -->


        <script type="text/javascript">

            $(function () {
              $('[data-toggle="popover"]').popover()
            })


            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });



    </script>

    <script>
    $(document).ready(function () {
        // show the alert

        $(".alert-dismissible").fadeTo(3000, 500).slideUp(500, function () {
            $(".alert-dismissible").alert('close');
        });
    });

</script>



</body>
</html>
