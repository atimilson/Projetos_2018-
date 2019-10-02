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
                            echo form_open('admin/usuarios/salvar_alteracoes');

                            foreach ($usuarios as $usuario) {
                                ?>

                                <div class="form-group">
                                    <label id="txt-nome">Nome do usuario</label>
                                    <input id="txt-nome" name="txt-nome" type="text" class="form-control" placeholder="Digite o nome do usuario" value="<?php echo $usuario->nome ?>">
                                </div>

                                <div class="form-group">
                                    <label id="txt-email">E-mail</label>
                                    <input id="txt-email" name="txt-email" type="text" class="form-control" placeholder="Digite o nome do usuario" value="<?php echo $usuario->email ?>">
                                </div>

                                <div class="form-group">
                                    <label id="txt-historico">Histórico</label>
                                    <textarea id="txt-historico" name="txt-historico" type="text" class="form-control"><?php echo $usuario->historico ?></textarea>

                                </div>

                                <div class="form-group">
                                    <label id="txt-user">User</label>
                                    <input id="txt-user" name="txt-user" type="text" class="form-control" placeholder="Digite o nome do usuario" value="<?php echo $usuario->user ?>">
                                </div>
                                <div class="form-group">
                                    <label id="txt-senha">Senha</label>
                                    <input id="txt-senha" name="txt-senha" type="password" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label id="txt-confir-senha">Confirmar Senha</label>
                                    <input id="txt-confir-senha" name="txt-confir-senha" type="password" class="form-control">
                                </div>

                                <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $usuario->id ?>">
                                <button type="submit" class="btn btn-default">Cadastrar</button>
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
                    <div class="panel-body">
                        <div class="row" style="padding-bottom: 10px">
                            <div class="col-lg-3 col-lg-offset-3" align="center">

                                <?php
                                if ($usuario->img == 1){
                                  echo img("assets/frontend/img/usuarios/" . md5($usuario->id) . ".jpg");
                                }else{
                                  echo img("assets/frontend/img/semFoto.png");  
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

    <?php
    $divopen = '<div class="form-group">';
    $divclose = '</div>';
    echo form_open_multipart('admin/usuarios/nova_foto');
    echo form_hidden('id', md5($usuario->id));
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