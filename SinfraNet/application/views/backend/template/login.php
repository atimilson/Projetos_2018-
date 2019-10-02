<?php header('Access-Control-Allow-Origin: *');
       error_reporting(0);
       ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Login</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/') ?>login.css"/>
        
    </head>
<body class="b-login">
    <div id="login">
        <h3 class="text-center text-white pt-5"><img src="<?php echo base_url('assets/backend/imagens/') ?>logo.svg" width="800" height="100"></h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                
                <?php 
                if(isset($_SESSION ['erro_logar'])){ ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>Usuario ou senha incorretos !</strong></div>
               <?php
                           unset($_SESSION ['erro_logar']);
               
                }
                
                echo validation_errors('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');
                ?>
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                             <?php
                            
                            echo form_open('admin/usuarios/logar');
                            
                            ?>
                        <div id="login-form" class="form">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuário:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Entrar">
                            </div>
                            <div id="register-link" class="text-right">
                            </div>
                        </div>
                        <?php
                            echo form_close();
                            
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
