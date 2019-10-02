<div class="container" id="tamanho-container">
    <h2>Lista de videos</h2>
   

    <?php if (isset($_SESSION['mensage'])) { ?>
        <script>
            var mensagem = "<strong>Vídeo alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['mensage']);
    }
    ?>

    <?php if (isset($_SESSION['alterado'])) { ?>
        <script>
            var mensagem = "<strong>Vídeo alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Vídeo cadastrado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>
    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Vídeo excluido com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['excluido']);
    }
    ?>

    <?php if (isset($_SESSION['publicar'])) { ?>
        <script>
            var mensagem = "<strong>Vídeo publicado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['publicar']);
    }
    ?>

    <?php if (isset($_SESSION['desativar'])) { ?>
        <script>
            var mensagem = "<strong>Vídeo desativado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['desativar']);
    }
    ?>


    <!--    <div class="titulo-listar col-md-12">
    <?php
    $publicado = 0;
    $npublicado = 0;
    foreach ($listar_videos as $noticia_todos) {
        if ($noticia_todos->publicado == 1) {
            $publicado ++;
        } else {
            $npublicado ++;
        }
    }
    ?>

            <div class="listar-noticias col-md-4">Notícias Cadastradas: <?php echo count($noticias_todos) ?> </div>
            <div class="listar-noticias col-md-4">Notícias Publicadas: <?php echo $publicado ?></div>
            <div class="listar-noticias col-md-4">Notícias não Publicadas: <?php echo $npublicado ?></div>

            <div class="listar-noticias col-md-4">Notícias Caroussel: <?php
    foreach ($noticias_carrosel as $noticia_car) {
        echo "<a href='#noticia-" . $noticia_car->id . "'>" . $noticia_car->id . "</a>";
    }
    ?></div>
            <div class="listar-noticias col-md-4">Notícias Principais: <?php
    foreach ($noticias_princial as $noticia_prin) {
        echo "<a href='#noticia-" . $noticia_prin->id . "'>" . $noticia_prin->id . "</a>";
    }
    ?></div>
            <div class="listar-noticias col-md-4">Notícias Secundárias: <?php
    foreach ($noticias_secundaria as $noticia_sec) {
        echo "<a href='#noticia-" . $noticia_sec->id . "'>" . $noticia_sec->id . "</a>";
    }
    ?>

    <div class="row esp">
    <!-- inicio bloco de codigo php -->
    <?php
    foreach ($listar_videos as $videos) {
        ?>
        <div class="col-md-3 spaceNoticia" id="video-<?php echo $videos->id ?>">
            <div>
                <div style="float: left;color: #c1c0c0"><?= $videos->id ?></div>
                <div class="escolha">
                    <a class="pontos" data-toggle="modal" data-target="#modal-posi-<?php echo $videos->id ?>" href="#modal-posi-<?php echo $videos->id ?>">
                        <i class="material-icons">reorder</i>
                    </a>
                </div>

                <!--modal 'escoher posicionamento das noticias'-->
                <div class="modal fade" id="modal-posi-<?php echo $videos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content tamanho-modal">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Selecionar Posicionamento</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                                echo form_open('admin/video/alterar_posicao');
                                ?>
                                <?php echo form_error('check[]'); ?>
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check[1]"  <?php
                                        if ($videos->principal_home != null AND $videos->principal_home != 0) {
                                            echo 'checked';
                                        }
                                        ?> > <span class="label-text">Principal</span>
                                        <img src="<?php echo base_url('assets/backend/imagens/') ?>principal.svg" width="150" height="100"/></label>
                                </div>

                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check[2]" <?php
                                        if ($videos->segundaria_home != null AND $videos->segundaria_home != 0) {
                                            echo 'checked';
                                        }
                                        ?>> <span class="label-text">Secundário</span>
                                        <img src="<?php echo base_url('assets/backend/imagens/') ?>secundaria.svg" width="150" height="100"/></label>
                                </div>

                                <input type="hidden" name="id" value="<?php echo $videos->id ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="cancel-modal btn btn-default " data-dismiss="modal"><b>Cancelar</b></button>
                                <button type="submit" class="btn btn-success" ><b>Salvar</b></button>
                            </div>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
                <!--fim modal posicionamento das noticias-->

                <div class="card-img" align="center" >
                    <img src="<?= $videos->tumb_video ?>" width="100%" height="180">
                </div>
                <div class="limite-texto">
                    <p><?php echo substr($videos->titulo, 0, 65) . "..." ?></p>
    <!--                    <p><?php echo $videos->titulo ?></p>-->
                </div>
            </div>

            <!--            <div>
            <?php
            $date = new DateTime($videos->data_publicado);
            ?>
                                            <h6>Criado em : <?php echo $date->format('d-m-Y H:i:s') ?></h6>
                                        </div>-->

            <div class="row" style="padding-top: 25px;" align="center">
                <div class="col-md-3 margon">
                    <a href="<?= $videos->url_preview ?>" class="btn-preview" title="Preview">
                        <i class="material-icons centro-icon">remove_red_eye</i>
                    </a>
                </div>
                <?php if ($videos->publicado == 1) { ?>
                    <div class="col-md-3 margon">
                        <a href="modal" data-toggle="modal" data-target=".desativar-modal-<?= $videos->id ?>" class="btn-desativar" title="Desativar" >
                            <i class="material-icons centro-icon">block</i>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="col-md-3 margon">
                        <a href="modal" data-toggle="modal" data-target=".publicar-modal-<?= $videos->id ?>" class="btn-publicar" title="Publicar" >
                            <i class="material-icons centro-icon">send</i>
                        </a>
                    </div>
                <?php } ?>
                <!--  Modal para desativar noticia -->
                <div class="modal fade desativar-modal-<?= $videos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4>Confirmar desativação do Video <?= $videos->id ?> .</h4>
                            </div>
                            <div class="modal-body">

                                <p>Desativar o video, retira a visualização na página principal.</p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                <a type="button" href="<?php echo base_url('admin/video/desativar/') . $videos->id; ?>" class="btn btn-success" >
                                    Desativar
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- fim Modal para desativar noticia -->

                <!--  Modal para publicar noticia -->
                <div class="modal fade publicar-modal-<?= $videos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4>Confirmar Publicação do video <?= $videos->id ?>.</h4>
                            </div>
                            <div class="modal-body">
                                <p> A video <b><?= $videos->id ?></b> será publicado na página principal.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                <a type="button" href="<?php echo base_url('admin/video/publicar/') . $videos->id; ?>" class="btn btn-success" >
                                    Publicar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim  Modal para publicar noticia -->
                <div class="col-md-3 margon">
                    <a href="modal" data-toggle="modal" data-target="#editar_v-<?= $videos->id ?>" class="btn-editar-not" title="Editar" >
                        <i class="material-icons centro-icon">edit</i>
                    </a>
                </div>


                <div class="col-md-3 margon">
                    <a href="modal" data-toggle="modal" data-target=".excluir-modal-<?= $videos->id ?>" class="btn-excluir-not" title="Excluir" >
                        <i class="material-icons centro-icon">delete_forever</i>
                    </a>
                </div>

                <div class="modal fade excluir-modal-<?= $videos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4>Confirmar exclusão do Video <?= $videos->id ?> .</h4>
                            </div>
                            <div class="modal-body">
                                <p>O video será excluido do Sistema.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                <a type="button" class="btn btn-danger modal-excluir" href="<?php echo base_url('admin/video/excluir/') . $videos->id; ?>">Excluir </a>
                            </div>

                        </div>
                    </div>
                </div>
            


<div class="modal fade editar-video" id="editar_v-<?= $videos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php
            echo form_open('admin/video/alterar');
            ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4>Editar Video</h4>
            </div>
            
            <div class="modal-body" style="text-align: left">
                <?php
echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
?>
                
                 <label>URl do Video:</label>
                <input  type="text" class="form-control" name="video" id="video" value="<?= $videos->url_video ?>" required="required">
                
                <hr>




                <div class="form-check-inline" style="margin-top: 20px;">
                    <label>
                        <input type="checkbox" name="posicao[1]" <?php
                                        if ($videos->principal_home != null && $videos->principal_home != 0) {
                                            echo 'checked';
                                        }
                                        ?> > 
                        <span class="label-text">Principal</span>
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>principal.svg" width="150" height="100"/></label>
               
                    <label style=" margin-left: 20px;">
                        <input type="checkbox" name="posicao[2]"<?php
                                        if ($videos->segundaria_home != null && $videos->segundaria_home != 0) {
                                            echo 'checked';
                                        }
                                        ?>  > 
                        <span class="label-text">Secundário</span>
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>secundaria.svg" width="150" height="100"/></label>
                </div>
                <input type="hidden" name="id" id="id" value="<?= $videos->id ?>"/>
                <hr>
               <div class="form-check-inline" style="margin-top: 20px;">
                    <label>
                        <input type="checkbox" name="publicar" <?php
                                        if ($videos->publicado != null && $videos->publicado != 0) {
                                            echo 'checked';
                                        }
                                        ?>  > 
                        <span class="label-text">Publicar Vídeo ?</span>
                       </label>
               
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Alterar</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
        </div>
        <?php
    }
    ?>
    <!-- fim php -->

</div>
</div>
<div id="mybutton">
    <a class="btn-adicionar" href="modal" data-toggle="modal" data-target="#basicModal">
        <i class="material-icons" id="btn-addi">
            add
        </i>
    </a>
</div>
<div class="modal fade cadastro-video bd-example-modal-lg" id="basicModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php
            echo form_open('admin/video/salvar_publicacao');
            ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4>Cadastro de Video</h4>
            </div>
            <div class="modal-body">
<?php
echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
?>

                <label>URl do Video:</label>
                <input  type="text" class="form-control" name="video" id="video" value="<?php echo set_value('video') ?>" required="required">
                
                <hr>




                <div class="form-check-inline" style="margin-top: 20px;">
                    <label>
                        <input type="checkbox" name="posicao[1]" > 
                        <span class="label-text">Principal</span>
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>principal.svg" width="150" height="100"/></label>
               
                    <label style=" margin-left: 20px;">
                        <input type="checkbox" name="posicao[2]" > 
                        <span class="label-text">Secundário</span>
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>secundaria.svg" width="150" height="100"/></label>
                </div>
                <hr>
               <div class="form-check-inline" style="margin-top: 20px;">
                    <label>
                        <input type="checkbox" name="publicar"> 
                        <span class="label-text">Publicar Vídeo ?</span>
                       </label>
               
                    
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="modal-cancel btn btn-success" >Cadastrar</button>
            </div>
<?php
echo form_close();
?>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['item'])) { ?>
    <script>
        $('#basicModal').modal('show');

    </script>


    <?php
    unset($_SESSION['item']);
}
?>


<?php if (isset($_SESSION['alterar'])) { ?>
    <script>
        $('#editarModal-<?= $_SESSION['alterar'] ?>').modal('show');

    </script>



    <?php
    unset($_SESSION['alterar']);
}
?>

</div>
