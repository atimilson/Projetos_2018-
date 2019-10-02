<section class="espaco-interno-section"><!--INICIO Section de noticias secundarias-->
    <div class="row espaco" >
        <div class="col-md-9">
            <div class="row">




                <?php
                foreach ($noticias_tres as $noticia_tres => $value) {
                    ?>

                    <div class="col-md-4">
                        <a href="<?php echo base_url('postagem/') . ($value->id) ?>" >
                            <div class="card evento" style="width: 263px;">
                                <img class="card-img-top rounded" src="<?php echo base_url('galeria/') . $value->img; ?>" alt="Card image cap" width="263" height="165.52">
                                <div class="card-body">
                                    <p class="card-text"><?php echo substr($value->titulo, 0, 48) . '...' ?></p>
                                </div>
                            </div>
                        </a>
                        <hr/>
                    </div>


                    <?php
                }
                ?> 

                <!--COMEÇO DO CARROSEUL-->
                <!--COMEÇO DO CARROSEUL-->

                <div class="col-md-12 espaco-servico">

                    <ul class="nav nav-tabs titulo-serv" role="tablist">
                        <li class="nav-item alinhamento">
                            <p class="estilo-texto-servico">SERVIÇOS</p>
                        </li>
                        <!--                        <li class="nav-item">
                                                    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">SERVIÇOS</a>
                                                </li>                       -->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content fundo-tabela">
                        <div role="tabpanel" class="tab-pane fade in active show" id="profile">
                            <div class="row">
                                
                             <?php
                         
                        
                        foreach ($listas_servicos as $sevicos => $value) {
                           
                            if ($sevicos <= 6) {    
                                
                                ?> 
                                <div class="col-md-6 ">
                                    <a href="<?= $value->url ?>" title="<?= $value->descricao ?>">
                                        <div class="conteudo-servico acessos">
                                            <i class="material-icons" id="icon-servico">
                                                info
                                            </i>                                            
                                            <p class="tipo-servico"><?= $value->nome ?></p>
                                        </div>
                                    </a>
                                </div>
                                
                                <?php
                        
                        
                            }
                        } 
                                ?> 
                                
                               
                               
                                <div class="col-md-6 ">
                                    <a href="<?php echo base_url('home/menu_servico') ?>">
                                        <div class="conteudo-servico acessos">
                                            <i class="material-icons" id="icon-servico">
                                                add_box
                                            </i>                                          
                                            <p class="tipo-servico">Veja Mais Serviços</p>
                                        </div>
                                    </a>
                                </div>




                            </div>
                        </div>
                        <!--                        <div role="tabpanel" class="tab-pane fade" id="buzz">SERVIÇOS</div>                        -->
                    </div> 

                </div><!--FIM DA TABELA SERVIÇOS-->



                <!-- 4 - col md 6 -->
                <?php
                foreach ($noticias_quatro as $noticia_quatro => $value) {
                    ?>

                    <div class="col-md-6 espaco">
                       <a href="<?php echo base_url('postagem/') . ($value->id) ?>">
                           <div class="card evento">
                               <img class="card-img-top rounded card-quatro-noticia" style="float: left;" src="<?php echo base_url('galeria/') . $value->img; ?>" width="178" height="100" alt="Card image cap">
                               <div class="card-body" style="padding-bottom: 0px;">                
                                   <p class="card-text" style="margin-left: 170px;
                                      margin-top: -103px;"><?php echo substr($value->titulo, 0, 47) . '...' ?></p>
                               </div>
                           </div>
                       </a>
                   </div>

                    <?php
                }
                ?>



            </div>


            <div class="row justify-content-md-end btn-mais-noticias">
                <div class="col-md-6 estilo-mais-duvidas">
                    <a href="<?php echo base_url('postagens') ?>" class="link-mais-duvidas">
                        <img src="<?php echo base_url('assets/frontend/imagens/') ?>maisnoticia.svg" class="img-mais-duvidas"/>
                        <p class="links-frequentes">MAIS NOTICIAS</p>
                    </a>
                </div>                                        
            </div>

        </div>






