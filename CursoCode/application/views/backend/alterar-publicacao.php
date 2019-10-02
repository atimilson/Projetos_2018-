<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= 'Administrar ' . $subtitulo ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'Adicionar novo ' . $subtitulo ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('admin/publicacao/salvar_alteracoes');
                            foreach ($publicacoes as $publicacao){
                            ?>

                            <div class="form-group">
                                <label>Categoria</label>
                                <select class="form-control" name="select-categoria" id="select-categoria">
                                    <?php foreach ($categorias as $categoria) { ?>
                                    <option value="<?= $categoria->id ?>" <?php 
                                                                            if ( $categoria->id == $publicacao->categoria){
                                                                                echo 'selected';
                                                                            }
                                    ?>><?= $categoria->titulo ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label id="txt-titulo">Título</label>
                                <input id="txt-titulo" name="txt-titulo" type="text" class="form-control" placeholder="Digite o titulo" value="<?php echo $publicacao->titulo ?>">
                            </div>

                            <div class="form-group">
                                <label id="txt-subtitulo">Subtitulo</label>
                                <input id="txt-subtitulo" name="txt-subtitulo" type="text" class="form-control" placeholder="Digite o subtitulo" value="<?php echo $publicacao->subtitulo ?>">
                            </div>

                            <div class="form-group">
                                <label id="txt-conteudo">Conteudo</label>
                                <textarea id="txt-conteudo" name="txt-conteudo" type="text" class="form-control"><?php echo $publicacao->conteudo ?></textarea>

                            </div>

                            <div class="form-group">
                                <label id="txt-data">Data</label>
                                <input id="txt-data" name="txt-data" type="datetime-local" class="form-control" placeholder="Digite a data" value="<?php echo strftime('%Y-%m-%dT%H:%M:%S', strtotime($publicacao->data)); ?>">
                            </div>


                           

                            <input type="hidden" name="txt-id" value="<?php echo $publicacao->id;?>" >

                            <button type="submit" class="btn btn-default">Salvar Alterações</button>
                            <?php
                            
                            echo form_close();
                            ?>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'Imagem de destaque do ' . $subtitulo . ' existente' ?>
                </div>
                <style>
                    img{
                        width: 400px;
                    }
                    </style>
                <div class="panel-body">
                    <div class="row" style="padding-bottom: 10px">
                        <div class="col-lg-8 col-lg-offset-1" align="center">

                            <?php
                            if ($publicacao->img == 1){
                            echo img("assets/frontend/img/publicacao/" . md5($publicacao->id) . ".jpg");
                            }else{
                            echo img("assets/frontend/img/semFoto2.png");
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">

                            <?php
                            $divopen = '<div class="form-group">';
                            $divclose = '</div>';
                            echo form_open_multipart('admin/publicacao/nova_foto');
                            echo form_hidden('id', md5($publicacao->id));
                            echo $divopen;

                            echo form_upload(array(
                            'name' => 'userfile',
                            'id' => 'userfile',
                            'class' => 'form-control-file'));

                            echo $divclose;
                            echo $divopen;
                            echo form_submit(array(
                            'name' => 'btn_adicionar',
                            'id' => 'btn_adicionar',
                            'class' => 'btn btn-primary',
                            'value' => 'Adicionar Nova Imagem'
                            ));
                            echo $divclose;
                            echo form_close();
                            }
                            ?>


                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!--
 <form role="form">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input class="form-control" placeholder="Entre com o texto">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Destaque</label>
                                        <input type="file">
                                    </div>
                                    <div class="form-group">
                                        <label>Conteúdo</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Selects</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-default">Cadastrar</button>
                                    <button type="reset" class="btn btn-default">Limpar</button>
                                </form>

-->
<?php ob_end_flush(); ?>