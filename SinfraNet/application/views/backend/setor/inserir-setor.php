<div class="container">
    <?php 
    
    if (isset($_SESSION['alterado'])) { ?>
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

    <h2>Lista de setores</h2>
    <div class="btn-input input-space form-row">
        <select id="selecione" class="select-estilo">
            <option>Selecionar Filtro</option>           
            <option value="setor">Setor</option>
            <option value="andar">Andar</option>
        </select>
        <input type="text" id="filtro" onkeyup="search_setor()" placeholder="Selecionar Filtro ao Lado">
    </div>

    <table class="table table-responsive" id="tableSetor">
        <thead class="titulos-tabela">
            <tr>
                <th class="centro">NOME</th>
                <th class="centro">ANDAR</th>
                <th class="centro">AÇÕES</th>
            </tr>
        </thead>
        <tbody>

            <!-- tabela Ramais -->

            <?php foreach ($setores_todos as $setor) { ?>

                <tr class="corpo-tabela">
                    <td class="coluna-nome"><?= $setor->nome_setor ?></td>
                    
                    <?php 
                    $andar;
                    if($setor->andar == '-1'){
                        $andar = 'SubSolo';
                    } elseif($setor->andar == '0') {
                        $andar = 'Terreo';
                    }elseif ($setor->andar == '1') {
                          $andar = 'Primeiro Andar';  
                    }elseif ($setor->andar == '2') {
                          $andar = 'Segundo Andar';  
                     } else {
                         $andar = 'Outros';
                     }
                    
                    ?>
                    <td class="coluna-nome"><?= $andar ?></td>
                    
                    
                    
                    <td align="center">
                        <div style="display: inline-flex;">
                            <a href="#" class="btn-editar-not" title="Editar" data-toggle="modal" data-target="#editarModal-<?= $setor->id_setor ?>" style="margin-right: 4px;">
                                <i class="material-icons centro-icon">edit</i>
                            </a> 
                            <a href="#" class="btn-excluir-not" title="Excluir" data-toggle="modal" data-target="#excluirModal-<?= $setor->id_setor ?> ">
                                <i class="material-icons centro-icon">delete_forever</i>
                            </a>

                        </div>
                    </td>
                </tr>


                <!-- Modal editar  -->
            <div class="modal fade" id="editarModal-<?= $setor->id_setor ?>" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Alterar Setor.</h4>
                        </div>
                        <div class="modal-body">                    
                            <?php
                            echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                            echo form_open('admin/setor/alterar');
                            ?>
                            <div class="form-group">
                                <label class="label-modal" for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome-modal" name="nome" value="<?= $setor->nome_setor ?>" placeholder="Nome"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="setor">Andar</label>
                                <select class="form-control" name="setor">
                                    <option value="<?= $setor->andar ?>" selected hidden><?= $andar ?></option>
                                    <option value="-1" >SubSolo</option>
                                    <option value="0" >Terreo</option>
                                    <option value="1" >Primeiro Andar</option>                                
                                    <option value="2" >Segundo Andar</option>                                
                                </select>
                            </div>
                            <input type="hidden" id="id" name="id" value="<?= $setor->id_setor ?>"/>

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
            <div class="modal fade" id="excluirModal-<?= $setor->id_setor ?>" tabindex="-1" role="dialog" aria-labelledby="excluirModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Excluir Setor.</h4>
                        </div>
                        <div class="modal-body">                    
                            <h4>Deseja Excluir o Setor <?= $setor->nome_setor ?> ?</h4>
    <!--                                    <p>Após Excluido o <b><?= $lista_aniversarios->ramal ?></b> não ficara mais disponível no Sistema.</p>-->
                            <p>O setor será excluido do sistema.</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href="<?php echo base_url('admin/setor/excluir/') . $setor->id_setor ?>" class="btn btn-danger">Excluir</a>
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




        <!--MODAL CADASTRAR SETORES -->
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Cadastrar Setor</h4>
                    </div>
                    <div class="modal-body">                    
                        <?php
                        echo validation_errors('<div class="alert alert-danger">', '</div>');
                        echo form_open('admin/setor/salvar');
                        ?>
                        <div class="form-group">
                            <label class="label-modal" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome-modal" name="nome" placeholder="Nome"/>
                        </div>

                        <div class="form-group">
                            <label class="label-modal" for="setor">Andar</label>
                            <select class="form-control" name="setor">
                                <option value="" disabled selected hidden>Selecione</option>
                                <option value="-1" >SubSolo</option>
                                <option value="0" >Terreo</option>
                                <option value="1" >Primeiro Andar</option>                                
                                <option value="2" >Segundo Andar</option>                                
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
