<div class="container">

    <?php if (isset($_SESSION['alterado'])) { ?>
                <script>
                    var mensagem = "<strong>Informações alteradas com sucesso!</strong><br>Suas informações foram alteradas.";
                    mostraDialogo(mensagem, "success", 2500);
                </script>
        <?php
        unset($_SESSION['alterado']);
    }
    ?>
    <?php if (isset($_SESSION['inserido'])) { ?>
                <script>
                    var mensagem = "<strong>Informações cadastradas com sucesso!</strong><br>Suas informações foram cadastradas.";
                    mostraDialogo(mensagem, "success", 2500);
                </script>
        <?php
        unset($_SESSION['inserido']);
    }
    ?>

    <?php if (isset($_SESSION['excluido'])) { ?>
                <script>
                    var mensagem = "<strong>Documento excluido com sucesso!</strong>";
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


    <h2>Repositório de Documentos</h2>

    <div class="btn-input input-space form-row">
        <select id="selecione" class="select-estilo">
            <option>Selecionar Filtro</option>
            <option value="categoria">Categoria</option>
            <option value="subcategoria">SubCategoria</option>
            <option value="Nome-doc">Nome Documento</option>
        </select>
        <input type="text" id="filtro-aniver" style="width: 82.6%;" onkeyup="search_aniver()" placeholder="Selecionar Filtro ao Lado">
    </div>

    <table class="table table-responsive" id="table-categoria" style="border-collapse: separate;
           border-spacing: 0 10px; margin: 0 0 0 0;">
        <thead class="titulos-tabela">
            <tr>
                <th class="centro">CATEGORIA</th>
                <th class="centro">SUBCATEGORIA</th>
                <th class="centro">NOME DOCUMENTO</th>
                <th class="centro">DESCRIÇÃO</th>
                <th class="centro">FORMATO</th>
                <th class="centro">AÇÕES</th>
            </tr>
        </thead>
        <tbody id="corpo-tabela">
            <!-- tabela aniversariantes -->

            <?php foreach ($documentos_todos as $documentos) { ?>

                <tr class="corpo-tabela">
                    <td class="coluna-nome"><?= $documentos->nome_categoria ?></td>

                     <td class="coluna-nome"><?php if($documentos->nome_sub == null){
                        echo 'S/ subcategoria';
                        
                     }else{
                         echo  $documentos->nome_sub;
                         
                     } ?></td>


                    <td class="coluna-nome"><?= $documentos->nome_doc ?></td>
                    <td class="">
                    <a tabindex="0" class="btn btn-default teste" role="button" data-toggle="popover" data-trigger="focus" title="Descrição do Documento" data-content="<?= $documentos->descricao ?>">Descrição</a>
                    </td>
                    <td class="coluna-nome"><img src="<?php echo base_url('assets/frontend/imagens/')?><?php 
                         if($documentos->extencao_doc == ".pdf" || $documento->extencao_doc == ".PDF"){
                             echo 'pdf.svg';
                         }elseif ($documentos->extencao_doc == ".docx" || $documentos->extencao_doc == ".doc" ) {
                              echo 'word.svg';   
                         }elseif ($documentos->extencao_doc == ".xlsx" || $documentos->extencao_doc == ".xls" ) {
                                 echo 'excel.svg';
                         }elseif ($documentos->extencao_doc == ".ppt" || $documentos->extencao_doc == ".pptx" ){
                             echo 'powerpoint.svg';
                         }
                         
                         ?>
                         " width="25" height="25"/></td>
                    <td class="coluna-nome as" align="center">
                        <div style="display: inline-flex;">
                          <a href="<?php echo base_url().'repositorio/'.$documentos->nome_setor.'/'.$documentos->nome_arquivo ?>" class="btn-preview" title="Download" data-toggle="modal" data-target="" style="margin-right: 4px;" download>
                              <i class="material-icons centro-icon">get_app</i>
                          </a>
                            <a id="btneditarModal-<?= $documentos->id ?>" href="#" class="btn-editar-not" title="Editar" data-toggle="modal" data-target="#editarModal-<?= $documentos->id?>" style="margin-right: 4px;" data-categoria="<?= $documentos->categoria ?>">
                                <i class="material-icons centro-icon">edit</i>
                            </a>

                            <?php if ($this->session->userdata('permissoes')[0]->perfil_id == "1") {
                              // code...
                                
                               
                            ?>
                            <a href="#" class="btn-excluir-not" title="Excluir" data-toggle="modal" data-target="#excluirModal-<?= $documentos->id?>" >
                                <i class="material-icons centro-icon">delete_forever</i>
                            </a>

                            <?php } ?>

                        </div>
                    </td>
                </tr>
                <!-- Modal editar  -->
            <div class="modal fade" id="editarModal-<?= $documentos->id ?>" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Alterar Documento</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                            echo form_open_multipart('admin/repositorio/alterar');
                            ?>
                            <div class="form-group">
                            <label class="label-modal" for="documento">Documento</label>
                            <input type="file" class="form-control" id="documento" name="documento"  />
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Documento" value="<?= $documentos->nome_doc ?>"/>
                        </div>
                         <div class="form-group">
                            <label class="label-modal" for="descricao">Descrição</label>
                            <input type="hidden" id="categoria-<?= $documentos->id ?>" value="<?= $documentos->categoria ?>">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $documentos->id ?>"/>
                            <textarea class="form-control" id="descricao" name="descricao" ><?= $documentos->descricao ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="categoria">Categoria</label>
                            <select id="edit-categoria-pai-<?=  $documentos->id ?>" class="form-control" name="edit-categoria-pai" required="required">
<!--                                <option value="<?= $documentos->categoria ?>" selected hidden><?= $documentos->nome_categoria ?></option>-->
                                            <option value="" disabled selected hidden>Selecione</option>

                                <?php foreach ($categorias_todos as $categorias) { ?>
                                    <option value="<?= $categorias->id ?>"><?= $categorias->nome ?></option>

                                <?php } ?>
                            </select>
                        </div>
                            
                        <div class="form-group">
                            <label class="label-modal" for="categoria">Subcategoria</label>
                            <select id="edit-categoria-filho-<?= $documentos->id ?>" class="form-control" name="edit-categoria-filho" >
                               

                                
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
            <!-- Modal editar  -->

            <!-- Modal excluir  -->
            <div class="modal fade" id="excluirModal-<?= $documentos->id ?>" tabindex="-1" role="dialog" aria-labelledby="excluirModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Excluir Documento</h4>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja Excluir o aniversário de <?= $lista_aniversarios->nome ?> ?</h4>
                            <p>Após Excluido, <b><?= $lista_aniversarios->nome ?></b> não ficara mais disponível no Sistema.</p>
                            <p>O aniversário será excluido permanetemente.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href="<?php echo base_url('admin/repositorio/excluir/') . $documentos->id ?>" class="btn btn-danger">Excluir</a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- fim Modal excluir  -->
            <script>
                
                $(document).ready(function (){
                  
                  $('#edit-categoria-pai-<?=  $documentos->id ?>').on('change', function (){
               
               //   var sub_categoria_pai = (document.getElementById('edit-categoria-pai-<?=  $documentos->id ?>').value);
                  var id_categoria = $('#edit-categoria-pai-<?=  $documentos->id ?>').val();
                  console.log(id_categoria);
                  $.ajax({
                      type: 'POST',
                      url: "<?php echo base_url('admin/repositorio/listar_sub')?>",
                      data: {id_subcategoria: id_categoria},
                      dataType: 'json',
                      beforeSend: function () {
                //Aqui adicionas o loader
//                        $("#load-c").html("<img src='<?= base_url('assets/backend/imagens/ajax-loader.gif') ?>' width='100'>");
                        },  
                      success: function (data) {

                      
                     //     $("#load-c").html("");
                          var html ='';
                          html +='<option value="" disabled selected hidden>Selecione</option>';
                          var i;
                          for(i=0; i<data.length; i++){
                              
                              html += '<option value="'+ data[i].id_subcategoria +'">'+ data[i].nome_sub +'</option>';
                              
                            
                            console.log(data);
                            
                            
                        }
                        
                        $('#edit-categoria-filho-<?= $documentos->id ?>').html(html);   
                     
                        
                    }
                    
                        
                  });
                  
                });
                
                
                   
                   
                   
                   
                });
                    
            
            
            
            </script>
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
                        
                        <h4 class="modal-title" id="myModalLabel">Upload de Arquivo </h4>
                        
                    </div>
                    <div class="modal-body">
                        <?php
                         echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                        echo form_open_multipart('admin/repositorio/inserir');
                        ?>
                        <div class="form-group">
                            <label class="label-modal" for="documento">Documento</label>
                            <input type="file" class="form-control" id="documento" name="documento" required="required" value="<?php echo set_value('documento')?>"/>
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Documento" value="<?php echo set_value('nome') ?>"/>
                        </div>
                         <div class="form-group">
                            <label class="label-modal" for="descricao">Descrição</label>
                          <!--  <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição Documento"/> -->
                            <textarea class="form-control" id="descricao" name="descricao" ><?php echo set_value('descricao') ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="label-modal" for="categoria">Categoria</label>
                            <select id="categoria-pai" class="form-control" name="categoria">
                                <option value="" disabled selected hidden>Selecione</option>

                                <?php foreach ($categorias_todos as $categorias) { ?>
                                    <option value="<?= $categorias->id ?>"><?= $categorias->nome ?></option>

                                <?php } ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label class="label-modal" for="categoria-filho">Subcategoria</label>
                            <select id="categoria-filho" class="form-control" name="categoria-filho">
                               

                                
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div id="load-c" style="float: left"></div>
                        
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
 <script>
            
            $(document).ready(function (){
                
               $('#categoria-pai').on('change',function (){
                  
                  var sub_categoria = (document.getElementById('categoria-pai').value);
                  
                  $.ajax({
                      type: 'POST',
                      url: "<?php echo base_url('admin/repositorio/listar_sub_cadastrar')?>",
                      data: {id: sub_categoria},
                      dataType: 'json',
                      beforeSend: function () {
                //Aqui adicionas o loader
                        $("#load-c").html("<img src='<?= base_url('assets/backend/imagens/ajax-loader.gif') ?>' width='100'>");
                        },  
                      success: function (data) {
                          
                          
                       
                          $("#load-c").html("");
                          var html ='';
                          html +='<option value="" disabled selected hidden>Selecione</option>';
                          var i;
                          for(i=0; i<data.length; i++){
                              
                              html += '<option value="'+ data[i].id_subcategoria +'">'+ data[i].nome_sub +'</option>';
                              
                            
                            
                            
                            
                        }
                        
                        
                     $('#categoria-filho').html(html);   
                        
                    }
                        
                  });
                });
                
                
             
                
                
                
                
                
                
                
            });
            
            </script>
