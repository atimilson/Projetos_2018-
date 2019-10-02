<?php

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projeto teste</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

    <link rel="stylesheet" href="css/estilo.css">
    <style>
        p#error{
            padding: 2px 4px;
            font-size: 90%;
            color: #c7254e;
            background-color: #f9f2f4;
            border-radius: 4px;
        }
    </style>


</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col s2">
                <div id="logo"><img src="Logo_TV_2015.png" class="imagem"></div>
            </div>
            <div class="col s7">
                <div class="menu">
                    <ul>
                        <li><a href="index.php" class="menu_principal">Home</a></li>
                        <li><a href="" class="menu_principal">Galeria</a></li>
                        <li><a href="" class="menu_principal">Portifólio</a>
                            <ul>
                                <li><a href=""  class="menu_escondido">Design Grafico</a></li>
                                <li><a href="" class="menu_escondido">Web Design</a></li>
                                <li><a href="" class="menu_escondido">Web Development</a></li>

                            </ul>


                        </li>
                        <li><a href="">Contato</a></li>

                    </ul>


                </div>
            </div>

            <div class="col s3">
                <div class="row right-align">
                    <div class="col s6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Acessar
                        </button>
                    </div>
                    <div class="col s6">
                        <a href="inscrever.php"><button type="button" class="btn btn-default">Inscrever</button></a>
                    </div>
                </div>


                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title" id="myModalLabel">Acessar</h4>
                            </div>
                            <div class="modal-body">
                                <form action="valida.php" method="post" class="form">
                                    <div class="form-group">
                                        <label for="login">Login</label>
                                        <input type="text" class="form-control" id="login" name="login" placeholder="Digite seu login">
                                    </div>

                                    <br/>

                                    <div class="form-group">
                                        <label for="senha">Senha</label>
                                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
                                    </div>

                                    <br/>

                                    <button type="submit" class="btn waves-effect waves-light">Entrar</button>
                                    <button type="button" class="btn waves-effect waves-light" data-dismiss="modal">Fechar</button>
                                </form>
                                <?php
                                if ($erro == 1){
                                    echo '<p id="error">Usuario ou senha inválidos(s)</p>';
                                }

                                ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
                if($erro == 1) {
                    echo "<script>";
                    echo '$(document).ready(function(){';
                    echo "$('#myModal').modal('show');";
                    echo "})";
                    echo "</script>";
                }
                ?>

            </div>
        </div>
    </div>


</header>