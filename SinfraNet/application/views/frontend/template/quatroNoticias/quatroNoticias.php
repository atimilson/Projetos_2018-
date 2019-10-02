<!--INICIO QUATRO NOTICIAS-->
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 servicos fundo-quatro" >

    <div class="row" style="margin-left: 0;margin-right: 0;">

        <?php
        foreach ($noticias_quatro as $noticia_quatro => $value) {
            ?>

            <div class="col-12 col-sm-4 col-md-3 col-lg-6 col-xl-6 quatroNoticia">
                <a href="<?php echo base_url('postagem/') . ($value->id) ?>">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top foto-globo" style="" src="<?php echo base_url('galeria/imagensdestaque/thumb/') . substr($value->img,16); ?>" alt="Card image cap" height="133.5"/>
                        <div class="card-body text-globo texto-respon">
                            <p class="card-text texto-duas-noticias respon-txt" ><?php echo $value->titulo?> </p>
                        </div>
                    </div>
                </a>
            </div>

            <?php
        }
        ?>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div style="float:right;">
            <a href="<?php echo base_url('postagens') ?>">
                <img style="float: left;" src="<?php echo base_url('/assets/frontend/imagens/maisnoticia.svg') ?>" >
                <p style="float: right;margin-left: 3px;font: 15px nexablack; font-weight: bold;color: #232c77;">NOTICIAS</p>
            </a>
        </div>
    </div>
</div>

<!--FIM QUATRO NOTICIAS -->
</div>

</div>
<!--FIM NOTICIAS E SERVICOS-->