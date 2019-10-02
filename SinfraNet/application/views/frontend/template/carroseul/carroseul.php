<div class="container" style="margin-top: 10px;">
    <!--Começo da section do carroseul e dos acessos-->
    <section>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9" >

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        $result = 4;

                        for ($i = 0; $i < $result; $i++) {
                            if ($i == 0) {
                                ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="active"></li>
                            <?php } else {
                                ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                                <?php
                            }
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner" style="border-radius: 5px;">
                        <?php
                        $controle = 2;
                        foreach ($noticias_carrosel as $noticia_dest => $value) {
                            if ($noticia_dest <= 3) {
                                if ($controle == 2) {
                                    if ($value->img == '') {
                                        ?>
                                        <div class="carousel-item active">
                                            <a href="<?php echo base_url('postagem/') . ($value->id) ?>">
                                                <img class="d-block w-100 tamIMG" src="<?= base_url('assets/frontend/semfoto/semfoto2.png') ?>" alt="Third slide"/>
                                                <div class="titulocarroseul"><?php echo $value->titulo; ?></div>
                                            </a>
                                        </div>
                                    <?php } else {
                                        ?>
                                        <div class="carousel-item active">
                                            <a href="<?php echo base_url('postagem/') . ($value->id) ?>">
                                                <img class="d-block w-100 tamIMG" src="<?= base_url('galeria/imagensdestaque/thumb/') . substr($value->img,16) ?>" alt="Third slide"/>
                                                <div class="titulocarroseul"><?php echo $value->titulo; ?></div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    $controle = 1;
                                } else {

                                    if ($value->img == '') {
                                        ?>
                                        <div class="carousel-item ">
                                            <a href="<?php echo base_url('postagem/') . ($value->id) ?>">
                                                <img class="d-block w-100 tamIMG" src="<?= base_url('assets/frontend/semfoto/semfoto2.png') ?>" alt="Third slide" />
                                                <div class="titulocarroseul"><?php echo $value->titulo; ?></div>
                                            </a>
                                        </div>
                                    <?php } else {
                                        ?>
                                        <div class="carousel-item ">
                                            <a href="<?php echo base_url('postagem/') . ($value->id) ?>">
                                                <img class="d-block w-100 tamIMG" src="<?= base_url('galeria/imagensdestaque/thumb/') . substr($value->img,16) ?>" alt="Third slide" />
                                                <div class="titulocarroseul"><?php echo $value->titulo; ?></div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        }
                            ?>

                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div><!--FIM CARROSEUL INNER-->

                    </div>

                </div>