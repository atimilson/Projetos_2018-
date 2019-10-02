<div class="container">
    <?php
    echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
    echo form_open_multipart('admin/evento/salvar_alteracao');
    foreach ($eventos_todos as $evento_todos) {
        ?>
        <label class="labelarquivo label-titulo">Escolher Thumbnail.</label><br>
        <img src="<?php echo base_url('galeria/') . $evento_todos->img ?>" width="200">
        <div class="form-group btninput">                               
            <input type="file" class="form-control-file" id="poster-principal" name="poster-principal">

        </div>

        <div class="form-group">
            <label class="label-titulo" for="titulo">Titulo</label>
            <input type="text" class="form-control" placeholder="Titulo da Noticia" id="titulo" name="titulo" value="<?php echo $evento_todos->titulo ?>"/>                            
        </div>

        <div class="form-group">
            <label class="label-titulo" for="subtitulo">Subtítulo</label>
            <input type="text" class="form-control" placeholder="Subtítulo da Noticia" id="subtitulo" name="subtitulo" value="<?php echo $evento_todos->subtitulo ?>"/>                            
        </div>
        <div class="form-group">
            <label class="label-titulo" for="autor_evento">Autor da Noticia</label>
            <input type="text" class="form-control" placeholder="Autor da Noticia" id="autor_evento" name="autor_evento" value="<?php echo $evento_todos->autor_noticia ?>"/>                            
        </div>
        <div class="form-group">
            <label class="label-titulo" for="autor_fotos">Autor Foto</label>
            <input type="text" class="form-control" placeholder="Autor das Fotos" id="autor_fotos" name="autor_fotos" value="<?php echo $evento_todos->autor_imagens ?>"/>                            
        </div>  


        <textarea name="editor1" id="editor1" class="ckeditor" rows="10" cols="80">
            <?php echo $evento_todos->conteudo ?>
        </textarea>

        <input type="hidden" value="<?php echo $evento_todos->id ?>" name="id_postagem" id="id_postagem">

        <script>
            //   CKEDITOR.replace('editor1');
            var getUrl = window.location;
            var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            CKEDITOR.replace('editor1', {
                filebrowserBrowseUrl: baseUrl + '/responsivefilemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                filebrowserUploadUrl: baseUrl + '/responsivefilemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                filebrowserImageBrowseUrl: baseUrl + '/responsivefilemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
            });
        </script>

        <a href="<?php echo base_url('admin/evento') ?>" type="button" class="btn btn-danger btns-espaco">
<!--            <img class="cancel" src="<?php echo base_url('assets/backend/imagens/') ?>cancelar.svg" width="25px" height="25px">-->
           <i class="material-icons">
        keyboard_backspace
        </i>
        <p> <b>Voltar</b></p> 
        </a>
        <button type="submit" class="btn btn-success btns-espaco" style="float: right">
<!--            <img src="<?php echo base_url('assets/backend/imagens/') ?>salvar.svg" width="25px" height="25px">-->
             <i class="material-icons">
        done
        </i>
        <p class="btn-salvar"><b>Salvar</b></p>
        </button>
            <?php
        }
        echo form_close();
        ?>

</div>
</div>
</div>
