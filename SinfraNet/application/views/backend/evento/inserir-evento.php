<div class="container">
    <?php
    echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
    echo form_open_multipart('admin/evento/salvar_publicacao');
    ?>
    <label class="labelarquivo label-titulo">Escolher Thumbnail.</label>
    <div class="form-group btninput">                               
        <input type="file" class="form-control-file" id="poster-principal" name="poster-principal">

    </div>

    <div class="form-group">
        <label class="label-titulo" for="titulo">Titulo</label>
        <input type="text" class="form-control" placeholder="Titulo da Noticia" id="titulo" name="titulo" value="<?php echo set_value('titulo') ?>"/>                            
    </div>

    <div class="form-group">
        <label class="label-titulo"  for="subtitulo">Subtítulo</label>
        <input type="text" class="form-control" placeholder="Subtítulo da Noticia" id="subtitulo" name="subtitulo" value="<?php echo set_value('subtitulo') ?>"/>                            
    </div>

    <div class="form-group">
        <label class="label-titulo" for="autor_evento">Autor do Evento</label>
        <input type="text" class="form-control" placeholder="Autor da Noticia" id="autor_evento" name="autor_evento" value="<?php echo set_value('autor_evento') ?>"/>                            
    </div>
    <div class="form-group">
        <label class="label-titulo" for="autor_fotos">Autor Fotos</label>
        <input type="text" class="form-control" placeholder="Autor das Fotos" id="autor_fotos" name="autor_fotos" value="<?php echo set_value('autor_fotos') ?>"/>                            
    </div> 



    <textarea name="editor1" id="editor1" class="ckeditor" rows="10" cols="80">
        <?php echo set_value('editor1') ?>
    </textarea>
    <input id="txt-usuario" name="txt-usuario" type="hidden"  value="<?php echo $this->session->userdata('userlogado')->id ?>">
    <script>
//                            CKEDITOR.replace('editor1');
        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        CKEDITOR.replace('editor1', {
//                                
//                                filebrowserBrowseUrl : baseUrl+'/responsivefilemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
//                                filebrowserUploadUrl : baseUrl+'/responsivefilemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
//                                filebrowserImageBrowseUrl : baseUrl+'/responsivefilemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
        });

    </script>

    <a type="button" class="btn btn-danger btns-espaco" href="<?php echo base_url('admin/evento') ?>">
<!--        <img class="cancel"  src="<?php echo base_url('assets/backend/imagens/') ?>cancelar.svg" width="25px" height="25px">-->
        <i class="material-icons">
        keyboard_backspace
        </i>
        <p> <b>Voltar</b></p> 
    </a>


    <a data-toggle="modal" data-target=".salvar-modal" class="btn btn-success btns-espaco" style="float: right;">
<!--        <img class="btn-salvar" src="<?php echo base_url('assets/backend/imagens/') ?>salvar.svg" width="25px" height="25px">-->
          <i class="material-icons">
        done
        </i>
        <p class="btn-salvar"><b>Salvar</b></p>
    </a>

    <div class="modal fade salvar-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">Publicar</h4>
                </div>
                <div class="modal-body"> 
                    <h4>Deseja Publicar o Evento agora ?</h4>

                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary" name="acao" value="Salva_publicar" style="float: right">Sim</button>
                    <button type="submit" class="btn btn-danger" name="acao" value="salvar" style="float: left">Não</button>
                </div>

            </div>
        </div>
    </div>
    <?php
    echo form_close();
    ?>

</div>
</div>
</div>
