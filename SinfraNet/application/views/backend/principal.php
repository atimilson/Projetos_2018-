
<div class="container" style="width: 97%;">
    <?php
    ?>
    <div class="row" style="margin-top: 20px;">
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="background: #607d8b ;color:#ffffff"> 
                    <h1>Bem vindo!!</h1>                             
            <h3 style="text-transform: uppercase;
                color:#ffffff;"><b> <?= $this->session->userdata('permissoes')[0]->nome_completo ?></b></h3>                   
        </div>
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="background:red;">
                             
        </div>
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="background:blue;">
                             
        </div>
        
    </div>

    <div class="row" style="margin-top: 10px;">       
        <a href="<?php echo base_url('admin/noticia') ?>" title="Noticias">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="
                 background: linear-gradient(to bottom, #2193b0, #6dd5ed);">
                <div style="font-size: 20px;font-weight: bold;">
                    <p style="color: white;float: left;width: min-content;margin-top: 20px"><?= $noticias[0]->num_noticia.' Notícias Cadastradas' ?></p> <!-- 10 Noticias Cadastradas -->
                    <img style="float: right" src="<?php echo base_url('assets/backend/imagens/') ?>noticias.svg" width="150" height="150"/>
                </div>
            </div>
        </a>

        <a href="<?php echo base_url('admin/evento') ?>" title="Eventos">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="
                 background: linear-gradient(to bottom, #373b44, #4286f4);">
                <div style="font-size: 20px;font-weight: bold">
                    <p style="color: white;float: left;width: min-content;margin-top: 20px"><?= $eventos[0]->num_eventos.' Eventos Cadastrados' ?></p><!--35 Eventos Cadastrados -->
                    <img style="float: right" src="<?php echo base_url('assets/backend/imagens/') ?>dash-eventos.svg" width="150" height="150"/>
                </div>
            </div>     
        </a>
        <a href="<?php echo base_url('admin/servico') ?>" title="Serviços">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="
                 background: linear-gradient(to bottom, #005aa7, #fffde4); ">
                <div style="font-size: 20px;font-weight: bold;">
                    <p style="color: white;float: left;width: min-content;margin-top: 20px"><?= $servicos[0]->num_servicos.' Serviços Cadastrados' ?></p><!--09 Serviços Cadastrados -->
                    <img style="float: right" src="<?php echo base_url('assets/backend/imagens/') ?>acessos-dash.svg" width="150" height="150"/>
                </div>
            </div>
        </a>
    </div>

    <div class="row" style="margin-top: 10px ">
        <a href="<?php echo base_url('admin/repositorio') ?>" title="Documentos">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="
                 background: linear-gradient(to bottom, #a8c0ff, #3f2b96);">
                <div style="font-size: 20px;font-weight: bold">
                    <p style="color: white;float: left;width: min-content;margin-top: 20px"><?= $documentos[0]->num_documentos.' Documentos Cadastrados' ?></p><!--95 Documentos Cadastrados -->
                    <img style="float: right" src="<?php echo base_url('assets/backend/imagens/') ?>doc-dash.svg" width="150" height="150"/>
                </div>
            </div>     
        </a>

        <a href="<?php echo base_url('admin/video') ?>" title="Vídeos">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="                
                 background: linear-gradient(to bottom, #56ccf2, #2f80ed);">
                <div style="font-size: 20px;font-weight: bold">
                    <p style="color: white;float: left;width: min-content;margin-top: 20px"><?= $videos[0]->num_videos.' Vídeos Cadastrados' ?></p><!--17 Vídeos Cadastrados -->
                    <img style="float: right" src="<?php echo base_url('assets/backend/imagens/') ?>video-player.svg" width="150" height="150"/>
                </div>
            </div>     
        </a>
        <a href="<?php echo base_url('admin/audio') ?>" title="Áudios">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="
                 background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);">
                <div style="font-size: 20px;font-weight: bold">
                    <p style="color: white;float: left;width: min-content;margin-top: 20px"><?= $audios[0]->num_audios.' Áudios Cadastrados' ?></p> <!--05 Áudios Cadastrados -->
                    <img style="float: right" src="<?php echo base_url('assets/backend/imagens/') ?>dash-audio.svg" width="150" height="150"/>
                </div>
            </div>     
        </a>
    </div>


    <div class="row" style="margin-top: 10px ">
        <a href="<?php echo base_url('admin/foto') ?>" title="Álbuns">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="                 
                 background: linear-gradient(to bottom, #667db6, #0082c8, #0082c8, #667db6);">
                <div style="font-size: 20px;font-weight: bold">
                    <p style="color: white;float: left;width: min-content;margin-top: 20px"><?= $albuns[0]->num_albuns.' Álbuns Cadastrados' ?></p><!--07 Álbuns Cadastrados -->
                    <img style="float: right" src="<?php echo base_url('assets/backend/imagens/') ?>photo.svg" width="150" height="150"/>
                </div>
            </div>     
        </a>

        <a href="<?php echo base_url('admin/aniversarios') ?>" title="Aniversariantes">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="
                 background: linear-gradient(to bottom, #0575e6, #021b79);">
                <div style="font-size: 20px;font-weight: bold">
                    <p style="color: white;float: left;width: min-content;margin-top: 10px"><?= $aniversariantes[0]->num_aniversarios.' Aniversários Cadastrados' ?></p><!--07 Álbuns Cadastrados -->
                    <img style="float: right" src="<?php echo base_url('assets/backend/imagens/') ?>cake.svg" width="130" height="150"/>
                </div>
            </div>     
        </a>

        <a href="<?php echo base_url('admin/ramal') ?>" title="Ramais">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="                 
                 background: linear-gradient(to bottom, #000046, #1cb5e0);">
                <div style="font-size: 20px;font-weight: bold">
                    <p style="color: white;float: left;width: min-content;margin-top: 20px"><?= $ramais[0]->num_ramais.' Ramais Cadastrados' ?></p><!--47 Ramais Cadastrados -->
                    <img style="float: right" src="<?php echo base_url('assets/backend/imagens/') ?>phone-receiver.svg" width="150" height="150"/>
                </div>
            </div>     
        </a>
    </div>




</div>






