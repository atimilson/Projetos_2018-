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
        <a href="<?php echo base_url('postagem/eventos/') . ($evento->id) ?>">
            <div class="row margin-lista">
                <div class="col-md-4">
                    <img src="<?php echo base_url('galeria/') . $evento->img ?>" width="306" height="172"/>
                </div>
                <div class="col-md-8 marginLado">                    
                    <p><?php echo $evento->titulo ?>
                    </p>
                    <p>
                        <?php echo $evento->subtitulo ?>
                    </p>
                    <div class="publicacao">
                        <p class="notificacao">Por <?php echo $evento->autor_noticia ?></p>

                        <?php
                        $date = new DateTime($evento->data_publicacao);
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