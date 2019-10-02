<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
// put your code here

session_start();
if(isset($_SESSION['danger'])){
    echo $_SESSION['danger'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador Mapa Rodoviario</title>
        <meta name="viewport" content="width=device-width, initial-scale=0.5">
        <link rel="stylesheet" href="css/estilo.css"/>
        <link rel="shortcut icon" href="favicon.png" /> 
        <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    </head>
    <body>
        <div id="container_principal" class="container">
            <div class="row">
                <div class="col-2">
                    <img id="img_central" src="imagens/logo-sinfra.png" width="200">
                </div>
                <div id="div_imgem_mapa" class="col-8">
                    <img id="img_central" src="imagens/mapa.png" width="400">

                </div>
                <div class="col-2">


                </div>

            </div>
        </div>
        <div id="formulario_login">
            <form action="logica/valida_login.php" method="POST">

                <div class="form-row align-items-center">
                    <div class="col-8">
                        <label class="sr-only" for="inlineFormInputGroup">Usuário</label>
                        <div class="inputs" class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div id="back_icone_user" class="input-group-text"><i class="material-icons">
                                        person
                                    </i></div>
                            </div>
                            <input type="text" name="login" class="form-control" id="inlineFormInputGroup" placeholder="Usuário" required="true">
                        </div>
                    </div>

                </div>

                <div class="form-row align-items-center">
                    <div class="col-8">
                        <label class="sr-only" for="inlineFormInputGroup2">Senha</label>
                        <div class="inputs" class="input-group mb-3">
                            <div class="input-group-prepend" style="width: 100%;">
                                <div id="back_icone_pass" class="input-group-text"><i class="material-icons">
                                        lock
                                    </i>
                                </div>
                                <input type="password" class="form-control" id="inlineFormInputGroup2" placeholder="Senha" name="senha" required="true">
                            </div>
                        </div>

                    </div>
                </div>  


                <div class="form-row align-items-center" style="padding-top: 50px">
                    <div class="col-12" style="text-align: center">

                        <button id="btn_entrar" type="submit" class="btn btn-success" >Entrar<i style="color: white" class="material-icons">
                                done
                            </i></button>

                    </div>

                </div>


            </form>
        </div>  




    </body>


    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
</html>
