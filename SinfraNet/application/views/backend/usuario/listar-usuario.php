<div class="container">
    <?php


//    var_dump($this->session->userdata('permissoes'));



    ?>



    <?php if (isset($_SESSION['alterado'])) { ?>
        <script>
            var mensagem = "<strong>Usuário alterado com sucesso!</strong><br>Suas informações foram alteradas.";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Usuário cadastrado com sucesso!</strong><br>Suas informações foram cadastradas.";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>

    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Usuário excluído com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['excluido']);
    }
    ?>
    <h2>Lista de Usuários</h2>
    <div class="btn-input input-space form-row">
        <select id="selecioneuser" class="select-estilo">
            <option>Selecionar Filtro</option>
            <option value="Nome">Nome</option>
            <option value="Usuário">Usuário</option>
            <option value="Perfil">Perfil</option>
            <option value="Situação">Status</option>
        </select>
        <input type="text" id="filtrouser" onkeyup="searchUsuariouser()" placeholder="Selecionar Filtro ao Lado">
    </div>

    <table class="table table-responsive" id="tableUsuario">
        <thead class="titulos-tabela">
            <tr>
                <th class="centro">NOME</th>
                <th class="centro">USUÁRIO</th>
                <th class="centro">PERFIL</th>
                <th class="centro">STATUS</th>
                <th class="centro">AÇÕES</th>
            </tr>
        </thead>
        <tbody>

<?php

foreach ($listar_todos as $usuario) {
    ?>
                <tr class="corpo-tabela">
                    <td class="coluna-nome"><?= $usuario->nome_completo ?></td>
                    <td class="coluna-ramal-dataAniver"><?= $usuario->usuario ?></td>
                    <td class="coluna-perfil"><?= $usuario->nome ?></td>

    <?php if ($usuario->ativo == "1") { ?>
                        <td class="coluna-setor">Ativo</td>

                    <?php } else { ?>

                        <td class="coluna-setor">Desativado</td>

                    <?php } ?>


                    <td align="center">
                        <div style="display: inline-flex;">

    <?php if ($usuario->ativo == "1") { ?>
                                <a href="<?php echo base_url('admin/usuarios/desativar/') . $usuario->id ?>" class="btn-excluir-not" title="Desativar usuario" style="margin-right: 4px;">
                                    <i class="material-icons centro-icon">block</i>
                                </a>

    <?php } else { ?>
                                <a  href="<?php echo base_url('admin/usuarios/ativar/') . $usuario->id ?>" class="btn-publicar" title="ativar usuario" style="margin-right: 4px;">
                                    <i class="material-icons centro-icon">how_to_reg</i>
                                </a>
                            <?php } ?>


                            <a href="#" class="btn-editar-not" title="Editar" data-toggle="modal" data-target="#editarModal-<?= $usuario->id ?>" style="margin-right: 4px;">
                                <i class="material-icons centro-icon">edit</i>
                            </a>
                            <a href="#" class="btn-excluir-not" title="Excluir" data-toggle="modal" data-target="#excluirModal-<?= $usuario->id ?> ">
                                <i class="material-icons centro-icon">delete_forever</i>
                            </a>

                        </div>
                    </td>
                </tr>




                <!-- Modal editar  -->
            <div class="modal fade" id="editarModal-<?= $usuario->id ?>" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Alterar Usuário</h4>
                        </div>
                        <div class="modal-body">

    <?php
       echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
    echo form_open('admin/usuarios/alterar');
    ?>
                            <div class="form-group">
                                <label class="label-modal" for="nome_completo">Nome Completo</label>
                                <input type="text" class="form-control" placeholder="Nome" name="nome_completo" value="<?= $usuario->nome_completo ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="user">Usuário</label>
                                <input type="text" class="form-control" name="user" placeholder="Usuário" value="<?= $usuario->usuario ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="usuario@usuario.com" value="<?= $usuario->email ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="senha">Senha</label>
                                <input type="password" class="form-control" placeholder="Senha" name="senha"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="confimar_senha">Confirmar Senha</label>
                                <input type="password" class="form-control" placeholder="Confirmar Senha" name="confimar_senha"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="perfil">Perfil</label>
                                <select class="form-control" name="perfil">
                                    <option value="<?= $usuario->id_per ?>" selected hidden><?= $usuario->nome ?></option>
    <?php
    foreach ($perfis as $perfil) {
        ?>

                                        <option value="<?= $perfil->id ?>"><?= $perfil->nome ?></option>

                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                             <div class="form-group">
                        <label class="label-modal" for="setor">Setor</label>
                        <select class="form-control" name="setor">
                            <option value="<?= $usuario->id_setor ?>" selected hidden><?= $usuario->nome_setor ?></option>
<?php
foreach ($setores_todos as $setor) {
    ?>

                                <option value="<?= $setor->id_setor ?>"><?= $setor->nome_setor ?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>

                            <div class="form-group">
                                <label class="label-modal" for="estado_usuario">Status</label>
                                <select class="form-control" name="estado_usuario">

                                    <?php
                                    if($usuario->ativo == "1"){

                                    ?>

                                    <option value="<?= $usuario->ativo ?>" selected hidden>Ativo</option>

                                    <?php

                                    }else {
                                    ?>
                                    <option value="<?= $usuario->ativo ?>" selected hidden>Desativado</option>
                                     <?php

                                    }
                                    ?>
                                    <option value="1">Ativo</option>
                                    <option value="0">Desativado</option>

                                </select>
                            </div>
                            <input type="hidden" name="id" value="<?= $usuario->id ?>"/>
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
            <div class="modal fade" id="excluirModal-<?= $usuario->id ?>" tabindex="-1" role="dialog" aria-labelledby="excluirModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4>Deseja Excluir o Usuário <?= $usuario->usuario ?> ?</h4>
                        </div>
                        <div class="modal-body">

                            <p>Após Excluido o <b><?= $usuario->usuario ?></b> não poderá mais acessar o Sistema.</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href="<?php echo base_url('admin/usuarios/excluir/') . $usuario->id ?>" class="btn btn-danger">Excluir</a>
                        </div>

                    </div>
                </div>
            </div>








    <?php
}
?>



        </tbody>
    </table>

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
                    <h4 class="modal-title" id="myModalLabel">Cadastrar Usuário</h4>
                </div>
                <div class="modal-body">
<?php
echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
echo form_open('admin/usuarios/salvar');
?>

                    <div class="form-group">
                        <label class="label-modal" for="nome_completo">Nome Completo</label>
                        <input type="text" class="form-control" placeholder="Nome" name="nome_completo" value="<?php echo set_value('nome_completo') ?>"/>
                    </div>
                    <div class="form-group">
                        <label class="label-modal" for="user">Usuário</label>
                        <input type="text" class="form-control" name="user" placeholder="Usuário" value="<?php echo set_value('user') ?>"/>
                    </div>
                    <div class="form-group">
                        <label class="label-modal" for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="usuario@usuario.com" value="<?php echo set_value('email') ?>"/>
                    </div>
                    <div class="form-group">
                        <label class="label-modal" for="senha">Senha</label>
                        <input type="password" class="form-control" placeholder="Senha" name="senha"/>
                    </div>
                    <div class="form-group">
                        <label class="label-modal" for="confimar_senha">Confirmar Senha</label>
                        <input type="password" class="form-control" placeholder="Confirmar Senha" name="confimar_senha"/>
                    </div>
                    <div class="form-group">
                        <label class="label-modal" for="perfil">Perfil</label>
                        <select class="form-control" name="perfil">
                            <option value="" disabled selected hidden>Selecione</option>
<?php
foreach ($perfis as $perfil) {
    ?>

                                <option value="<?= $perfil->id ?>"><?= $perfil->nome ?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="label-modal" for="setor">Setor</label>
                        <select class="form-control" name="setor">
                            <option value="" disabled selected hidden>Selecione</option>
<?php
foreach ($setores_todos as $setor) {
    ?>

                                <option value="<?= $setor->id_setor ?>"><?= $setor->nome_setor ?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="label-modal" for="estado_usuario">Status</label>
                        <select class="form-control" name="estado_usuario">
                            <option value="" disabled selected hidden>Selecione</option>


                            <option value="1">Ativo</option>
                            <option value="0">Desativado</option>

                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success salve"><b>Salvar</b></button>
                </div>
            </div>
<?php
echo form_close();
?>
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
