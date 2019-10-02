<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <img class="foto-logo" src="<?php echo base_url('assets/backend/imagens/') ?>logo.svg">
            <strong>SINFRA
                NET</strong>
        </div>
        <ul id="menu" class="list-unstyled components" onclick="window.myFunction(event)">
            <li class="a_menu <?php
            if ($this->uri->segment(2) == "home") {
                echo 'active';
            }
            ?> ">
                <a href="<?php echo base_url('admin/home') ?>">
                    <img src="<?php echo base_url('assets/backend/imagens/') ?>home2.svg" style="width: 25px;height: 25px;"/>
                    Home
                </a>
            </li>
            <?php
            $dados = (object) $this->session->userdata('permissoes');

            
            foreach ($dados as $d) {

            }
            if ($d->noticia == '1') {
                ?>
                <li class="noticia <?php
                if ($this->uri->segment(2) == "noticia") {
                    echo 'active';
                }
                ?>">
                    <a href="<?php echo base_url('admin/noticia') ?>">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>noticia.svg" style="width: 25px;height: 25px;"/>
                        Notícias
                    </a>
                </li>
            <?php } ?>
            <?php
            if ($d->evento == '1') {
                ?>
                <li class="evento <?php
                if ($this->uri->segment(2) == "evento") {
                    echo 'active';
                }
                ?>">
                    <a href="<?php echo base_url('admin/evento') ?>">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>eventos.svg" style="width: 25px;height: 25px;"/>
                        Evento
                    </a>
                </li>
            <?php } ?>
            <?php
            if ($d->repositorio == '1') {
                ?>
                <li class="repositorio <?php
                if ($this->uri->segment(2) == "repositorio" OR $this->uri->segment(2) == "categoria") {
                    echo 'active';
                }
                ?>">
                    <a href="#pageSubmenuDoc" data-toggle="collapse" aria-expanded="false">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>repositorio.svg" style="width: 25px;height: 25px;"/>
                        Repositório
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenuDoc">
                        <li><a href="<?php echo base_url('admin/repositorio') ?>">Upload de Arquivos</a></li>
                        <li><a href="<?php echo base_url('admin/categoria') ?>">Categorias</a></li>
                    </ul>
                </li>
            <?php } ?>


<!--                <li class="evento">
                    <a href="<?php echo base_url('admin/duvidas') ?>">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>duvida.svg" style="width: 25px;height: 25px;"/>
                        Duvidas Frequentes
                    </a>
                </li>-->






            <?php
            if ($d->acessos == '1' OR $d->servico == '1') {
                ?>
                <li class="acessos <?php
                if ($this->uri->segment(2) == "Acessos" or $this->uri->segment(2) == "servico") {
                    echo 'active';
                }
                ?>">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>acessos_servicos.svg" style="width: 25px;height: 25px;"/>
                        Acessos e Serviços
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                    <?php } ?>
                    <?php
                    if ($d->acessos == '1') {
                        ?>
                        <li><a href="<?php echo base_url('admin/Acessos') ?>">Acessos</a></li>
                    <?php } ?>

                    <?php
                    if ($d->servico == '1') {
                        ?>
                        <li><a href="<?php echo base_url('admin/servico') ?>">Serviços</a></li>
                    <?php } ?>
                    <?php
                    if ($d->acessos == '1' OR $d->servico == '1') {
                        ?>
                    </ul>
                <?php } ?>
                <?php                    
                if ($d->audios == '1' OR $d->videos == '1' OR $d->fotos == '1') {
                    ?>
                <li class="midias <?php
                if ($this->uri->segment(2) == "foto" OR $this->uri->segment(2) == "video" OR $this->uri->segment(2) == "audio") {
                    echo 'active';
                }
                ?>">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>galeria.svg" style="width: 25px;height: 25px;">
                        Mídias
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                    <?php } ?>
                    <?php
                    if ($d->fotos == '1') {
                        ?>
                        <li><a href="<?php echo base_url('admin/foto') ?>">Fotos</a></li>
                    <?php } ?>

                    <?php
                    if ($d->videos == '1') {
                        ?>
                        <li><a href="<?php echo base_url('admin/video') ?>">Vídeos</a></li>
                    <?php } ?>
                    <?php
                    if ($d->audios == '1') {
                        ?>
                        <li><a href="<?php echo base_url('admin/audio') ?>">Áudios</a></li>
                    <?php } ?>
                    <?php
                    if ($d->audios == '1' OR $d->videos == '1' or $d->fotos == '1') {
                        ?>
                    </ul>
                </li>
            <?php } ?>
            <?php
            if ($d->aniversario == '1') {
                ?>
                <li class="aniversario <?php
                if ($this->uri->segment(2) == "aniversarios") {
                    echo 'active';
                }
                ?>">
                    <a href="<?php echo base_url('admin/aniversarios') ?>">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>aniversarios.svg" style="width: 25px;height: 25px;"/>
                        Aniversário
                    </a>
                </li>
            <?php } ?>
            <?php
            if ($d->ramal == '1') {
                ?>
                <li class="ramal <?php
                if ($this->uri->segment(2) == "ramal") {
                    echo 'active';
                }
                ?>">
                    <a href="<?php echo base_url('admin/ramal') ?>">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>ramais.svg" style="width: 25px;height: 25px;"/>
                        Ramal
                    </a>
                </li>
            <?php } ?>
            <?php
            if ($d->enquete == '1') {
                ?>
<!--                <li class="enquete <?php
                if ($this->uri->segment(2) == "enquete") {
                    echo 'active';
                }
                ?>">
                    <a href="#">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>enquetes.svg" style="width: 25px;height: 25px;"/>
                        Enquete
                    </a>
                </li>-->
            <?php } ?>
            <?php
            if ($d->usuario == '1') {
                ?>
                <li class="usuario <?php
                if ($this->uri->segment(2) == "usuarios") {
                    echo 'active';
                }
                ?>">
                    <a href="<?php echo base_url('admin/usuarios') ?>">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>user.svg" style="width: 25px;height: 25px;"/>
                        Usuário
                    </a>
                </li>
            <?php } ?>



            <?php
            if($d->nome == 'Admin'){
            if ($d->perfil == '1') {
                ?>
                <li class="perfil <?php
                if ($this->uri->segment(2) == "perfil") {
                    echo 'active';
                }
                ?>">
                    <a href="<?php echo base_url('admin/perfil') ?>">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>Perfil.svg" style="width: 25px;height: 25px;"/>
                        Perfil
                    </a>
                </li>
            <?php }
            }

            ?>



            <?php
            if ($d->setor == '1') {
                ?>
                <li class="setor <?php
                if ($this->uri->segment(2) == "setor") {
                    echo 'active';
                }
                ?>">
                    <a href="<?php echo base_url('admin/setor') ?>">
                        <img src="<?php echo base_url('assets/backend/imagens/') ?>Setores.svg" style="width: 25px;height: 25px;"/>
                        Setor
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
