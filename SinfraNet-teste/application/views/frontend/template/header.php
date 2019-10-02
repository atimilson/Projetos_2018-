    <div class="menu">
    <div class="header-inner">
        <div class="logo">
            <a href="#">
                <img alt="SINFRA" height="144" src="<?php echo base_url('assets/frontend/imagens/')?>layout_set_logo.png">                
            </a>
        </div>
        <div class="algo-a-mais">
            
        </div>
    </div>
</div>
<div class="sub-menu">
    <nav class="navbar navbar-expand-lg sub-menu-meio">        
        <ul id="trans-nav">
            <li><a href="<?php echo base_url('home')?>">HOME</a></li>
            <li><a href="#">INSTITUCIONAL</a>
                <ul class="sub-menu-institucional">
                    <li><a href="<?php echo base_url('home/subMenu_visao_misao')?>">MISSÃO/VISÃO</a></li>
                    <li><a href="<?php echo base_url('home/subMenu_quem_e_quem')?>">QUEM É QUEM</a></li>
                    <li><a href="<?php echo base_url('home/subMenu')?>">HISTÓRIA</a></li>
                    <li><a href="<?php echo base_url('assets/frontend/imagens/')?>organograma.pdf" target="_brank">ORGANIZAÇÃO FUNCIONAL</a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url('home/listar_noticia')?>">NOTICIAS</a></li>
            <li><a href="<?php echo base_url('home/listar_evento') ?>">EVENTOS</a></li>
            <li><a href="<?php echo base_url('home/menu_servico')?>">SERVIÇOS</a></li>            
            <li><a href="#">MIDIAS</a>
                <ul>
                    <li><a href="#">FOTOS</a></li>
                    <li><a href="#">VÍDEOS</a></li>
                    <li><a href="#">ÁUDIOS</a></li>
                </ul>
            </li>
              <li><a href="<?php echo base_url('home/repositorio') ?>">REPOSITORIO DE DOCUMENTOS</a></li>
            
            <li class="admin" style="padding-left: 112px;">
                <a id="adm" href="<?php echo base_url('admin/login') ?>" title="Painel Administrador">
                    <img src="<?php echo base_url('assets/frontend/imagens/') ?>admin.svg" width="15" height="15"/>
                </a>
            </li>
        </ul>
    </nav>
</div>