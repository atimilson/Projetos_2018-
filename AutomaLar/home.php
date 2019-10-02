<?php
session_start();
if(!isset($_SESSION['usuario'])) header("Location: index.php?erro=1");

require_once ('bd.class.php');

$objBd = new bd();
$link = $objBd->conecta_mysql();

$id_usuario = $_SESSION['id_usuario'];



?>




<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>AutomaLar</title>
    <link rel="icon" href="Graphicloads-100-Flat-Home.ico" type="image/x-icon">
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
            <h3>AutomaLar</h3>
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
               
            </div>


        </div>

    </div>
    <div class="col-md-6">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-expanded="true">Luz</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-expanded="true">Temperatura</a>
  </li>
  
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="table table-hover">
            <tr>
            <th>Nome</th>
            <th colspan="2">Ação</th>
            </tr>
            <tr>
            <form id="formulario" action="exemplo.php" method="get">
                <td>Lampada 1</td>
                <td><input type="submit" id="btn1" name="led" class="btn btn-primary" value="Acender" ></td>
                <td><input type="submit" id="btn2" name="led" class="btn btn-danger" value="Apagar" ></td>
             
             </form>
                
            </tr>
        </table>
        
        
    </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  
  <div class="card text-center">
  <div class="card-header">
    Temperatura
  </div>
  <div class="card-body">
    <h4 class="card-title">26º C</h4>
     </div>
  <div class="card-footer text-muted">
    Medido a 5 minutos
  </div>
</div>
  
  </div>

</div>

        </div>


      


    </div>
    <div class="col-md-3">
        
    </div>

    <div class="clearfix"></div>






<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script>
function mudarNome()
{
 if(document.getElementById("btn1").value == "Acender")
 {
  document.getElementById("btn1").value = "Apagar";
  document.getElementById('btn1').className = 'btn btn-danger';
 } 
 else
 {
  document.getElementById("btn1").value = "Acender";
  document.getElementById('btn1').className = 'btn btn-primary';
 
 }
}
</script>
</body>
</html>