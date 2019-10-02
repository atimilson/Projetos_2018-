<div class="container">
        <div class="row">
            <?php foreach ($exibe_postagem as $postagem){ ?>
            <div class="col-md-10">
                <div class="titulo_padrao_noticia">
                    <h1><?php echo $postagem->titulo ?></h1>
                </div>
                <div class="sub-titulo_padrao_noticia">
                    <h5><?php echo $postagem->subtitulo ?>
                    </h5>
                </div>
                <hr>
               
                <div class="publicacao_padrao_noticia">
                    <?php
                    $date = new DateTime($postagem->data_evento);
                    ?>
                   
                    
                    <p class="notificacao_padrao_noticia">Autor <?= $postagem->autor_noticia ?></p>
                    
                    <p class="notificacao_padrao_noticia"><?php echo $date->format('d/m/Y H:i') ?></p>
                    
                    <p class="notificacao_padrao_noticia">Imagens : <?= $postagem->autor_imagens ?></p>
                </div>

                <div>
                	<?php echo $postagem->conteudo ?>
                  
                </div>
                <br>            
            </div>
            <?php 
            }
            
            ?>
            
        </div>
    </div>