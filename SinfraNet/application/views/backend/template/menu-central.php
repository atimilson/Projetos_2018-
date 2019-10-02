 <div id="content">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="glyphicon glyphicon-align-justify"></i>
                        </button>
                    </div>
                    <div class="col-md-11"  align="right">
                        <form class="navbar-form" role="search" >
                            
                            <div class="input-group add-on">

                                <ul class="nav nav-pills nav-stacked">                                    
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->session->userdata('userlogado')->usuario ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
<!--                                            <li><a href="#">Alterar Senha</a></li>-->
                                            <li><a href="<?php echo base_url('admin/usuarios/logout/') ?> ">Sair</a></li>                                            
                                        </ul>
                                    </li>                                   
                                </ul>  

                            </div>
                        </form>
                    </div>
                </div>
                </nav>