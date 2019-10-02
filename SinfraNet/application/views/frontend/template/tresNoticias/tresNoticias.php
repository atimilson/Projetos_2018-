<section>
    <div class="row" style="margin-top: 10px;">

        <!--COLUNA DAS NOTICIAS SECUNDARIAS-->
        <div class="col-12 col-sm-12 col-md-9 col-lg-8 col-xl-9" >
            <!--LINHA DE CARDS-->
            <div class="row">
                <!--LINHA DE CARDS-->

                <?php
                foreach ($noticias_tres as $noticia_tres => $value) {
                    ?>

                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 tresNoticias" style="border-radius: 25rem!important;" >
                        <a href="<?php echo base_url('postagem/') . ($value->id) ?>">
                            <div class="card" style="width: 100%;">
                                <img class="card-img-top" src="<?php echo base_url('galeria/imagensdestaque/thumb/') . substr($value->img,16); ?>" alt="Card image cap" height="165.52" width="100%" border-radius:/>
                                <div class="card-body tresNoticiasBody">
                                    <p class="card-text"><?php echo $value->titulo ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                }
                ?> 