
<div class="container marginCima" style="padding-bottom: 10px;">
    <h4>Audios</h4>
    <div class="row" style="margin-top: 10px;">
        <?php 
        
        
        foreach ($listar_audios as $audios){
        
        ?>

        <div class="col-12 col-sm-4 col-md-12 col-lg-12 col-xl-4" style="margin-top: 15px;box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">            
            <audio controls style="width: 100%;margin-top: 10px;">
               
                <source src="<?= base_url().$audios->caminho_arquivo ?>" type="audio/mp3" preload="auto">
                Your browser does not support the audio element.
            </audio>
            <p class="titulo-video">
                <?= $audios->titulo ?>             
            </p>
        </div>
       
<?php 

        }
?>



    </div>