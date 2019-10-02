<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?= 'Administrar '.$subtitulo ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo 'Adicionar novo '.$subtitulo ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php 
                                    echo validation_errors('<div class="alert alert-danger">','</div>');
                                    echo form_open('admin/usuarios/inserir');
                                    ?>
                                    
                                        <div class="form-group">
                                            <label id="txt-nome">Nome do usuario</label>
                                            <input id="txt-nome" name="txt-nome" type="text" class="form-control" placeholder="Digite o nome do usuario" value="<?php echo set_value('txt-nome') ?>">
                                        </div>
                                    
                                    <div class="form-group">
                                            <label id="txt-email">E-mail</label>
                                            <input id="txt-email" name="txt-email" type="text" class="form-control" placeholder="Digite o nome do usuario" value="<?php echo set_value('txt-email') ?>">
                                        </div>
                                    
                                    <div class="form-group">
                                            <label id="txt-historico">Histórico</label>
                                            <textarea id="txt-historico" name="txt-historico" type="text" class="form-control"><?php echo set_value('txt-historico')?></textarea>
                                            
                                        </div>
                                    
                                      <div class="form-group">
                                            <label id="txt-user">User</label>
                                            <input id="txt-user" name="txt-user" type="text" class="form-control" placeholder="Digite o nome do usuario" value="<?php echo set_value('txt-user') ?>">
                                        </div>
                                      <div class="form-group">
                                            <label id="txt-senha">Senha</label>
                                            <input id="txt-senha" name="txt-senha" type="password" class="form-control" >
                                        </div>
                                    
                                    <div class="form-group">
                                            <label id="txt-confir-senha">Confirmar Senha</label>
                                            <input id="txt-confir-senha" name="txt-confir-senha" type="password" class="form-control">
                                        </div>
                                    
                                    
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
                           <?php echo 'Alterar '.$subtitulo.' existente' ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <style>
                                        img{
                                            width: 60px;
                                        }
                                    </style>
                                    <?php 
                                    $this->table->set_heading("Foto ","Nome do usuario","Alterar","Excluir");
                                    foreach ($usuarios as $usuario){
                                        
                                         
                                if ($usuario->img == 1){
                                  $fotouser = img("assets/frontend/img/usuarios/" . md5($usuario->id) . ".jpg");
                                }else{
                                  $fotouser = img("assets/frontend/img/semFoto.png");  
                                }
                                
                                        
                                        $nomeuser= $usuario->nome;
                                        $alterar = anchor(base_url('admin/usuarios/alterar/'.md5($usuario->id)),'<i class="fa fa-refresh fa-fw"></i> Alterar');
                                        $excluir = anchor(base_url('admin/usuarios/excluir/'.md5($usuario->id)),'<i class="fa fa-remove fa-fw"></i> Excluir');
                                        
                                        $this->table->add_row($fotouser,$nomeuser, $alterar, $excluir);
                                        
                                    }
                                    $this->table->set_template(array(
                                        'table_open' => '<table class="table table-striped">'
                                    ));
                                    echo $this->table->generate();
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