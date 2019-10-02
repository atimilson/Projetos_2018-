
<!--INICIO MAIS LIDAS-->
<div class="row ultimasTitulo" style=" margin-left: 0;margin-right: 0;margin-top: 10px;">
    <div class="titulo-ultimasNoticias" style="border-bottom: 2px solid rgba(0,0,0,0.4);">
        <img src="<?php echo base_url('assets/frontend/imagens/') ?>maislidas.svg" class="img-fluid" alt="Responsive image">
        MAIS LIDAS
    </div>

    <?php
    foreach ($mais_lidos as $mais_lidas) {
        ?>
        <div class="col-12 col-sm-4 col-md-12 col-lg-12 col-xl-12 corpoUltimasNoticias">
            <a href="<?php echo base_url('postagem/') . ($mais_lidas->id) ?>">
                <div class="ultimasNoticias">                                        
                    <p class="limiteTexto tituloNoticia"><?php echo $mais_lidas->titulo ?></p>
  
                </div>
            </a>                                
        </div>

        <?php
    }
    ?>
</div>
<!--FIM MAIS LIDAS-->


</div>
</div>
</section>