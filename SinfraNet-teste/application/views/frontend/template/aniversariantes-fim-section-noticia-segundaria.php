<div class="row espaco-titulos">
    <div class="col-md-12">
        <div class="img-niver"></div>
        <div class="titulo-ult-noticia">ANIVERSARIANTES</div>
    </div>                                    
</div><!--FIM TITULO-->

<div class="scroll-niver">
    
    


            <!--       $date = new DateTime($lista_aniversarios->data_nasc);
//                    
//                     
//                    <td class="coluna-ramal-dataAniver">//<?php // echo $date->format('d/m/Y') ?></td> -->
                  


                    
              
                    
                    
    <table style="margin-top: 10px; border-spacing: 5px;border-collapse: separate;" >
        <?php
        
        foreach ($aniversarios as $aniversario){ 
         $date = new DateTime($aniversario->data_nasc);
                 
            ?>
        <tr >
            <td style="border-top: 1px solid black; border-right: 1px solid black;"> <?php echo $date->format('d/m') ?></td>
            <td><?= $aniversario->nome ?></td>
        </tr>
        <?php } ?>
    </table>













</div>
</div>
</div>
</section><!--FIM Section de noticias secundarias-->