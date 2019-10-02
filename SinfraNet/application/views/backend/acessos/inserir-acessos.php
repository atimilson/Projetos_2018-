<div class="container">
    
     <?php if (isset($_SESSION['alterado'])) { ?>
        <script>
            var mensagem = "<strong>Acesso Alterado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
        <script>
            var mensagem = "<strong>Acesso Cadastrado com sucesso!</strong>";
            mostraDialogo(mensagem, "success", 2500);
        </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>

    <?php if (isset($_SESSION['excluido'])) { ?>
        <script>
            var mensagem = "<strong>Acesso excluído com sucesso!</strong>";
            mostraDialogo(mensagem, "danger", 2500);
        </script>
        <?php
        unset($_SESSION['excluido']);
    }
    
  
   
    ?>

    <h2>Lista de Acessos</h2>

    <div class="btn-input input-space form-row">
<!--        <select id="selecione" class="select-estilo">            
            <option value="nome">Nome</option>              
        </select>-->
        <input type="text" id="filtro-aniver" onkeyup="search_acesso()" placeholder="Pesquisar Acesso">        
    </div>

    <table class="table table-responsive" id="tableAcessos" style="border-collapse: separate;
           border-spacing: 0 10px; margin: 0 0 0 0;">
        <thead class="titulos-tabela">
            <tr>
                <th class="centro">ICONE</th>      
                <th class="centro">NOME</th>        
                <th class="centro">URL</th>        
                <th class="" style="text-align: center">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <!-- tabela acessos -->
            <?php  
                foreach ($acessos_todos as $acesso){
            ?>
            <tr class="corpo-tabela">
                <td class="">
                    <img src="<?php echo base_url('galeria/').$acesso->icone ?>" width="66" height="66"/>
                </td>

                <td class="coluna-ramal-dataAniver">
                    <?= $acesso->nome ?>
                </td>   
                <td class="coluna-ramal-dataAniver">
                    <a href="<?= $acesso->url ?>" target="_blank" title="<?= $acesso->url ?>" class="btn btn-primary">
                        URL do Acesso
                    </a>
                </td>
                
                <td align="center">
                    <div style="display: inline-flex;">
                        <a href="#" class="btn-editar-not" title="Editar" data-toggle="modal" data-target="#editarModal-<?= $acesso->id ?>" style="margin-right: 10px">
                            <i class="material-icons centro-icon">edit</i>
                        </a> 
                        <a href="#" class="btn-excluir-not" title="Excluir" data-toggle="modal" data-target="#excluirModal-<?= $acesso->id ?>">
                            <i class="material-icons centro-icon">delete_forever</i>
                        </a>

                    </div>
                </td>
            </tr>


<!-- fim tabela acessos -->


<!-- Modal editar  -->
            <div class="modal fade" id="editarModal-<?= $acesso->id ?>" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Alterar Acesso.</h4>
                        </div>
                        <div class="modal-body">                    
                            <?php
                            echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                            echo form_open_multipart('admin/acessos/alterar');
                            ?>
                            
                            <img src="<?php echo base_url('galeria/').$acesso->icone ?>" width="80" height="80">
                            <div class="form-group">
                                <label class="label-modal" for="icone">icone</label>
                                <input type="file" class="form-control" id="icone" name="icone" placeholder="Nome"/>
                            </div>
                            
                            <div class="form-group">
                                <label class="label-modal" for="nome_sistema">Nome</label>
                                <input type="text" class="form-control" id="nome_sistema" name="nome_sistema" value="<?= $acesso->nome ?>" placeholder="Nome"/>
                            </div>
                            <div class="form-group">
                                <label class="label-modal" for="url">Ramal</label>
                                <input type="url" class="form-control" id="url" name="url" placeholder="url" value="<?php echo $acesso->url ?>" style="width: 100%"/>
                            </div>
                            
                            <input type="hidden" id="id" name="id" value="<?= $acesso->id ?>"/>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success salve"><b>Salvar</b></button>
                        </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
<!-- Modal editar  -->

<!-- Modal excluir  -->
            <div class="modal fade" id="excluirModal-<?= $acesso->id ?>" tabindex="-1" role="dialog" aria-labelledby="excluirModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Excluir Acesso</h4>
                        </div>
                        <div class="modal-body">                    
                            <h4>Confirmar a Exclusão do Acesso.</h4>
<!--                                <h4>Deseja Excluir - <?= $acesso->nome ?> ?</h4>-->
                                    <p>Após Excluido o Acesso <b><?= $acesso->nome ?></b> não ficara mais disponível no Sistema.</p>
                                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href="<?php echo base_url('admin/acessos/excluir/') . $acesso->id ?>" class="btn btn-danger">Excluir</a>
                        </div>
                        
                    </div>
                </div>
            </div>
<!-- fim Modal excluir  -->


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
                        <h4 class="modal-title" id="myModalLabel">Inserir Acessos</h4>
                    </div>
                    <div class="modal-body">                    
                        <?php
                        echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                        echo form_open_multipart('admin/acessos/salvar');
                        ?>
                        <div class="form-group">
                            <label class="label-modal" for="icone">Icone</label>
                            <input type="file" class="form-control" id="icone" name="icone" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="nome-acesso">Nome</label>
                            <input type="text" class="form-control" id="nome-acesso" name="nome-acesso" placeholder="Nome do Acesso"/>
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="url">URL do Acesso</label>
                            <input type="url" class="form-control" id="url" name="url" placeholder="URL do Acesso"/>
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
