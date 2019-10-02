<div class="container margin-container" id="posissao-rodape">
    <section><!--INICIO Section de noticias principais-->
        <div class="row">

            <!--COMEÇO DO CARROSEUL DE NOTICIA-->
            <div class="col-md-9">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators estilizar-buttons">
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
                    <div class="carousel-inner">
                        <!--                        <div class="carousel-item active back-carroseul-noticia">
                                                    <a href="#" class="titulocarroseul">                                
                                                        <div class="link-noticia">
                                                            <div class="carrosel">
                                                                <p>Quem é, da onde vem, o que faz, e para onde vai.</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>-->

                        <?php
                        $controle = 2;
                        
                        foreach ($noticias_carrosel as $noticia_dest => $value) {

                            if ($noticia_dest <= 3) {


                                if ($controle == 2) {

                                    if ($value->img == '') {
                                        ?>
                                        <div class="carousel-item back-carroseul-noticia rounded active" style="background-image: url('<?= base_url('assets/frontend/semfoto/semfoto2.png') ?>')">


                                        <?php } else {
                                            ?>
                                            <div class="carousel-item back-carroseul-noticia rounded active" style="background-image: url('<?= base_url('galeria/') . $value->img ?>')"> 

                                                <?php
                                            }
                                            ?>
                                            <a href="<?php echo base_url('postagem/') . ($value->id) ?>" class="titulocarroseul">                                
                                                <div class="link-noticia">
                                                    <div class="carrosel">
                                                        <p><?php echo $value->titulo; ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                        $controle = 1;
                                    } else {

                                        if ($value->img == '') {
                                            ?>
                                            <div class="carousel-item back-carroseul-noticia rounded" style="background-image: url('<?= base_url('assets/frontend/semfoto/semfoto2.png') ?>')">


                                                <?php
                                            } else {
                                                ?>    
                                                <div class="carousel-item back-carroseul-noticia rounded" style="background-image: url('<?= base_url('galeria/') . $value->img ?>')"> 
                                                    <?php
                                                }
                                                ?>
                                                <a href="<?php echo base_url('postagem/') . ($value->id) ?>" class="titulocarroseul">                                
                                                    <div class="link-noticia">
                                                        <div class="carrosel">
                                                            <p><?php echo $value->titulo; ?></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>

                            </div>


                        </div>
                        <!--FIM CARROSEUL-->
                    </div>

                    <div class="col-md-3 sem-padding-left"><!--Começo TITULO acessos-->
                        <div class="row">
                            <div class="col-md-12 sem-padding-left">
                                <div class="titulo-acessos"></div>
                                <div class="estilo-texto-acesso">ACESSOS</div>
                            </div>                                    
                        </div><!--FIM TITULO-->

                        <div class="row">
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="https://aquisicoes.gestao.mt.gov.br/sgc/faces/pub/seguranca/LoginPageForm.jsp;jsessionid=516673B1DB1773E1A6F861BAB261368D.compras3" target="_blank" title="SIAG">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>siag.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="http://pjeinstitucional.tjmt.jus.br/" target="_blank" title="PROCESSO JUDICIAL ELETRÔNICO">        
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>pje.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                 <a href="http://www.gestao.mt.gov.br/index.php" target="_blank" title="SEGES">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>seges.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="http://webponto.gestao.mt.gov.br/Account/Login.aspx" target="_blank" title="WEB PONTO">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>web_ponto.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="https://aquisicoes.gestao.mt.gov.br/sigacontrato/subsystems/principal/pages/home.jsf" target="_blank" title="SIAG-C">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>siag-c.svg"/>
                                </a>
                            </div>


                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="https://www.fiplan.mt.gov.br:8443/" target="_blank" title="FIPLAN">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>fiplan.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="http://sigpat.sad.mt.gov.br/asi/apresentacao/IndexASI.html" target="_blank" title="SIGPAT">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>sigpat.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="https://gmail.com" target="_blank" title="GMAIL">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>gmail.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                 <a href="http://www.protocolo.sad.mt.gov.br/acessogeral/logon.php" target="_blank" title="PROTOCOLO">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>protocolo.svg"/>
                                </a>
                            </div>

                            <div class="col-md-3 sem-padding-left margin-cima">
                                 <a href="http://atendimento.sinfra.mt.gov.br/otrs/index.pl" target="_blank" title="OTRS">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>otrs.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="#" title="SEAP">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>seap.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="#" title="SAG">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>sag.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="http://fethabmt.sinfra.mt.gov.br/precf/" title="FETHAB" target="_blank">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>fethab.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="http://maparodoviario.sinfra.mt.gov.br/SisMapaRodoviario/" title="MAPA RODOVIÁRIO" target="_blank">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>mapaRodo.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="<?php echo base_url('home/ramal')?>" title="RAMAIS">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>ramais.svg"/>
                                </a>
                            </div>
                            <div class="col-md-3 sem-padding-left margin-cima">
                                <a href="<?php echo base_url('home/outros_acessos')?>" title="OUTROS ACESSOS">
                                    <img class="tamanho-icones" src="<?php echo base_url('assets/frontend/imagens/') ?>outros.svg"/>
                                </a>
                            </div>









                        </div>
                    </div>
                </div>
                </section><!--FIM Section de noticias principais-->