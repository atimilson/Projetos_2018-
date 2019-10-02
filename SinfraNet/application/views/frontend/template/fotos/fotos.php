<section style="padding-bottom: 50px;">
    <h3>Fotos</h3>
    <hr>
    <div class="row" style="margin-top: 10px;">
        <div class="col-12 col-sm-7 col-md-6 col-lg-6 col-xl-6" >
            <?php 
            
           
            
            foreach ($listar_albuns as $albuns => $album){
                
            if ($albuns < 1){
            ?>
            <a href="<?php echo base_url('fotos/fotos_albuns/').$album->id ?>">
                <div class="foto-index-front">         
                    <img src="<?= base_url().'galeria/album/'.$album->pasta.'/thumb/'.$album->nome_arquivo ?>" height="385" width="100%" style="object-fit: cover" />
                    <p class="titulo-albun-index-front"><?= $album->numero_fotos ?></p>
                    <div class="overlay-index-front"><?= $album->titulo ?></div>
                </div>      
            </a>
            
            <?php } } ?>
        </div>
        <div class="col-12 col-sm-7 col-md-6 col-lg-6 col-xl-6" >
            <div class="row">
                
                <?php 
            
            
            
            foreach ($listar_albuns as $albuns => $album){
            if ($albuns > 0 && $albuns < 5){
                
            ?>
                
                <div class="col-12 col-sm-7 col-md-6 col-lg-6 col-xl-6" style="margin-bottom: 4px;">
                    <a href="<?php echo base_url('fotos/fotos_albuns/').$album->id ?>">
                        <div class="foto-index-front">
                            <img width="255" height="190" src="<?= base_url().'galeria/album/'.$album->pasta.'/thumb/'.$album->nome_arquivo ?>" style="object-fit: cover"/>                    
                            <p class="titulo-albun-index-front"><?= $album->numero_fotos ?></p>
                            <div class="overlay-index-front"><?= $album->titulo ?></div>
                        </div>
                    </a>
                </div>
               

                 <?php } } ?>
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div style="float:right;">
                        <a href="<?php echo base_url('fotos') ?>">
                            <img style="float: left;" src="<?php echo base_url('/assets/frontend/imagens/maisnoticia.svg') ?>"/>
                            <p style="float: right;margin-left: 3px;font: 15px nexablack;font-weight: bold;color: #232c77;">FOTOS</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>