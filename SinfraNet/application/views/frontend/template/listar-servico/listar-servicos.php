
<div class="container marginCima" style="padding-bottom: 10px;">
   
    <div class="row ">
        <?php
        foreach ($listas_servicos as $servicos) {
            ?>

            <div class="col-md-2 espaco-acess">
                <a href="<?= $servicos->url ?>" class="links-acessos" target="_brank">
                    <div class="corpo-serv">                        
                        <p class="nome-sistema"><?= $servicos->nome ?></p>
                        <p class="descr-sistema"><?= $servicos->descricao ?></p>
                    </div>                
                </a>
            </div>
            <?php
        }
        ?>
    </div>