<!--<div class="col-12 col-sm-12 col-md-3 col-lg-4 col-xl-3">aki é o começo da col-3 que compoe as ultimas noticias mais lidas e aniver
   -->
    <!--INICIO ULTIMAS NOTICIAS-->
    <div class="row ultimasTitulo" style=" margin-left: 0;margin-right: 0;">
       
        <div class="titulo-ultimasNoticias" style="border-bottom: 2px solid rgba(0,0,0,0.4);">
            <img src="<?php echo base_url('assets/frontend/imagens/')?>ultimas.svg" class="img-fluid" alt="Responsive image">
            ÚLTIMAS NOTICIAS
        </div>
        
        <?php 
        foreach ($noticias_destaque as $noticia_corpo => $value){
           if($noticia_corpo <= 2){
            ?>

            <div class="col-12 col-sm-4 col-md-12 col-lg-12 col-xl-12 corpoUltimasNoticias">
                <a href="<?php echo base_url('postagem/').($value->id) ?>">
                    <div class="ultimasNoticias">                                        
                        <p class="limiteTexto tituloNoticia"><?php echo $value->titulo ?></p>
                      
                    </div>
                </a>                                
            </div>
            
            <?php
        }
    }
    ?>

</div>
<!--FIM ULTIMAS NOTICIAS-->
