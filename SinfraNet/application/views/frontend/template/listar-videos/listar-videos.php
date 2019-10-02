<div class="container marginCima" style="padding-bottom: 10px;">
    <h3>Videos</h3>
    <div class="row" style="margin-top: 10px;">
        <?php 
        foreach ($videos_todos as $videos){
        ?>
        <div class="col-12 col-sm-4 col-md-12 col-lg-12 col-xl-4" style="margin-bottom: 5px;">
            
            <a href='<?= $videos->url_preview ?>'
               class="lightview" 
               data-lightview-type="iframe" 
               data-lightview-options="
               width: 638,
               height: 360,
               viewport: 'scale'
               ">
               <img src="<?= $videos->tumb_video ?>" title="<?= $videos->titulo ?>" width="100%" height="250" style="border: 1px solid rgba(0,0,0,0.2);">
            </a>            
            <p class="titulo-video">
               <?= $videos->titulo ?>
            </p>
        </div>
        <?php 
        }
        ?>

    </div>