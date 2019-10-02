<section>
    <div class="row" style="margin-top: 10px;">
        <?php
        foreach ($eventos_destaque as $evento_destaque) {
            ?>
            <div class="col-12 col-sm-7 col-md-5 col-lg-4 col-xl-4 corpo-evento">
                <a href="<?php echo base_url('postagem/eventos/') . ($evento_destaque->id) ?>">
                    <div class="card foto-evento">
                        <img class="card-img-top" src="<?php echo base_url('galeria/imagensdestaque/thumb/') . substr($evento_destaque->img,16); ?>" alt="Card image cap" width="350" height="164">
                        <div class="card-body textos-eventos">
                            <p class="card-text tresNoticiasBody"><?php echo $evento_destaque->titulo ?></p>
                            
                        </div>
                    </div>
                </a>
            </div>                  
            <?php
        }
        ?>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div style="float:right;">
                <a href="<?php echo base_url('home/listar_evento') ?>">
                    <img style="float: left;" src="<?php echo base_url('/assets/frontend/imagens/maisnoticia.svg') ?>"/>
                    <p style="float: right;margin-left: 3px;font: 15px nexablack;font-weight: bold;color: #232c77;">EVENTOS</p>
                </a>
            </div>
        </div>

    </div>
</section>