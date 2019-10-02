
<div class="container">
        <div class="row">
             <div class="publicacao_padrao_noticia">
<!--                    <p class="notificacao_padrao_noticia">Por Manoel Junior</p>
                    <p class="notificacao_padrao_noticia">18/04/2018 13h31</p>-->
                    <a href="<?php echo base_url('admin/noticia') ?>"><button class="btn btn-primary">Voltar a lista de notícias</button></a>
                </div>
            <?php 
            foreach ($noticias_todos as $postagem){ ?>
            <div class="col-md-10">
                <div class="titulo_padrao_noticia">
                    <h1><?php echo $postagem->titulo ?></h1>
                </div>
                <div class="sub-titulo_padrao_noticia">
                    <h5><?php echo $postagem->subtitulo ?>
                    </h5>
                </div>
                <hr>
               
               

                <div>
                	<?php echo $postagem->conteudo ?>
                  
                </div>
                <br>            
            </div>
            <?php 
            }
            
            ?>
            
        </div>
    <a href="<?php echo base_url('admin/noticia') ?>"><button class="btn btn-primary">Voltar a lista de notícias</button></a>
    </div>

</div>


        
       
        
        
  