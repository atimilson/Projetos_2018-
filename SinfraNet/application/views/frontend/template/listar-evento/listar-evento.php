<div class="container">
    <style type="text/css">
        .ajax-load{
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
    <?php
    foreach ($eventos_todos as $evento) {
        ?>
        <a href="<?php echo base_url('postagem/eventos/') . ($evento->id) ?>" class="link-noticia" style="background: rgba(0,0,0,0.6);">
            <div class="row margin-lista">
                <div>
                    <img class="foto-thumb" src="<?php echo base_url('galeria/') . $evento->img ?>" width="306" height="172"/>
                </div>
                <div class="col-12 col-sm-4 col-md-3 col-lg-6 col-xl-6 estrutura-noticia">
                    <p class="estilo-titulo-list-noticia">
                        <?php echo $evento->titulo ?>
                    <p>

                    <p class="estilo-subtitulo-list-noticia">
                        <?php echo $evento->subtitulo ?>
                    <p>
                    <p class="estilo-autor-list-noticia">Por:
                        <?php echo $evento->autor_noticia ?>
                    </p>
                    <?php
                    $date = new DateTime($evento->data_publicacao);
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
    ?>

    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });


        function loadMoreData(page) {
            $.ajax(
                    {
                        url: '?page=' + page,
                        type: "get",
                        beforeSend: function ()
                        {
                            $('.ajax-load').show();
                        }
                    })
                    .done(function (data)
                    {
                        if (data == " ") {
                            $('.ajax-load').html("No more records found");
                            return;
                        }
                        $('.ajax-load').hide();
                        $("#post-data").append(data);
                    })
                    .fail(function (jqXHR, ajaxOptions, thrownError)
                    {
                        alert('server not responding...');
                    });
        }
    </script>