<div class="container marginCima">
    <div class="row">
        
        
        <?php
        
        
        foreach ($listas_servicos as $servicos){
        
        ?>
        
        <div class="col-md-3 espaco-serv">
            <div class="card">
                <div class="card-body corpo">                        
                    <p class="card-text"><?= $servicos->nome ?></p>
                    <a href="<?= $servicos->url ?>" target="_blank" class="btn estilo-acesso">Acessar</a>                    
                    <i class="material-icons posicao-help" data-toggle="tooltip" data-placement="top" title="<?= $servicos->descricao ?>">help_outline</i>                    
                </div>
            </div>
        </div>
      
        <?php
        }
        
        ?>

    </div>