<div class="container">

    <?php if (isset($_SESSION['alterado'])) { ?>
        <script>
            var mensagem = "<strong>Alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Cadastrado com sucesso!</strong>.";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>

    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Excluído com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['excluido']);
    }
    ?>

    <?php if (isset($_SESSION['err'])) { ?>
        <script>
            var mensagem = "<strong>Existem usuários cadastrados com este Perfil</strong>";
            mostraDialogo(mensagem, "danger", 4500);
        </script>
        <?php
        unset($_SESSION['err']);
    }
    ?>
    <h2>Lista de Perfil</h2>
    <div class="btn-input input-space form-row">           
        <input type="text" id="filtro" onkeyup="searchPerfil()" placeholder="Pesquisar Perfil">
    </div>

    <table class="table table-responsive" id="tablePerfil">
        <thead class="titulos-tabela">
            <tr>
                <th class="centro">PERFIL</th>                
                <th class="centro">AÇÕES</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($perfis as $perfil) {
                ?>
                <tr class="corpo-tabela">
                    <td class="coluna-nome"><?= $perfil->nome ?></td>

                    <td align="center">
                        <div style="display: inline-flex;">
                            <a href="#" class="btn-editar-not" title="Editar" data-toggle="modal" data-target="#editarModal-<?= $perfil->id ?>" style="margin-right: 4px;">
                                <i class="material-icons centro-icon">edit</i>
                            </a> 
                            <a href="#" class="btn-excluir-not" title="Excluir" data-toggle="modal" data-target="#excluirModal-<?= $perfil->id ?> ">
                                <i class="material-icons centro-icon">delete_forever</i>
                            </a>

                        </div>
                    </td>
                </tr>


                <?php
            }
            ?>



        </tbody>
    </table>

    <?php
    foreach ($perfis as $perfil) {
        ?>
        <!-- Modal editar  -->
        <div class="modal fade" id="editarModal-<?= $perfil->id ?>" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Editar Usuário</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                        echo form_open('admin/perfil/alterar');
                        ?>

                        <div class="form-group">
                            <label class="label-modal" for="nome_completo">Nome Perfil</label>
                            <input type="text" class="form-control" placeholder="Nome" name="nome_perfil" value="<?= $perfil->nome ?>"/>
                        </div> 


                        <table class="perfilTable">
                            <tr>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Notícias:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[1]" class="error"  <?php
                                        if ($perfil->noticia != null && $perfil->noticia != 0) {
                                            echo 'checked';
                                        }
                                        ?>/>
                                    </div>
                                </td>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Eventos:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[2]" class="error" <?php
                                        if ($perfil->evento != null && $perfil->evento != 0) {
                                            echo 'checked';
                                        }
                                        ?> />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Repositório:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[3]" class="error" <?php
                                        if ($perfil->repositorio != null && $perfil->repositorio != 0) {
                                            echo 'checked';
                                        }
                                        ?> />
                                    </div>
                                </td>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Acessos:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[4]" class="error"  <?php
                                        if ($perfil->acessos != null && $perfil->acessos != 0) {
                                            echo 'checked';
                                        }
                                        ?> />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Servicos:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[5]" class="error" <?php
                                        if ($perfil->servico != null && $perfil->servico != 0) {
                                            echo 'checked';
                                        }
                                        ?> />
                                    </div>
                                </td>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Fotos:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[6]" class="error" <?php
                                        if ($perfil->fotos != null && $perfil->fotos != 0) {
                                            echo 'checked';
                                        }
                                        ?> />
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Vídeos:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[7]" class="error" <?php
                                        if ($perfil->videos != null && $perfil->videos != 0) {
                                            echo 'checked';
                                        }
                                        ?>/>
                                    </div>
                                </td>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Áudios:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[8]" class="error"  <?php
                                        if ($perfil->audios != null && $perfil->audios != 0) {
                                            echo 'checked';
                                        }
                                        ?> />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Aniversários:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[9]" class="error" <?php
                                           if ($perfil->aniversario != null && $perfil->aniversario != 0) {
                                               echo 'checked';
                                           }
                                           ?> />
                                    </div>
                                </td>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Ramais:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[10]" class="error"  <?php
                                           if ($perfil->ramal != null && $perfil->ramal != 0) {
                                               echo 'checked';
                                           }
                                           ?> />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Enquetes:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[11]" class="error"  <?php
                                           if ($perfil->enquete != null && $perfil->enquete != 0) {
                                               echo 'checked';
                                           }
                                           ?> />
                                    </div>
                                </td>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Usuários:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[12]" class="error" <?php
                                           if ($perfil->usuario != null && $perfil->usuario != 0) {
                                               echo 'checked';
                                           }
                                           ?> />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Setores:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[13]" class="error" <?php
                                           if ($perfil->perfil != null && $perfil->perfil != 0) {
                                               echo 'checked';
                                           }
                                           ?> />
                                    </div>
                                </td>
                                <td>
                                    <div style="display: inline-flex;">
                                        <p class="perfilTitle">Perfil:</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input id="perfilCheck" type="checkbox" name="check[14]" class="error" <?php
                                           if ($perfil->setor != null && $perfil->setor != 0) {
                                               echo 'checked';
                                           }
                                           ?> />
                                    </div>

                                    <input type="hidden" name="id" value="<?php echo $perfil->id ?>">
                                </td>
                            </tr>








                            <!--
                            class "error" is used to change gray color to red
                            two different style, which is your favorite?
                            -->



                        </table>




                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success salve"><b>Salvar</b></button>
                        </div>



                    </div>                        
                </div>
            </div>
        </div>












    <?php
    echo form_close();
    ?>




        <!-- Modal editar  -->

        <!-- Modal excluir  -->
        <div class="modal fade" id="excluirModal-<?= $perfil->id ?>" tabindex="-1" role="dialog" aria-labelledby="excluirModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Deseja Excluir o Serviço <?= $perfil->nome ?> ?</h4>
                    </div>
                    <div class="modal-body">                    

                        <p>Após Excluido o <b><?= $perfil->nome ?></b> não ficara mais disponível no Sistema.</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a href="<?php echo base_url('admin/perfil/excluir/') . $perfil->id ?>" class="btn btn-danger">Excluir</a>
                    </div>

                </div>
            </div>
        </div>




    <?php
}
?>





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
echo form_open('admin/perfil/salvar');
?>

                    <div class="form-group">
                        <label class="label-modal" for="nome_perfil">Nome Perfil</label>
                        <input type="text" class="form-control" placeholder="Nome" name="nome_perfil" value="<?php echo set_value('nome_completo') ?>"/>
                    </div>


                    <table class="perfilTable">
                        <tr>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Notícias:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[1]" class="error" />
                                </div>
                            </td>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Eventos:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[2]" class="error" />
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Repositório:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[3]" class="error" />
                                </div>
                            </td>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Acessos:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[4]" class="error" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Servicos:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[5]" class="error" />
                                </div>
                            </td>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Fotos:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[6]" class="error" />
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Vídeos:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[7]" class="error" />
                                </div>
                            </td>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Áudios:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[8]" class="error" />
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Aniversários:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[9]" class="error" />
                                </div>
                            </td>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Ramais:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[10]" class="error" />
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Enquetes:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[11]" class="error" />
                                </div>
                            </td>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Usuários:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[12]" class="error" />
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Setores:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[13]" class="error" />
                                </div>
                            </td>
                            <td>
                                <div style="display: inline-flex;">
                                    <p class="perfilTitle">Perfil:</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input id="perfilCheck" type="checkbox" name="check[14]" class="error" />
                                </div>
                            </td>
                        </tr>








                        <!--
                        class "error" is used to change gray color to red
                        two different style, which is your favorite?
                        -->
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success salve"><b>Salvar</b></button>
                </div>
            </div>

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
