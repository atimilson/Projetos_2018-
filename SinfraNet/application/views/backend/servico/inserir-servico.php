<div class="container">



    <?php if (isset($_SESSION['alterado'])) { ?>
        <script>
            var mensagem = "<strong>Serviço Alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Serviço Cadastrado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>

    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Serviço excluído com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['excluido']);
    }
    ?>

    <h2>Lista de Serviços</h2>

    <div class="btn-input input-space form-row">
        <select id="selecione" class="select-estilo">
            <option>Selecionar Filtro</option>
            <option value="nome">Nome</option>
            <option value="descricao">Descrição</option>            
        </select>
        <input type="text" id="filtro-aniver" onkeyup="search_servico()" placeholder="Selecionar Filtro ao Lado">        
    </div>

    <table class="table table-responsive" id="tableServico" style="border-collapse: separate;
           border-spacing: 0 10px; margin: 0 0 0 0;">
        <thead class="titulos-tabela">
            <tr>
                <th class="centro">NOME</th>
                <th class="centro">DESCRIÇÃO</th>
                <th class="centro">LINK</th>        
                <th class="centro">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <!-- tabela aniversariantes -->

<?php foreach ($servicos_todos as $servicos) { ?>

                <tr class="corpo-tabela">
                    <td class=""><?= $servicos->nome ?></td>


                    <td class="coluna-ramal-dataAniver"><?= $servicos->descricao ?></td>
                    <td class="coluna-setor">
                        <a href="<?= $servicos->url ?>" target="_blank" title="<?= $servicos->url ?>" class="btn btn-primary">
                            URL do Acesso
                        </a>
                    </td>
                    <td align="center">
                        <div style="display: inline-flex;">
                            <a href="#" class="btn-editar-not" title="Editar" data-toggle="modal" data-target="#editarModal-<?= $servicos->id ?>" style="margin-right: 4px;">
                                <i class="material-icons centro-icon">edit</i>
                            </a> 
                            <a href="#" class="btn-excluir-not" title="Excluir" data-toggle="modal" data-target="#excluirModal-<?= $servicos->id ?> ">
                                <i class="material-icons centro-icon">delete_forever</i>
                            </a>

                        </div>
                    </td>
                </tr>


                <!-- Modal editar  -->
            <div class="modal fade" id="editarModal-<?= $servicos->id ?>" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Alterar Serviço.</h4>
                        </div>
                        <div class="modal-body">   

    <?php
    echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
    echo form_open('admin/servico/alterar');
    ?>
                            <div class="form-group">
                                <label class="label-modal" for="nome_servico">Nome</label>
                                <input type="text" class="form-control" id="nome_servico" name="nome_servico" placeholder="Titulo do Servico" value="<?= $servicos->nome ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do Serviço" value="<?= $servicos->descricao ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="url">Link</label>
                                <input type="url" class="form-control" id="url" name="url" placeholder="Link do Serviço" value="<?= $servicos->url ?>"/>
                            </div>
                            <input type="hidden" name="id" value="<?= $servicos->id ?>"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success salve">Salvar</button>
                        </div>
    <?php
    echo form_close();
    ?>
                    </div>
                </div>
            </div>
            <!-- Modal editar  -->

            <!-- Modal excluir  -->
            <div class="modal fade" id="excluirModal-<?= $servicos->id ?>" tabindex="-1" role="dialog" aria-labelledby="excluirModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4>Confirmar exclusão do Serviço.</h4>
                    <!--                            <h4>Confirmar exclusão do Serviço //<?= $servicos->nome ?> ?</h4>-->
                        </div>
                        <div class="modal-body">                    

                            <p>Após Excluido o serviço <b><?= $servicos->nome ?></b> não ficara mais disponível no Sistema.</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href="<?php echo base_url('admin/servico/excluir/') . $servicos->id ?>" class="btn btn-danger">Excluir</a>
                        </div>

                    </div>
                </div>
            </div>











<?php } ?>

        <div id="mybutton">

            <a  data-toggle="modal" data-target="#basicModal" class="btn-adicionar" href="#">

                <i class="material-icons" id="btn-addi">
                    add
                </i>


            </a>

        </div>




        <!--MODAL CADASTRAR USUARIO -->
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Inserir Serviços</h4>
                    </div>
                    <div class="modal-body">                    
<?php
echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
echo form_open('admin/servico/salvar');
?>
                        <div class="form-group">
                            <label class="label-modal" for="nome_servico">Nome</label>
                            <input type="text" class="form-control" id="nome_servico" name="nome_servico" placeholder="Titulo do Servico"/>
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do Serviço"/>
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="url">Link</label>
                            <input type="url" class="form-control" id="url" name="url" placeholder="Link do Serviço"/>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success salve">Salvar</button>
                    </div>
<?php
echo form_close();
?>
                </div>
            </div>
        </div>

        <!--FIM DO MODAL-->
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
