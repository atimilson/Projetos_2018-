<section><!--Section Duvidas frequentes e Serviços-->
    <div class="row espaco-tres-noticia">



        <?php
        foreach ($eventos_destaque as $evento_destaque) {
            ?>

            <div class="col-md-4 espaco">
                <a href="<?php echo base_url('postagem/eventos/') . ($evento_destaque->id) ?>">
                    <div class="card evento">
                        <img class="card-img-top rounded" src="<?php echo base_url('galeria/') . $evento_destaque->img; ?>" width="350" height="164.91" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $evento_destaque->titulo; ?></h5>
                            <p class="card-text"><?php echo $evento_destaque->subtitulo; ?></p>

                        </div>
                    </div>
                </a>
            </div>


            <?php
        }
        ?>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-6 estilo-mais-evento">
            <a href="<?php echo base_url('home/listar_evento') ?>" class="link-mais-duvidas">
                <img src="<?php echo base_url('/assets/frontend/imagens/maisnoticia.svg') ?>" class="img-mais-duvidas">
                <p class="links-frequentes">EVENTOS</p>
            </a>

        </div>                                        
    </div>
</section>

