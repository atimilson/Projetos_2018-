<div class="container">
    <?php if (isset($_SESSION['alterado'])) { ?>
        <script>
            var mensagem = "<strong>Ramal Alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Ramal Cadastrado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>

    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Ramal excluído com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['excluido']);
    }
    
  
   
    ?>

    <h2>Lista de Ramais</h2>
    <div class="btn-input input-space form-row">
        <select id="selecione" class="select-estilo">
            <option>Selecionar Filtro</option>
            <option value="nome">Nome</option>
            <option value="ramal">Ramal</option>
            <option value="setor">Setor</option>
        </select>
        <input type="text" id="filtro" onkeyup="search_ramal()" placeholder="Selecionar Filtro ao Lado">
    </div>

    <table class="table table-responsive" id="tableRamal">
        <thead class="titulos-tabela">
            <tr>
                <th class="centro">NOME</th>
                <th class="centro">RAMAL</th>
                <th class="centro">SETOR</th>
                <th class="centro">AÇÕES</th>
            </tr>
        </thead>
        <tbody>

           <!-- tabela Ramais -->

            <?php foreach ($aniversarios_todos as $lista_aniversarios) { ?>

                <tr class="corpo-tabela">
                    <td class="coluna-nome"><?= $lista_aniversarios->nome ?></td>

                    
                    <td class="coluna-ramal-dataAniver"><?php echo $lista_aniversarios->ramal ?></td>
                    <td class="coluna-setor"><?= $lista_aniversarios->nome_setor ?></td>
                    
                    <td align="center">
                        <div style="display: inline-flex;">
                            <a href="#" class="btn-editar-not" title="Editar" data-toggle="modal" data-target="#editarModal-<?= $lista_aniversarios->id_ramal ?>" style="margin-right: 4px;">
                                <i class="material-icons centro-icon">edit</i>
                            </a> 
                            <a href="#" class="btn-excluir-not" title="Excluir" data-toggle="modal" data-target="#excluirModal-<?= $lista_aniversarios->id_ramal ?> ">
                                <i class="material-icons centro-icon">delete_forever</i>
                            </a>

                        </div>
                    </td>
                </tr>
                
                
<!-- Modal editar  -->
            <div class="modal fade" id="editarModal-<?= $lista_aniversarios->id_ramal ?>" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Alterar Ramal.</h4>
                        </div>
                        <div class="modal-body">                    
                            <?php
                            echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                            echo form_open('admin/ramal/alterar');
                            ?>
                            <div class="form-group">
                                <label class="label-modal" for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome-modal" name="nome" value="<?= $lista_aniversarios->nome ?>" placeholder="Nome"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="ramal">Ramal</label>
                                <input type="number" class="form-control" id="ramal" name="ramal" placeholder="Ramal" value="<?php echo $lista_aniversarios->ramal ?>" style="width: 100%"/>
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
                            <input type="hidden" id="id" name="id" value="<?= $lista_aniversarios->id_ramal ?>"/>

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
            <div class="modal fade" id="excluirModal-<?= $lista_aniversarios->id_ramal ?>" tabindex="-1" role="dialog" aria-labelledby="excluirModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Excluir Ramal.</h4>
                        </div>
                        <div class="modal-body">                    
                                <h4>Deseja Excluir o Ramal <?= $lista_aniversarios->ramal ?> ?</h4>
<!--                                    <p>Após Excluido o <b><?= $lista_aniversarios->ramal ?></b> não ficara mais disponível no Sistema.</p>-->
                                     <p>O ramal será excluido do sistema.</p>
                                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href="<?php echo base_url('admin/ramal/excluir/') . $lista_aniversarios->id_ramal ?>" class="btn btn-danger">Excluir</a>
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
                        <h4 class="modal-title" id="myModalLabel">Cadastrar Ramal</h4>
                    </div>
                    <div class="modal-body">                    
                        <?php
                        echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                        echo form_open('admin/ramal/salvar');
                        ?>
                        <div class="form-group">
                            <label class="label-modal" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome-modal" name="nome" placeholder="Nome"/>
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="ramal">Ramal</label>
                            <input type="number" class="form-control" id="ramal" name="ramal" placeholder="Ramal" style="width: 100%"/>
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
