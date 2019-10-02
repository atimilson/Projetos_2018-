
<div class="content">
    <p><br/></p>
    <table class="table table-striped table-bordered table-hover" id="mydata">
        <thead>
            <tr>
                <th>#</th>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>DATA</th>
                <th>SETOR</th>
                <th>AÇOES</th>
            </tr>
        </thead>                
        <tbody>
            <?php foreach ($documentos_todos as $documento){  ?>
            <tr>
                
                
                <td>
                    <img src="<?php echo base_url('assets/frontend/imagens/') ?><?php 
                         if($documento->extencao_doc == ".pdf" || $documento->extencao_doc == ".PDF"){
                             echo 'pdf.svg';
                         }elseif ($documento->extencao_doc == ".docx" || $documento->extencao_doc == ".doc" ) {
                              echo 'word.svg';   
                         }elseif ($documento->extencao_doc == ".xlsx" || $documento->extencao_doc == ".xls" ) {
                                 echo 'excel.svg';
                         }elseif ($documento->extencao_doc == ".ppt" || $documento->extencao_doc == ".pptx" ){
                             echo 'powerpoint.svg';
                         }
                         ?>
                         " width="25" height="25"/>    
                </td>
                
                
                
                <td><?= $documento->nome_doc ?></td>
                <td class="limitar_descricaoDoc">
                    <a tabindex="0" class="" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" 
                    title="Descrição Completa" 
                    data-content="
                    <?= $documento->descricao ?>                 
                    ">
                    <?= $documento->descricao ?>
                </a>
            </td>
            
            
            
               <?php
                    $date = new DateTime($documento->data_publicado);
                    ?>
                   
                       
            
            <td>
                 
                            <?php echo $date->format('d/m/Y') ?>
                        
            </td>
            <td><?= $documento->nome_setor ?></td>
            <td>
                <a href="<?= base_url($documento->caminho_doc) ?>" download>
                <i class="fas fa-download"></i>
                Baixar Documento
            </a>
        </td>
    </tr>
   
            <?php } ?>
</tbody>
<tfoot>  
    <tr>
        <th>#</th>
        <th>NOME</th>
        <th>DESCRIÇÃO</th>
        <th>DATA</th>
        <th>SETOR</th>
        <th>AÇOES</th>
    </tr>
</tfoot>
</table>




</div><!--FIM CONTENT-->
</div>
</div>
 

