<div class="container" id="tamanho-container">


    <?php if (isset($_SESSION['mensage'])) { ?>
        <script>
            var mensagem = "<strong>Noticia alterada com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['mensage']);
    }
    ?>

    <?php if (isset($_SESSION['alterado'])) { ?>
        <script>
            var mensagem = "<strong>Noticia alterada com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Noticia cadastrada com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>
    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Noticia excluida com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['excluido']);
    }
    ?>

    <?php if (isset($_SESSION['publicar'])) { ?>
        <script>
            var mensagem = "<strong>Noticia publicada com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['publicar']);
    }
    ?>

    <?php if (isset($_SESSION['desativar'])) { ?>
        <script>
            var mensagem = "<strong>Noticia desativada com sucesso!</strong>";
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
    <h2><?= 'Album: '.$retorno[0]->titulo ?></h2>
    
    <?php
                    $date = new DateTime($retorno[0]->data_cadastro);
                    ?>
                    <span>Criado em : <?php echo $date->format('d-m-Y H:i:s') ?></span>
    <div class="row esp">
        <!-- inicio bloco de codigo php -->
        <?php




        foreach ($listar_fotos as $fotos) {
            ?>
            <div class="col-md-3 spaceNoticia" id="noticia-<?php echo $fotos->id ?>" style="min-height: 237px;">
                <div>
                    <div class="escolha">
                        <a class="pontos" href="modal" data-toggle="modal" data-target=".excluir-modal-<?php echo $fotos->id ?>">
                            <i class="material-icons" style="color:red;">delete_forever</i>
                        </a>
                    </div>
                    <div class="card-img" align="center" >
                        <!--AKI VAI A THUMBnail do albun-->
                        <img src="<?= base_url().$fotos->caminho_arquivo ?>" width="100%" height="180" style="object-fit: contain;">
                    </div>
                </div>
            </div>
        <div class="modal fade excluir-modal-<?= $fotos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar exclusão da Foto.</h4>
                                </div>
                                <div class="modal-body">
                                    <p>A Foto será excluido do Sistema.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" class="btn btn-danger modal-excluir" href="<?php echo base_url('admin/foto_album/excluir/') . $fotos->id.'/'.$id_pai; ?>">Excluir </a>
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
    <a class="btn-adicionar" href="modal" data-toggle="modal" data-target=".cadastro-fotos">
        <i class="material-icons" id="btn-addi">
            add
        </i>
    </a>
</div>
<div class="modal fade cadastro-fotos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          <?php
       echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
    echo form_open_multipart('admin/foto_album/salvar');
    ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4>Cadastro de Fotos</h4>
            </div>
            <div class="modal-body">

                    <div class="form-group">
                      <label for="poster-principal">Fotos</label>
                      <input type="hidden" name="id" value="<?= $id_pai ?>" >
                      <input type="file" class="form-control-file" id="files" name="files[]" required="TRUE" max="1" multiple>
                      <div id="result" />
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" name="fileSubmit" value="qualqer">Cadastrar</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>
</div>
<script>
         $(function(){
            $("input[type = 'submit']").click(function(){
               var $fileUpload = $("input[type='file']");
               if (parseInt($fileUpload.get(0).files.length) > 2){
                  alert("You are only allowed to upload a maximum of 2 files");
               }
            });
         });
      </script>
<script type='text/javascript'>
       $(window).load(function(){
       $('#files').change(function(){
           var files = $('input#files')[0].files;
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
