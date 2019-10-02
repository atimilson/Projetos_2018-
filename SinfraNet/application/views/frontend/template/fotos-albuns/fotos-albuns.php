
<div class="container marginCima" style="padding-bottom: 10px;">
    <h3>FOTOS - <?= $retorno[0]->titulo ?></h3>
    <div class="row">
        <div class="row">
            
            <?php 
            foreach ($listar_fotos as $fotos){
            
            ?>
            
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="<?= base_url().$fotos->caminho_arquivo ?>"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="<?= base_url().$fotos->caminho_arquivo ?>" style="width: 100%; height: 200px; object-fit: contain;"
                        >
                </a>
            </div>
            
            <?php } ?>
           
        </div>


        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="" style="width: 100%; height: auto;max-height: 600px ;object-fit: contain;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>