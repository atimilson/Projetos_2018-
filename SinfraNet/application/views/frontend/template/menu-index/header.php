<div class="menu" style="">
    <div class="header-inner">
        <div class="logo">
            <a href="<?php echo base_url('home') ?>">
                <img alt="SINFRA" height="144" src="<?php echo base_url('assets/frontend/imagens/') ?>layout_set_logo.png">               
            </a>
        </div>        
    </div>
</div>

<nav>
    <div>
        <i class="fa fa-bars"></i>
    </div>

    <ul>
        <li><a href="<?php echo base_url('home') ?>">INICIO</a></li>
        <li><a href="#">INSTITUCIONAL<i class="fa fa-sort-desc"></i></a>
            <ul>
                <li><a href="<?php echo base_url('home/subMenu_visao_misao') ?>">MISSÃO/VISÃO</a></li>
                <li><a href="<?php echo base_url('home/subMenu_quem_e_quem') ?>">QUEM É QUEM</a></li>
                <li><a href="<?php echo base_url('home/subMenu') ?>">HISTÓRIA</a></li>
                <li><a href="<?php echo base_url('assets/frontend/imagens/') ?>organograma.pdf" target="_blank">ORGANIZAÇÃO FUNCIONAL</a></li>
            </ul>
        </li>
        <li><a href="<?php echo base_url('home/listar_noticia') ?>">NOTICIAS</a></li>
         <li><a href="<?php echo base_url('home/ramal') ?>">RAMAIS</a></li>
<!--         <li><a href="<?php echo base_url('home/listar_duvidas') ?>">DUVIDAS</a></li>-->
        <li><a href="<?php echo base_url('home/listar_evento') ?>">EVENTOS</a></li>
        <li><a href="<?php echo base_url('home/menu_servico') ?>">SERVIÇOS</a></li>
        <li><a href="#">MIDIAS<i class="fa fa-sort-desc"></i></a>
            <ul>
                <li><a href="<?php echo base_url('Fotos') ?>">FOTOS</a></li>
                <li><a href="<?php echo base_url('Videos') ?>">VÍDEOS</a></li>
                <li><a href="<?php echo base_url('Audios') ?>">AUDIOS</a></li>                        
            </ul>
        </li>
        <li><a href="<?php echo base_url('Repositorio_home') ?>">REPOSITÓRIO</a></li>
        <li class="admin" style="padding-left: 20px;">
            <a id="adm" href="<?php echo base_url('admin/login') ?>" title="Painel Administrador">
                <img src="<?php echo base_url('assets/frontend/imagens/') ?>admin.svg" width="15" height="15"/>
            </a>
        </li>
    </ul>    
</nav>
<div style="height: 10px;background: #0071bb;"></div>
