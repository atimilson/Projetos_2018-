<div class="container" id="tamanho-container">
    
    
    <?php if(isset($_SESSION['mensage'])){ ?>
<script>
    var mensagem = "<strong>Noticia alterada com sucesso!</strong>";
        mostraDialogo(mensagem, "success", 2500);
 </script>
 <?php
 unset($_SESSION['mensage']);
    }
 ?>
 
  <?php if(isset($_SESSION['alterado'])){ ?>
<script>
    var mensagem = "<strong>Noticia alterada com sucesso!</strong>";
        mostraDialogo(mensagem, "success", 2500);
 </script>
 <?php
 unset($_SESSION['alterado']);
    }
 ?>
  <?php if(isset($_SESSION['inserido'])){ ?>
<script>
    var mensagem = "<strong>Noticia cadastrada com sucesso!</strong>";
        mostraDialogo(mensagem, "success", 2500);
 </script>
 <?php
 unset($_SESSION['inserido']);
    }
 ?>
 <?php if(isset($_SESSION['excluido'])){ ?>
<script>
    var mensagem = "<strong>Noticia excluida com sucesso!</strong>";
        mostraDialogo(mensagem, "danger", 2500);
 </script>
 <?php
 unset($_SESSION['excluido']);
    }
 ?>
 
 <?php if(isset($_SESSION['publicar'])){ ?>
<script>
    var mensagem = "<strong>Noticia publicada com sucesso!</strong>";
        mostraDialogo(mensagem, "success", 2500);
 </script>
 <?php
 unset($_SESSION['publicar']);
    }
 ?>
 
 <?php if(isset($_SESSION['desativar'])){ ?>
<script>
    var mensagem = "<strong>Noticia desativada com sucesso!</strong>";
        mostraDialogo(mensagem, "success", 2500);
 </script>
 <?php
 unset($_SESSION['desativar']);
    }
 ?>
 
 
    <div class="titulo-listar col-md-12">
       <?php
        $publicado = 0;
        $npublicado = 0;
        
        foreach ($noticias_todos as $noticia_todos) {
            if($noticia_todos->publicado == 1){
            $publicado ++;
            
        }else {
            $npublicado ++;
        }
            
        }
        
        
        
        
        
        
        ?>
        
        <div class="listar-noticias col-md-4">Notícias Cadastradas: <?php echo count($noticias_todos) ?> </div>
        <div class="listar-noticias col-md-4">Notícias Publicadas: <?php echo $publicado ?></div>
        <div class="listar-noticias col-md-4">Notícias não Publicadas: <?php echo $npublicado ?></div> 
        
        <div class="listar-noticias col-md-4">Notícias Caroussel: <?php  foreach ($noticias_carrosel as $noticia_car) {echo "<a href='#noticia-".$noticia_car->id."'>".$noticia_car->id."</a>";} ?></div>
        <div class="listar-noticias col-md-4">Notícias Principais: <?php  foreach ($noticias_princial as $noticia_prin) {echo "<a href='#noticia-".$noticia_prin->id."'>".$noticia_prin->id."</a>";} ?></div>
        <div class="listar-noticias col-md-4">Notícias Secundárias: <?php  foreach ($noticias_secundaria as $noticia_sec) {echo "<a href='#noticia-".$noticia_sec->id."'>".$noticia_sec->id."</a>";} ?></div>
       
        
        
    </div>

    <div class="row esp">  
        <!-- inicio bloco de codigo php -->
        <?php
        foreach ($noticias_todos as $noticia_todos) {
            ?>
        <div class="col-md-3 spaceNoticia" id="noticia-<?php echo $noticia_todos->id ?>">
                <div>
                    <div style="float: left;color: #c1c0c0"><?= $noticia_todos->id ?></div>   
                    <div class="escolha">
                        <a class="pontos" href="modal" data-toggle="modal" data-target="#modal-posi-<?php echo $noticia_todos->id ?>">                            
                            <i class="material-icons">reorder</i>                            
                        </a>                        
                    </div>
                    <!--modal 'escoher posicionamento das noticias'-->
                    <div class="modal fade" id="modal-posi-<?php echo $noticia_todos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content tamanho-modal">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Selecionar Posicionamento</h4>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                                    echo form_open('admin/noticia/alterar_posicao');
                                    ?>
                                        <?php echo form_error ('check[]'); ?> 
                                    <div class="form-check">
                                        <label>
                                            <input type="checkbox" name="check[1]" <?php if($noticia_todos->posicao_carrousel != null && $noticia_todos->posicao_carrousel != 0){echo 'checked';} ?> > <span class="label-text">Carousel</span>
                                            <img src="<?php echo base_url('assets/backend/imagens/') ?>carrosel.svg" width="150" height="100"/>               
                                    </div>   

                                    <div class="form-check">
                                        <label>
                                            <input type="checkbox" name="check[2]" <?php if($noticia_todos->posicao_tres != null && $noticia_todos->posicao_tres != 0){echo 'checked';} ?>> <span class="label-text">Principal</span>
                                            <img src="<?php echo base_url('assets/backend/imagens/') ?>tres.svg" width="150" height="100"/>               
                                    </div> 

                                    <div class="form-check">
                                        <label>
                                            <input type="checkbox" name="check[3]" <?php if($noticia_todos->posicao_quadro != null && $noticia_todos->posicao_quadro != 0){echo 'checked';} ?>> <span class="label-text">Secundária</span>
                                            <img src="<?php echo base_url('assets/backend/imagens/') ?>quatro.svg" width="150" height="100"/>               
                                    </div> 
                                    
                                    <input type="hidden" name="id" value="<?php echo $noticia_todos->id ?>">

                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="cancel-modal btn btn-default " data-dismiss="modal"><b>Cancelar</b></button>

                                    <button type="submit" class="btn btn-success" ><b>Salvar</b></button>

                                </div>
                                <?php
                                echo form_close();
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--fim modal posicionamento das noticias-->


                    <div class="card-img" align="center" >
                        <?php if ($noticia_todos->img == '') { ?>

                            <img src="<?php echo base_url('assets/backend/semfoto/') ?>semFoto.png" class="css-foto"/>
                            <?php
                        } else {
                            ?>
                            <img src="<?php echo base_url('galeria/') . $noticia_todos->img ?>" class="css-foto"/>
                            <?php
                        }
                        
                          foreach ($noticias_carrosel as $noticia_car) {
                              if($noticia_car->id == $noticia_todos->id){
                                  echo '<span><h4>Carrousel</h4></span>';
                                }
                              }
                              foreach ($noticias_princial as $noticia_prin) {
                              if($noticia_prin->id == $noticia_todos->id){
                                   echo '<span><h4>Principal</h4></span>';
                                }
                              }
                              
                        foreach ($noticias_secundaria as $noticia_sec) {
                              if($noticia_sec->id == $noticia_todos->id){
                                   echo '<span><h4>Secundária</h4></span>';
                                }
                              }
                        
                        
                                                 ?>
                        
                          
                    </div>
                    <div class="limite-texto">
                        <p><?php echo substr($noticia_todos->titulo, 0, 40) . "..." ?></p> 
                        <p><?php echo substr($noticia_todos->subtitulo, 0, 27) . "..." ?></p>
                    </div>
                

                    <div style="margin-top: 58px">
                    <?php
                    $date = new DateTime($noticia_todos->data_noticia);
                    ?>
                    <h6>Criado em : <?php echo $date->format('d-m-Y H:i:s') ?></h6>
                </div>
                    </div>
                <div class="row" style="padding-top: 25px;" align="center">
                    <div class="col-md-3 margon">
                        <a href="<?php echo base_url('admin/noticia/preview/') . $noticia_todos->id; ?>" class="btn-preview" title="Preview">
                            <i class="material-icons centro-icon">remove_red_eye</i>
                        </a>
                    </div>
                    <?php if ($noticia_todos->publicado == 1) { ?>
                        <div class="col-md-3 margon">
                            <a href="modal" data-toggle="modal" data-target=".desativar-modal-<?= $noticia_todos->id ?>" class="btn-desativar" title="Desativar" >
                                <i class="material-icons centro-icon">block</i>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-3 margon">
                            <a href="modal" data-toggle="modal" data-target=".publicar-modal-<?= $noticia_todos->id ?>" class="btn-publicar" title="Publicar" >
                                <i class="material-icons centro-icon">send</i>
                            </a>
                        </div>

                    <?php } ?>
                    <!--  Modal para desativar noticia -->
                    <div class="modal fade desativar-modal-<?= $noticia_todos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar desativação da Notícia <?= $noticia_todos->id ?> .</h4>
                                </div>
                                <div class="modal-body">
                                    
                                    <p>Desativar a Noticia, retira a visualização na página principal.</p>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                     <a type="button" href="<?php echo base_url('admin/noticia/desativar/') . $noticia_todos->id; ?>" class="btn btn-success" >
                                
                                        Desativar
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- fim Modal para desativar noticia -->
                    
                    <!--  Modal para publicar noticia -->
                       <div class="modal fade publicar-modal-<?= $noticia_todos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                   <h4>Confirmar Publicação da Notícia <?= $noticia_todos->id ?>.</h4>
                                </div>
                                <div class="modal-body">
                                    
                                    <p> A Notícia <b><?= $noticia_todos->id ?></b> será publicada na página principal.</p>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                     <a type="button" href="<?php echo base_url('admin/noticia/publicar/') . $noticia_todos->id; ?>" class="btn btn-success" >
                                
                                        Publicar
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Fim  Modal para publicar noticia -->
                    

                    <div class="col-md-3 margon">
                        <a href="<?php echo base_url('admin/noticia/alterar/') . $noticia_todos->id; ?>" class="btn-editar-not" title="Editar" >
                            <i class="material-icons centro-icon">edit</i>
                        </a> 
                    </div>
                    <div class="col-md-3 margon">

                        <a href="modal" data-toggle="modal" data-target=".excluir-modal-<?= $noticia_todos->id ?>" class="btn-excluir-not" title="Excluir" >
                            <i class="material-icons centro-icon">delete_forever</i>
                        </a>
                    </div>

                    <div class="modal fade excluir-modal-<?= $noticia_todos->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4>Confirmar exclusão da Notícia <?= $noticia_todos->id ?> .</h4>
                                </div>
                                <div class="modal-body">
                                    
                                   
                                    <p>A Notícia será excluida do Sistema.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="modal-cancel btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <a type="button" class="btn btn-danger modal-excluir" href="<?php echo base_url('admin/noticia/excluir/') . $noticia_todos->id; ?>">Excluir </a>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>


            </div>

            <?php
        }
        ?>
        <!-- fim php -->


    </div>

</div>
</div>
<div id="mybutton">
    <a class="btn-adicionar" href="<?php echo base_url('admin/noticia/form_inserir') ?>">

        <i class="material-icons" id="btn-addi">
            add
        </i>
        <!--        <button class="feedback">
                </button>-->
    </a>
</div>
</div>
