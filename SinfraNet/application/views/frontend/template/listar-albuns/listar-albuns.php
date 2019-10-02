
<div class="container marginCima" style="padding-bottom: 10px;">
    <h3>FOTOS </h3>
    <div class="row" style="margin-top: 10px;">
        
        <?php 
        
        foreach ($listar_albuns as $album){
        ?>

        <div class="col-12 col-sm-4 col-md-12 col-lg-12 col-xl-4" style="padding: 5px;">
            <a href="<?php echo base_url('fotos/fotos_albuns/').$album->id ?>">
                <div class="albuns">
                    <img src="<?= base_url().'galeria/album/'.$album->pasta.'/thumb/'.$album->nome_arquivo  ?>" width="100%" height="230"/>
                    <p class="titulo-albun"><?= $album->numero_fotos ?></p>
                    <div class="overlay"><?= $album->titulo ?></div>
                </div>     
            </a>
        </div>
        <?php } ?>
       

    </div>