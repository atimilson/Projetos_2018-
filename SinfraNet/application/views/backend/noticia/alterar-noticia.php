<div class="container">
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart('admin/noticia/salvar_alteracao');
    foreach ($noticias_todos as $noticia_todos) {
        ?>
        <label class="labelarquivo label-titulo">Escolher Thumbnail.</label><br>
        <img src="<?php echo base_url('galeria/') . $noticia_todos->img ?>" width="200">
        <div class="form-group btninput">                               
            <input type="file" class="form-control-file" id="poster-principal" name="poster-principal">

        </div>

        <div class="form-group">
            <label class="label-titulo" for="titulo">Titulo</label>
            <input type="text" class="form-control" placeholder="Titulo da Noticia" id="titulo" name="titulo" value="<?php echo $noticia_todos->titulo ?>"/>                            
        </div>

        <div class="form-group">
            <label class="label-titulo" for="Titulo">Subtítulo</label>
            <input type="text" class="form-control" placeholder="Subtítulo da Noticia" id="subtitulo" name="subtitulo" value="<?php echo $noticia_todos->subtitulo ?>"/>                            
        </div>
        <div class="form-group">
            <label class="label-titulo" for="autor_noticia">Autor da Notícia</label>
            <input type="text" class="form-control" placeholder="Autor da Noticia" id="autor_noticia" name="autor_noticia" value="<?php echo $noticia_todos->autor_noticia ?>"/>                            
        </div>
        <div class="form-group">
            <label class="label-titulo" for="Titulo">Autor Foto</label>
            <input type="text" class="form-control" placeholder="Autor das Fotos" id="autor_foto" name="autor_foto" value="<?php echo $noticia_todos->autor_imagens ?>"/>                            
        </div>  

        <label class="label-titulo" for="Titulo">Posição Noticias</label><br>

        <div class="form-check input-check">
            <label>

                <input type="checkbox" name="check[1]" value="1" <?php if ($noticia_todos->posicao_carrousel != null && $noticia_todos->posicao_carrousel != 0) {
        echo 'checked';
    } ?>> <span class="label-text">Carousel Notícias</span><br>
                <img src="<?php echo base_url('assets/backend/imagens/') ?>carrosel.svg" width="150" height="100"/>               
        </div>   

        <div class="form-check input-check">
            <label class="position-not" >
                <input type="checkbox" name="check[2]"  value="1"  <?php if ($noticia_todos->posicao_tres != null && $noticia_todos->posicao_tres != 0) {
        echo 'checked';
    } ?>> <span class="label-text">Três Notícias</span><br>
                <img src="<?php echo base_url('assets/backend/imagens/') ?>tres.svg" width="150" height="100"/>               
        </div> 

        <div class="form-check">
            <label class="position-not">
                <input type="checkbox" name="check[3]"  value="1" <?php if ($noticia_todos->posicao_quadro != null && $noticia_todos->posicao_quadro != 0) {
        echo 'checked';
    } ?>> <span class="label-text">Quatro Notícias</span><br>
                <img src="<?php echo base_url('assets/backend/imagens/') ?>quatro.svg" width="150" height="100"/>               
        </div>



        <textarea name="editor1" id="editor1" class="ckeditor" rows="10" cols="80">
    <?php echo $noticia_todos->conteudo ?>
        </textarea>

        <input type="hidden" value="<?php echo $noticia_todos->id ?>" name="id_postagem" id="id_postagem">

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

        <a href="<?php echo base_url('admin/noticia') ?>" type="button" class="btn btn-danger btns-espaco">


            <i class="material-icons">
                keyboard_backspace
            </i>

            <p> <b>Voltar</b></p> 
        </a>
        <button type="submit" class="btn btn-success btns-espaco" style="float: right">
    <!--                <img src="<?php echo base_url('assets/backend/imagens/') ?>salvar.svg" width="25px" height="25px">-->
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
