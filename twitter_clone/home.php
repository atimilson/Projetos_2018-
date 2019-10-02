<?php
session_start();
if(!isset($_SESSION['usuario'])) header("Location: index.php?erro=1");

?>




<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>Twitter clone</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script>
        $(document).ready( function () {

            $('#btn_tweet').click(function () {

                if ($('#txt_tweet').val().length > 0){

                    $.ajax({
                       url: 'inclui_tweet.php',
                        method: "post",
                        data: $('#form_tweet').serialize(),

                        success: function(data){
                            $('#txt_tweet').val('');
                            atualizaTweets();
                        }
                    });

                }
            });

            function atualizaTweets(){

                //carregar os tweets
                $.ajax({

                    url: 'get_tweet.php',
                    method: 'post',
                    success: function(data){
                        $('#tweets').html(data);
                    }

                });

            }

            atualizaTweets();
        });


    </script>

</head>

<body>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="imagens/icone_twitter.png" />
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div class="container">



    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4><?= $_SESSION['usuario'] ?></h4>
                <hr>
                <div class="col-md-6">
                    TWEETS <br> 1
                </div>
                <div class="col-md-6">
                    SEGUIDORES <br> 1
                </div>
            </div>


        </div>

    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <form id="form_tweet">
                    <div class="input-group">
                        <input type="text" class="form-control" id="txt_tweet" name="txt_tweet" placeholder="O que está acontecendo agora?" maxlength="140">
                        <span class="input-group-btn">
                            <button class="btn btn-default" id="btn_tweet" type="button">Tweet</button>
                        </span>
                    </div>
                </form>
            </div>

        </div>


        <div id="tweets" class="list-group">

        </div>


    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4><a href="procurar_pessoas.php">Procurar por pessoas</a> </h4>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>


</div>


</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>