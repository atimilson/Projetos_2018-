<div class="container container-img">
    <style type="text/css">
        .ajax-load{
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
    <?php
    foreach ($noticias_todos as $noticia) {
        ?>
        <a href="<?php echo base_url('postagem/') . ($noticia->id) ?>" class="link-noticia" style="background: rgba(0,0,0,0.6);">
            <div class="row margin-lista">
                <div>
                    <img class="foto-thumb" src="<?php echo base_url('galeria/') . $noticia->img ?>" width="306" height="172" />
                </div>
                <div class="col-12 col-sm-4 col-md-3 col-lg-6 col-xl-6 estrutura-noticia">
                    <p class="estilo-titulo-list-noticia">
                        <?php echo $noticia->titulo ?>
                    <p>

                    <p class="estilo-subtitulo-list-noticia">
                        <?php echo $noticia->subtitulo ?>
                    <p>
                    <p class="estilo-autor-list-noticia">Por:
                        <?php echo $noticia->autor_noticia ?>
                    </p>
                    <?php
                    $date = new DateTime($noticia->data_publicacao);
                    ?>
                    <p class="estilo-data-list-noticia">
                        <i class="fas fa-calendar-alt">
                            <?php echo $date->format('d/m/Y') ?>
                        </i>
                    </p>
                    <p class="estilo-hora-list-noticia">
                        <i class="far fa-clock">
                            <?php echo $date->format('H:i') ?>
                        </i>
                    </p>
                </div>
            </div>

        </a>
        <hr/>
        <?php
    }
    
    echo "<div class='paginacao'>".$links_paginacao."</div>" ;
    
    
    ?>

    <script type="text/javascript">

    </script>
