<div class="container" id="tamanho-container">

    <!-- mensagem validação topo da pagina -->
    <?php if (isset($_SESSION['alterado'])) { ?>

        <script>
            var mensagem = "<strong>Evento alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Evento cadastrado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>
    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Evento excluido com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>

    <?php if (isset($_SESSION['publicar'])) { ?>
        <script>
            var mensagem = "<strong>Evento Publicado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['publicar']);
    }
    ?>

    <?php if (isset($_SESSION['desativar'])) { ?>
        <script>
            var mensagem = "<strong>Evento Desativado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['desativar']);
    }
    ?>
    <!-- fim mensagem validação topo da pagina -->
    <?php
    $publicado = 0;
    $npublicado = 0;

    foreach ($eventos_todos as $evento_todos) {
        if ($evento_todos->publicado == 1) {
            $publicado ++;
        } else {
            $npublicado ++;
        }
    }
    ?>



    <div class="titulo-listar col-md-12">
        <div class="listar-noticias">Eventos Cadastrados: <?php echo count($eventos_todos) ?></div>
        <div class="listar-noticias">Eventos Publicados: <?php echo $publicado ?></div>
        <div class="listar-noticias">Eventos não Publicados: <?php echo $npublicado ?></div>

    </div>

    <div class="row esp">  

        <!-- inicio bloco de codigo php -->
        <?php
        foreach ($eventos_todos as $evento_todos) {
            ?>
            <div class="col-md-3 spaceNoticia" id="espaco-evento-<?= $evento_todos->id ?>">

                <div id="evento-<?= $evento_todos->id ?> ">

                    <div align="center" class="card-img-evento">
                        <div  style="float: left;color: #c1c0c0;clear: right"><?= $evento_todos->id ?></div>
                        <?php if ($evento_todos->img == '') { ?>

                            <img src="<?php echo base_url('assets/backend/semfoto/') ?>semFoto.png" class="css-foto"/>
                            <?php
                        } else {
                            ?>
                            <img src="<?php echo base_url('galeria/') . $evento_todos->img ?>" class="css-foto"/>
                            <?php
                        }
                        
                            
                            
                             if($evento_todos->publicado == 1){
                            echo '<span><h4>Publicado</h4></span>';
                        }
                        
                    ?>
                    </div>
                    <div class="limite-texto">
                        <p><?php echo substr($evento_todos->titulo, 0, 40) . "..." ?></p> 
                        <p><i><?php echo substr($evento_todos->subtitulo, 0, 27) . "..." ?></i></p>
                    </div>
                </div>

                <div style="margin-top: 49px">
                    <?php
                    $date = new DateTime($evento_todos->data_evento);
                    ?>
                    <h6>Criado em : <?php echo $date->format('d-m-Y H:i:s') ?></h6>
                </div> 


                <div class="row" style="padding-top: 25px;" align="center">
                    <div class="col-md-3 margon">
                        <a href="<?php echo base_url('admin/evento/preview/') . $evento_todos->id; ?>" class="btn-preview" title="Preview">
                            <i class="material-icons centro-icon">remove_red_eye</i>
                        </a>
                    </div>
                    <?php if ($evento_todos->publicado == 1) { ?>
                        <div class="col-md-3 margon">
                            <a href="modal" data-toggle="modal" data-target=".desativar-modal-<?= $evento_todos->id ?>" class="btn-desativar" title="Desativar">
                                <i class="material-icons centro-icon">block</i>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-3 margon">
                            <a href="modal" data-toggle="modal" data-target=".publicar-modal-<?= $evento_todos->id ?>" class="btn-publicar" title="Publicar">
                                <i class="material-icons centro-icon">send</i>
                            </a>
                        </div>

                    <?php } ?>     

                    <!--  Modal para desativar noticia -->
                    <div class="modal fade desativar-modal-<?= $evento_todos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar desativação do Evento <?= $evento_todos->id ?>.</h4>
                                </div>
                                <div class="modal-body">



                                    <p>Desativar o Evento, retira a visualização da página principal.</p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href="<?php echo base_url('admin/evento/desativar/') . $evento_todos->id; ?>" class="btn btn-success" >

                                        Desativar Evento
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- fim Modal para desativar noticia -->




                    <!--  Modal para publicar noticia -->
                    <div class="modal fade publicar-modal-<?= $evento_todos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar Publicão do Evento <?= $evento_todos->id ?>.</h4>
                                </div>
                                <div class="modal-body">
                                    <p> O Evento <b><?= $evento_todos->id ?></b> será publicado na página principal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href="<?php echo base_url('admin/evento/publicar/') . $evento_todos->id; ?>" class="btn btn-success" >
                                        Publicar
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Fim  Modal para publicar noticia -->








                    <div class="col-md-3 margon">
                        <a href="<?php echo base_url('admin/evento/alterar/') . $evento_todos->id; ?>" class="btn-editar-not" title="Editar">
                            <i class="material-icons centro-icon">edit</i>
                        </a> 
                    </div>
                    <div class="col-md-3 margon">
                        <a href="modal" data-toggle="modal" data-target=".excluir-modal-<?= $evento_todos->id ?>" class="btn-excluir-not" title="Excluir">
                            <i class="material-icons centro-icon">delete_forever</i>
                        </a> 
                    </div>
                    
                    <!-- excluir modal -->
                    <div class="modal fade excluir-modal-<?= $evento_todos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar exclusão do Evento <?= $evento_todos->id ?>.</h4>
                                </div>
                                <div class="modal-body">

                                    <p>O Evento será excluido do sistema.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" class="btn btn-danger modal-excluir" href="<?php echo base_url('admin/evento/excluir/') . $evento_todos->id; ?>">Excluir</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- fim excluir modal -->

                </div>


            </div>

            <?php
        }
        ?>
        <!-- fim php -->


    </div>

</div>
</div>
<div id="mybutton">
    <a class="btn-adicionar" href="<?php echo base_url('admin/evento/form_inserir') ?>">

        <i class="material-icons" id="btn-addi">
            add
        </i>
        <!--        <button class="feedback">
        </button>-->
    </a>
</div>
</div>