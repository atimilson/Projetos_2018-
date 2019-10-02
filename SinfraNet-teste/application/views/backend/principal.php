
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Noticias
            <small>Optional description</small>
        </h1>      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">

            <div class="col-md-5 col-lg-3 col-xs-6 col-noticia">                            
                <div class="small-box corpoNoticia">
                    <div class="noticiaPosicao">
                        <a href="#" >
                            <i class="fa fa-bars tamanho-icons-position"></i>
                        </a>
                    </div>
                    <div class="inner" style="">
                        <img class="img-noticia" src="<?php echo base_url('assets/backend/imagens/') ?>noticia1.jpg" width="367" height="180"/>
                        <p class="titulo-noticia">
                            Coletivo Françes esta sobre
                        </p>
                        <p class="sub-titulo-noticia">
                            Inscrições podem ser feitas
                        </p>
                        <div class="row"> 
                            <div class="col-md-5 col-lg-3 col-xs-6">
                                <a class="icone-preview" href="#" title="Preview">
                                    <i class="fa fa-eye tamanho-icons"></i>
                                </a>                                              
                            </div>
                            <div class="col-md-5 col-lg-3 col-xs-6">
                                <a class="icone-desativar" href="#" title="Desativar">
                                    <i class="fa fa-ban tamanho-icons"></i>
                                </a>
                            </div>
                            <div class="col-md-5 col-lg-3 col-xs-6">
                                <a class="icone-editar" href="#" title="Editar">
                                    <i class="fa fa-edit tamanho-icons"></i>
                                </a>
                            </div>
                            <div class="col-md-5 col-lg-3 col-xs-6">
                                <a class="icone-excluir" href="#" title="Excluir" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-trash tamanho-icons"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                                                                          
        </div>

        <div class="modal fade" id="modal-default" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #E3342F;color: white;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body…</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>
    <!-- /.content -->
</div>






