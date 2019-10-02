<div class="col-12 col-sm-12 col-md-3 col-lg-4 col-xl-3"><!--aki é o começo da col-3 que compoe as ultimas noticias mais lidas e aniver-->



    <!--INICIO ANIVERSARIOS-->
    <div class="row" style="border: 1px solid rgba(0,0,0,0.1); margin-left: 0;margin-right: 0;margin-bottom: 5px;">
        <div class="titulo-ultimasNoticias">
            <img src="<?php echo base_url('assets/frontend/imagens/') ?>aniversario.svg" class="img-fluid" alt="Responsive image">
            ANIVERSÁRIOS
        </div>

        <div class="scroll-niver">

            <table class="table-striped" style="margin-top: 10px; border-spacing: 5px;border-collapse: separate;">                                    
                <tbody>
                    <?php
                    foreach ($aniversarios as $aniversario) {
                        $date = new DateTime($aniversario->data_nasc);
                        ?>

                        <tr>
                            <td > <?php echo $date->format('d/m') ?> </td>
                            <td> <?= $aniversario->nome ?> </td>
                        </tr>  

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--FIM ANIVERSARIOS-->

    <!--
    </div>
    </div>
    </section>-->