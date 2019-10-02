<div class="container" id="tamanho-container">
    <h2>Lista de audios</h2>

    <?php if (isset($_SESSION['mensage'])) { ?>
        <script>
            var mensagem = "<strong>Audio alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['mensage']);
    }
    ?>

    <?php if (isset($_SESSION['alterado'])) { ?>
        <script>
            var mensagem = "<strong>Audio alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Audio cadastrado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>
    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Audio excluido com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['excluido']);
    }
    ?>

    <?php if (isset($_SESSION['publicar'])) { ?>
        <script>
            var mensagem = "<strong>Audio publicado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['publicar']);
    }
    ?>

    <?php if (isset($_SESSION['desativar'])) { ?>
        <script>
            var mensagem = "<strong>Audio desativado com sucesso!</strong>";
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

    foreach ($noticias_todos as $noticia_todos) {
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
    ?></div>



        </div>-->

    <div class="row esp">
        <!-- inicio bloco de codigo php -->
        <?php


            
        foreach ($listar_audios as $audio) {
            ?>
        <div class="col-md-3 spaceNoticia" id="audio-<?php echo $audio->id ?>" style="min-height: 237px;">
                <div>
                    <div style="float: left;color: #c1c0c0"><?= $audio->id ?></div>




                    <div class="card-img" align="center" >
                        <audio controls>

                            <source src="<?php echo base_url().$audio->caminho_arquivo  ?>" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="limite-texto">
                        <p><?php echo substr($audio->titulo, 0, 60) . "..." ?></p>
                    </div>
                </div>

                <div>
                    <?php
                    $date = new DateTime($audio->data_cadastro);
                    ?>
                    <h6>Criado em : <?php echo $date->format('d-m-Y H:i:s') ?></h6>
                </div>

                <div class="row" style="padding-top: 25px;" align="center">
                    <?php if ($audio->publicado == 1) { ?>
                        <div class="col-md-3 margon">
                            <a href="modal" data-toggle="modal" data-target=".desativar-modal-<?= $audio->id ?>" class="btn-desativar" title="Desativar" >
                                <i class="material-icons centro-icon">block</i>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-3 margon">
                            <a href="modal" data-toggle="modal" data-target=".publicar-modal-<?= $audio->id ?>" class="btn-publicar" title="Publicar" >
                                <i class="material-icons centro-icon">send</i>
                            </a>
                        </div>
                    <?php } ?>
                    <!--  Modal para desativar noticia -->
                    <div class="modal fade desativar-modal-<?= $audio->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar desativação do Video <?= $audio->id ?> .</h4>
                                </div>
                                <div class="modal-body">

                                    <p>Desativar o video, retira a visualização na página principal.</p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href="<?php echo base_url('admin/audio/desativar/') . $audio->id; ?>" class="btn btn-success" >
                                        Desativar
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- fim Modal para desativar noticia -->

                    <!--  Modal para publicar noticia -->
                    <div class="modal fade publicar-modal-<?= $audio->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar Publicação do video <?= $audio->id ?>.</h4>
                                </div>
                                <div class="modal-body">

                                    <p> A video <b><?= $audio->id ?></b> será publicado na página principal.</p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href="<?php echo base_url('admin/audio/publicar/') . $audio->id; ?>" class="btn btn-success" >
                                        Publicar
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Fim  Modal para publicar noticia -->
                    <div class="col-md-3 margon">
                        <a href="#editarModal-<?= $audio->id ?>" data-toggle="modal" data-target="#editarModal-<?= $audio->id ?>" class="btn-editar-not" title="Editar" >
                            <i class="material-icons centro-icon">edit</i>
                        </a>
                    </div>


                    <div class="col-md-3 margon">
                        <a href="modal" data-toggle="modal" data-target=".excluir-modal-<?= $audio->id ?>" class="btn-excluir-not" title="Excluir" >
                            <i class="material-icons centro-icon">delete_forever</i>
                        </a>
                    </div>

                    <div class="modal fade excluir-modal-<?= $audio->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar exclusão do Video <?= $audio->id ?> .</h4>
                                </div>
                                <div class="modal-body">
                                    <p>O video será excluido do Sistema.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" class="btn btn-danger modal-excluir" href="<?php echo base_url('admin/audio/excluir/') . $audio->id ?>">Excluir </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



    <div class="modal fade editar-video" tabindex="-1" role="dialog" aria-hidden="true" id="editarModal-<?= $audio->id ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
              <?php
           echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
        echo form_open_multipart('admin/audio/alterar');
        ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4>Editar Audio</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                           <label>Titulo do Áudio</label>
                           <input type="text" class="form-control" name="titulo_edit" id="titulo_edit" required="required" value="<?= $audio->titulo ?>">
                           <label for="exampleFormControlFile1">Áudio</label>
                           <input type="hidden" value="<?= $audio->id ?>" name="id">
                           <input type="file" class="form-control-file" id="audio_file_edit" name="audio_file_edit" >
                       </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" >Cadastrar</button>
                </div>

                <?php
                echo form_close();
                ?>
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
</div>


<div id="mybutton">
    <a class="btn-adicionar" href="modal" data-toggle="modal" data-target=".cadastro-video">
        <i class="material-icons" id="btn-addi">
            add
        </i>
    </a>
</div>
<div class="modal fade cadastro-video" tabindex="-1" role="dialog" aria-hidden="true" id="basicModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          <?php
       echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
    echo form_open_multipart('admin/audio/inserir');
    ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4>Cadastro de Áudio</h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                        <label>Titulo do Áudio</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" required="required">
                        <label for="exampleFormControlFile1">Áudio</label>
                        <input type="file" class="form-control-file" id="poster-principal" name="poster-principal" required="TRUE">
                        <div id="result" />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" href="#">Cadastrar</button>
            </div>

        </div>

            <?php
            echo form_close();
            ?>
    </div>
</div>
</div>
<!--<script type='text/javascript'>
       $(window).load(function(){
       $('#poster-principal').change(function(){
           var files = $('input#poster-principal')[0].files;
           var names = "";
           $.each(files,function(i, file){
              names += '<div class="alert alert-success" role="alert">'+file.name + '</div>';
           });
           document.getElementById("result").innerHTML = names;
       });
       });

   </script>-->

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
