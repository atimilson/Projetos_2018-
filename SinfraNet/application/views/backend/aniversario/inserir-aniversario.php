<div class="container">

    <?php if (isset($_SESSION['alterado'])) { ?>
        <script>
            var mensagem = "<strong>Aniversariante Alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Aniversariante Cadastrado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>

    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Aniversariante excluido com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['excluido']);
    }
    ?>


    <h2>Lista de Aniversariantes</h2>

    <div class="btn-input input-space form-row">
        <select id="selecione" class="select-estilo">
            <option>Selecionar Filtro</option>
            <option value="nome">Nome</option>
            <option value="dataNasc">Data Nascimento</option>
            <option value="setor">Setor</option>
        </select>
        <input type="text" id="filtro-aniver" onkeyup="search_aniversario()" placeholder="Selecionar Filtro ao Lado">        
    </div>

    <table class="table table-responsive" id="tableAniver" style="border-collapse: separate;
           border-spacing: 0 10px; margin: 0 0 0 0;">
        <thead class="titulos-tabela">
            <tr>
                <th class="centro">NOME</th>
                <th class="centro">DATA NASCIMENTO</th>
                <th class="centro">SETOR</th>
                <th class="centro">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <!-- tabela aniversariantes -->

            <?php foreach ($aniversarios_todos as $lista_aniversarios) { ?>

                <tr class="corpo-tabela">
                    <td class="coluna-nome"><?= $lista_aniversarios->nome ?></td>

                    <?php
                    $date = new DateTime($lista_aniversarios->data_nasc);
                    ?>


                    <td class="coluna-ramal-dataAniver"><?php echo $date->format('d/m/Y') ?></td>
                    <td class="coluna-setor"><?= $lista_aniversarios->nome_setor ?></td>
                    <td align="center">
                        <div style="display: inline-flex;">
                            <a href="#" class="btn-editar-not" title="Editar" data-toggle="modal" data-target="#editarModal-<?= $lista_aniversarios->id_aniver ?>" style="margin-right: 4px;">
                                <i class="material-icons centro-icon">edit</i>
                            </a> 
                            <a href="#" class="btn-excluir-not" title="Excluir" data-toggle="modal" data-target="#excluirModal-<?= $lista_aniversarios->id_aniver ?> ">
                                <i class="material-icons centro-icon">delete_forever</i>
                            </a>

                        </div>
                    </td>
                </tr>
<!-- Modal editar  -->
            <div class="modal fade" id="editarModal-<?= $lista_aniversarios->id_aniver ?>" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Alterar Aniversariante.</h4>
                        </div>
                        <div class="modal-body">                    
                            <?php
                            echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                            echo form_open('admin/aniversarios/alterar');
                            ?>
                            <div class="form-group">
                                <label class="label-modal" for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome-modal" name="nome" value="<?= $lista_aniversarios->nome ?>" placeholder="Nome Aniversariante"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="dataNasc">Data Nascimento</label>
                                <input type="date" class="form-control" id="dataNasc" name="dataNasc" placeholder="Data Nascimento" value="<?php echo $lista_aniversarios->data_nasc ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="setor">Setor</label>
                                <select class="form-control" name="setor">
                                    <option value="<?= $lista_aniversarios->id_setor ?>" selected hidden><?= $lista_aniversarios->nome_setor ?></option>
                                    <?php foreach ($setores_todos as $setores) { ?>
                                        <option value="<?= $setores->id_setor ?>"><?= $setores->nome_setor ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <input type="hidden" id="id" name="id" value="<?= $lista_aniversarios->id_aniver ?>"/>

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
            <div class="modal fade" id="excluirModal-<?= $lista_aniversarios->id_aniver ?>" tabindex="-1" role="dialog" aria-labelledby="excluirModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Excluir Aniversariante.</h4>
                        </div>
                        <div class="modal-body">                    
                                <h4>Deseja Excluir o aniversário de <?= $lista_aniversarios->nome ?> ?</h4>
<!--                                    <p>Após Excluido, <b><?= $lista_aniversarios->nome ?></b> não ficara mais disponível no Sistema.</p>;-->
                                    <p>O aniversário será excluido do sistema.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href="<?php echo base_url('admin/aniversarios/excluir/') . $lista_aniversarios->id_aniver ?>" class="btn btn-danger">Excluir</a>
                        </div>
                        
                    </div>
                </div>
            </div>
<!-- fim Modal excluir  -->

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
                        <h4 class="modal-title" id="myModalLabel">Cadastrar Aniversariante</h4>
                    </div>
                    <div class="modal-body">                    
                        <?php
                        echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                        echo form_open('admin/aniversarios/salvar');
                        ?>
                        <div class="form-group">
                            <label class="label-modal" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome-modal" name="nome" placeholder="Nome Aniversariante"/>
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="dataNasc">Data Nascimento</label>
                            <input type="date" class="form-control" id="dataNasc" name="dataNasc" placeholder="Data Nascimento"/>
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="setor">Setor</label>
                            <select class="form-control" name="setor">
                                <option value="" disabled selected hidden>Selecione</option>
                                <?php foreach ($setores_todos as $setores) { ?>
                                    <option value="<?= $setores->id_setor ?>"><?= $setores->nome_setor ?></option>

                                <?php } ?>
                            </select>
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
