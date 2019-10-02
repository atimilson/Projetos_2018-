    

<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/') ?>ramal.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/') ?>repositorio.js"></script> 
<script src="<?php echo base_url('assets/frontend/js/') ?>jquery-3.3.1.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/') ?>galeria.js"></script> 


<script type="text/javascript">

    $("nav div").click(function () {
        $("ul").slideToggle();
        $("ul ul").css("display", "none");
    });

    $("ul li").click(function () {
        $("ul ul").slideUp();
        $(this).find('ul').slideToggle();
    });

    $(window).resize(function () {
        if ($(window).width() > 768) {
            $("ul").removeAttr('style');
        }
    });

</script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/') ?>swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/lightView/js/spinners/') ?>spinners.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/frontend/lightView/js/lightview/') ?>lightview.js"></script> 


<script src="<?php echo base_url('assets/frontend/js/') ?>popper.min.js"></script>
<script src="<?php echo base_url('assets/frontend/js/') ?>bootstrap.min.js"></script>
</body>
</html>