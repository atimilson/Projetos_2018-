<section style="padding-bottom: 10px;">
    <h3>Videos e Áudios</h3>
    <hr>
    <div class="row" style="margin-top: 10px;">
        <?php foreach ($listar_principal as $principal){ ?>
        <div class="col-12 col-sm-7 col-md-12 col-lg-6 col-xl-6" >
            <div class="video-destaque">
                <iframe width="100%" height="400" src="<?= $principal->url_preview ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
        <?php }


        ?>
        <div class="col-12 col-sm-7 col-md-12 col-lg-6 col-xl-6" >
            <div class="row">
                <?php
                foreach ($listar_segundaria as $segundaria){
                ?>
                <div class="col-12 col-sm-7 col-md-6 col-lg-6 col-xl-6" style="margin-bottom: 4px;">
                    <a href='<?= $segundaria->url_preview ?>'
                       class="lightview"
                       data-lightview-type="iframe"
                       data-lightview-options="
                       width: 638,
                       height: 360,
                       viewport: 'scale'
                       ">
                        <img src="<?= $segundaria->tumb_video ?>" width="255" height="135" style="border: 1px solid rgba(0,0,0,0.2); object-fit: cover">
                    </a>

                </div>
                <?php } ?>

              </div>

                 <div class="row" style="margin-top: 3px;">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div style="float:right;">
                                <a href="<?php echo base_url('Videos') ?>">
                                    <img style="float: left;" src="<?php echo base_url('/assets/frontend/imagens/maisnoticia.svg') ?>"/>
                                    <p style="float: right;margin-left: 3px;font: 15px nexablack;font-weight: bold;color: #232c77;margin-bottom: 0px;">VÍDEOS</p>
                                </a>
                            </div>
                        </div>
                    </div>

              <div class="row" style="margin-top:5px">
                  <?php 
                              
                              foreach ($listar_audios as $audios){
                  
                  ?>

                <div class="col-12 col-sm-7 col-md-6 col-lg-6 col-xl-6" >
                    <p class="titulo-audio"><?= $audios->titulo ?></p>
                    <p class="subtitulo-audio">Por: <?= $audios->nome_publicador_home ?></p>
                    <audio controls>
                        <source src="<?php echo base_url()?><?= $audios->caminho_arquivo ?>" type="audio/mp3" preload="auto" />
                        seu navegador não suporta HTML5
                    </audio>
                </div>
                              <?php } ?>
               
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div style="float:right;">
                        <a href="<?php echo base_url('Audios') ?>">
                            <img style="float: left;" src="<?php echo base_url('/assets/frontend/imagens/maisnoticia.svg') ?>"/>
                            <p style="float: right;margin-left: 3px;font: 15px nexablack;font-weight: bold;color: #232c77;">ÁUDIOS</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
