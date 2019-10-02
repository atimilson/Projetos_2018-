<div class="container">
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
    <a href="<?php echo base_url('postagem/') . ($noticia->id) ?>" style="background: rgba(0,0,0,0.6);">
            <div class="row margin-lista">
                <div class="col-md-4">
                    <img src="<?php echo base_url('galeria/') . $noticia->img ?>" width="306" height="172"/>
                </div>
                <div class="col-md-8 marginLado" style="color: #000;">                    
                    <p class="estilo-titulo-noticia"><?php echo $noticia->titulo ?>
                    </p>
                    <p class="estilo-subtitulo-noticia">
                        <?php echo $noticia->subtitulo ?>
                    </p>
                    <div class="publicacao">
                        <p class="notificacao">Por <?php echo $noticia->autor_noticia ?></p>

                        <?php
                        $date = new DateTime($noticia->data_publicacao);
                        ?>


                        <p class="notificacao"><i class="material-icons">
today
                    </i> <?php echo $date->format('d/m/Y') ?></p>
                    <p class="notificacao"><i class="material-icons">
query_builder
                    </i> <?php echo $date->format('H:i') ?></p>
                    </div>                   
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