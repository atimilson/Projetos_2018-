
<div class="container marginCima" style="padding-bottom: 10px;">
   
    <div class="row linhaFundo">
        <?php
        foreach ($listar_acessos as $acessos) {
            ?>

            <div class="col-md-2 espaco-acess">
                <a href="<?= $acessos->url ?>" class="links-acessos" target="_brank">
                    <div class="corpo-serv">
                        <img style="margin-top: 16px; position: relative;left: 50%;margin-left: -40px" 
                             src="<?php echo base_url('galeria/') . $acessos->icone ?>" height="80" width="80"/>
                        <p class="nome-sistema"><?= $acessos->nome ?></p>
                    </div>                
                </a>
            </div>
            <?php
        }
        ?>

    </div>