<div class="col-md-3">
    <div class="row">
        <div class="col-md-12">
            <div class="tamanho-img"></div>
            <div class="titulo-ult-noticia">ÚLTIMAS NOTICIAS</div>
        </div>                                    
    </div><!--FIM TITULO-->
    <div>
        <div class="row espaco-ultnoticias" >
            <?php 
            foreach ($noticias_destaque as $noticia_corpo => $value){
             if($noticia_corpo <= 2){
            ?>
            <a href="<?php echo base_url('postagem/').($value->id) ?>">
                <div class="col-md-12 estilo-titulo-noticia">
                    <p class=""><?php echo substr($value->titulo,0,27).'...' ?></p>
                </div>
                <div class="col-md-12 estilo-subtitulo-noticia">
                    <p><?php echo substr($value->subtitulo,0,33)."..."; ?></p>
                </div>
            </a>
          <?php
            }
            }
            ?>
          
        </div>        
    </div>
