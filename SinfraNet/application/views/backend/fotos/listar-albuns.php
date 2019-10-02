<div class="container" id="tamanho-container">
    <h2>Lista de Albuns</h2>

    <?php if (isset($_SESSION['mensage'])) { ?>
        <script>
            var mensagem = "<strong>Album alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['mensage']);
    }
    ?>

    <?php if (isset($_SESSION['alterado'])) { ?>
        <script>
            var mensagem = "<strong>Album alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Album cadastrado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>
    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Album excluido com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['excluido']);
    }
    ?>

    <?php if (isset($_SESSION['publicar'])) { ?>
        <script>
            var mensagem = "<strong>Album publicado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['publicar']);
    }
    ?>

    <?php if (isset($_SESSION['desativar'])) { ?>
        <script>
            var mensagem = "<strong>Album desativado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['desativar']);
    }
    ?>
           <?php if (isset($_SESSION['err'])) { ?>
  <script>
      var mensagem = "<strong>Existem fotos cadastradas neste album</strong>";
      mostraDialogo(mensagem, "danger", 4500);
  </script>
  <?php
  unset($_SESSION['err']);
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
            
        foreach ($listar_albuns as $albuns) {
            ?>
            <div class="col-md-3 spaceNoticia" id="foto-<?php echo $albuns->id ?>">
                <div>
                    <div style="float: left;color: #c1c0c0"><?= $albuns->id ?></div>




                    <div class="card-img" align="center" >
                        <!--AKI VAI A THUMBnail do albun-->
                        <img src="<?= base_url().'galeria/album/'.$albuns->pasta.'/thumb/'.$albuns->nome_arquivo ?>" width="100%" height="180" style="object-fit: contain">
                        <span><h4><?= $albuns->numero_fotos ?></h4></span>
                    </div>
                    <div class="limite-texto">
                        <!--Titulo do albun-->
                        <p><?php echo substr($albuns->titulo, 0, 50) . "..." ?></p>
                    </div>
                </div>

                <div>
                    <!--Data da criação do album-->
                    <?php
                    $date = new DateTime($albuns->data_cadastro);
                    ?>
                    <h6>Criado em : <?php echo $date->format('d-m-Y H:i:s') ?></h6>
                </div>

                <div class="row" style="padding-top: 25px;" align="center">
                    <div class="col-md-3 margon">
                        <!---->
                        <a href="<?php echo base_url('admin/foto_album/').$albuns->id ?>" class="btn-preview" title="Adicionar Fotos">
                            <i class="material-icons centro-icon">add_circle_outline</i>
                        </a>
                    </div>
                    <?php if ($albuns->publicado == 1) { ?>
                        <div class="col-md-3 margon">
                            <a href="modal" data-toggle="modal" data-target=".desativar-modal-<?= $albuns->id ?>" class="btn-desativar" title="Desativar" >
                                <i class="material-icons centro-icon">block</i>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-3 margon">
                            <a href="modal" data-toggle="modal" data-target=".publicar-modal-<?= $albuns->id ?>" class="btn-publicar" title="Publicar" >
                                <i class="material-icons centro-icon">send</i>
                            </a>
                        </div>
                    <?php } ?>





                    <!--  Modal para desativar noticia -->
                    <div class="modal fade desativar-modal-<?= $albuns->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar desativação do Album <?= $albuns->id ?> .</h4>
                                </div>
                                <div class="modal-body">

                                    <p>Desativar o Album, retira a visualização na página principal.</p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href="<?php echo base_url('admin/foto/desativar/') . $albuns->id; ?>" class="btn btn-success" >
                                        Desativar
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- fim Modal para desativar noticia -->

                    <!--  Modal para publicar noticia -->
                    <div class="modal fade publicar-modal-<?= $albuns->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar Publicação do Album <?= $albuns->id ?>.</h4>
                                </div>
                                <div class="modal-body">

                                    <p> O album <b><?= $albuns->id ?></b> será publicado na página principal.</p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" href="<?php echo base_url('admin/foto/publicar/') . $albuns->id; ?>" class="btn btn-success" >
                                        Publicar
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Fim  Modal para publicar noticia -->
                    <div class="col-md-3 margon">
                        <a href="modal" data-toggle="modal" data-target="#editarModal-<?= $albuns->id ?>" class="btn-editar-not" title="Editar" >
                            <i class="material-icons centro-icon">edit</i>
                        </a>
                    </div>


                    <div class="col-md-3 margon">
                        <a href="modal" data-toggle="modal" data-target=".excluir-modal-<?= $albuns->id ?>" class="btn-excluir-not" title="Excluir" >
                            <i class="material-icons centro-icon">delete_forever</i>
                        </a>
                    </div>

                    <div class="modal fade excluir-modal-<?= $albuns->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar exclusão do Album <?= $albuns->id ?> .</h4>
                                </div>
                                <div class="modal-body">
                                    <p>O album será excluido do Sistema.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" class="btn btn-danger modal-excluir" href="<?php echo base_url('admin/foto/excluir/') . $albuns->id; ?>">Excluir </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        <div class="modal fade editar-video" tabindex="-1" role="dialog" aria-hidden="true" id="editarModal-<?= $albuns->id ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
              <?php
           echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
        echo form_open_multipart('admin/foto/alterar');
        ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4>Editar Album</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                           <label>Titulo do Album</label>
                           <input type="text" class="form-control" name="titulo_edit" id="titulo_edit" required="required" value="<?= $albuns->titulo ?>">
                           <label for="exampleFormControlFile1">Áudio</label>
                           <input type="hidden" value="<?= $albuns->id ?>" name="id">
                           <label for="poster-principal">Capa do Album</label>
                           <input type="file" class="form-control-file" id="poster-principal" name="poster-principal" >
                           <div id="result"></div>
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

            <?php
        }
        ?>
        <!-- fim php -->
    </div>


</div>
</div>
<div id="mybutton">
    <a class="btn-adicionar" href="modal" data-toggle="modal" data-target="#basicModal">
        <i class="material-icons" id="btn-addi">
            add
        </i>
    </a>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="basicModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          <?php
       echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
    echo form_open_multipart('admin/foto/salvar_album');
    ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4>Criar Album</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Titulo do Album</label>
                        <input type="text" class="form-control" name="titulo" id="titulo">
                        <label for="poster-principal">Capa do Album</label>
                        <input type="file" class="form-control-file" id="poster-principal" name="poster-principal" required="TRUE">
                        <div id="result" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Criar Album</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>
</div>
<script type='text/javascript'>
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

   </script>
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
