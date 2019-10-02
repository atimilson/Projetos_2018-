<div class="row espaco-titulos">
    <div class="col-md-12">
        <div class="img-mais-lidas"></div>
        <div class="titulo-ult-noticia">MAIS LIDAS</div>
    </div>                                    
</div>
<!--
<div class="row">
        <div class="col-md-12">
            <div class="tamanho-img"></div>
            <div class="titulo-ult-noticia">ÚLTIMAS NOTICIAS</div>
        </div>                                    
    </div><!--FIM TITULO
-->




<div>
    <div class="row espaco-ultnoticias" >
        <?php 
foreach ($mais_lidos as $mais_lidas){


?>
        <a href="<?php echo base_url('postagem/').($mais_lidas->id) ?>">
            <div class="col-md-12 estilo-titulo-noticia">
                <p class=""><?php echo substr($mais_lidas->titulo,0,27).'...' ?></p>
            </div>
            <div class="col-md-12 estilo-subtitulo-noticia">
                <p><?php echo substr($mais_lidas->subtitulo,0,33)."..."; ?></p>
            </div>
        </a>
    <?php
}

?>
    </div>  
</div>


