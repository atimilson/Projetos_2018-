<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
error_reporting(0);
session_start();
define('DS', DIRECTORY_SEPARATOR);
define('BASE_DIR', dirname(__FILE__) . DS);



if (isset($_SESSION['var'])) { 
    echo '<script>alert("Deve-se Selecionar Estado e Município");</script>';
    
    unset($_SESSION['var']);
}


if (isset($_SESSION['error'])) { 
    echo '<script>alert("Erro ao Enviar E-mail");</script>';
    
    unset($_SESSION['error']);
}
        
require_once ('conecta.php');


$objBd = new Conexao();


$link = $objBd->conecta_mysql();




?>
<html>
    <head>
        <title>Mapa Rodoviario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.5">
        <link rel="stylesheet" href="estilo.css"/>
        <link rel="shortcut icon" href="favicon.png" /> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
     <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



        <style>

            *{
                margin: 0 auto;
                padding: 0;

            }


            .cabecalho{
                height: 100px;
                background: linear-gradient(to right,#000444 0,#1d357f 40%,#1d357f 60%,#000444 100%);
                width: 100%;
                text-align: center;
            }


            .conteudo{
                margin-top: 5em;

                height: 100px;

            }

            body{

                overflow-x: hidden;

            }
            
            .texto-img-72{
                font-family: Nexa-black;
                font-size: 10px;
            }
            
            .texto-img-72 p{
                padding-top: 4px;
            }
            
            #texto-refe{
                font-family: Nexa-black;
                font-size: 28px;
                letter-spacing : 5.6px;
                color : #133058;
            }

            #faca-cadastro{
                font-family : Nexa Bold;
                font-size : 15px;
                color : #FFFFFF;
                background: #133058;
                padding: 4px;
                letter-spacing: normal;
                width: 250px;
            }
            html, body {
                height: 100%;
            }

            #page {
                min-height: 100%;
                position: relative;
            }

            footer {
                margin-top: 70px;
                width: 100%;
                bottom: 0;
               
            }
            
            #img_mapa{
              
            }


        </style>
    </head>
    <body>

         <div id="page">
        <header>

            <div class="cabecalho">
                <img src="http://www.sinfra.mt.gov.br//image/layout_set_logo?img_id=365359&t=1530431912301" height="100" />

            </div>




        </header>

        <div id="topo" class="container">
            <div class="row">
                <div id="texto_mapa" class="col-md-6">
                    <div  class="texto-img-72" style="text-align: center; float: left;clear: right;" >
                        <img src="logo-sinfra.png" width="400">
                        <p><b>CONSTRUINDO UM NOVO FUTURO</b></p>
                     </div>
                    <div id="texto-refe" style=" float: left;clear: left;">
                          <h1>MAPA LOGÍSTICO DE MATO GROSSO</h1>   
                          
                          <p id="faca-cadastro" style="">Faça o cadastro e baixe já o seu!</p>
                            
                            
                      </div>
                    
                    
                </div>
                <div id="centraliza_mapa" class="col-md-6" >
                    <img id="img_mapa" src="mapa.png" style="" width="500" />
                    
                </div>
            </div>
        </div>




        <div id="formulario" class="container">

            <form style="" action="valida.php" method="post">

                <div class="row abaixo">
                    
                    <div class="col-md-6">
                        <label class="" for="cpf"> CPF * ex=(XXX.XXX.XXX-XX)</label> <label style="float: right; margin: 0 auto; padding: 0; margin-top: 12px;" id="cpfResponse"></label>
                        <input id="cpf" name="cpf" pattern="^\d{3}.\d{3}.\d{3}.\d{2}$" required type="text" class="form-control" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc(this, mCPF);">  <span style="float: right" id="cpfResponse"></span> 
                    </div>

                    
                    <div class="col-md-6">
                        <label class="" for="nome"> NOME *</label>
                        <input required type="text" name="nome" class="form-control" placeholder="João da Silva">
                    </div>
                    
                </div>    
                
                
                  <div class="row abaixo">



                    <div class="col-md-6">
                        <label class="" for="profissao"> PROFISSÃO *</label>
                        <input required="" type="text" name="profissao" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label class="" for="email"> E-MAIL *</label>
                        <input required type="email" name="email" class="form-control" placeholder="email@exemplo.com">
                    </div>

                </div>
                
                
                <div class="row abaixo" >
                    <div class="col-md-6" >
                        <label class="" for="estado"> ESTADO *</label>
                        <select name="estado" id="estado" required class="form-control">
                            <option disabled selected hidden>Selecionar</option>
                            <?php
                            $sql = "SELECT * from estados ORDER BY nome";
                            $sql_veri = pg_escape_string ($link, $sql);
                            $res = pg_query($link,$sql_veri);
                            while ($row = pg_fetch_assoc($res)) {
                                echo '<option value="' . $row['cod_estados'] . '">' . $row['nome'] . '</option>';
                            }
                            ?> 
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="" for="cidade"> MUNICÍPIO *</label>
                        <select name="cidade" id="cidade" required class="form-control" >
                            <option disabled selected hidden>Selecione primeiro um Estado*</option>
                        </select>
                    </div>
                </div>
              



                <div class="row abaixo"> 
                    <div class="col-md-6" style="text-align: center;"></div>
                    <div class="col-md-6" style="text-align: center;">
                        <button id="cadastrar" class="btn btn-success btn-lg btn-block " type="submit" >QUERO RECEBER O MAPA<img style="margin-left:5px;" src="imagens/Asset 1.png"></button>
                    </div>


                </div>


            </form>
        </div>


        <footer>
            <div class="container">




            </div>

        </footer>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

      <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> -->
        <script>
                            function is_cpf(c) {

                                if ((c = c.replace(/[^\d]/g, "")).length != 11)
                                    return false

                                if ((c == "00000000000") || 
                                   (c == "11111111111") || 
                                   (c == "22222222222") || 
                                   (c == "33333333333") || 
                                   (c == "44444444444") || 
                                   (c == "55555555555") || 
                                   (c == "66666666666") || 
                                   (c == "77777777777") || 
                                   (c == "88888888888") || 
                                   (c == "99999999999"))
                                    return false;


                                var r;
                                var s = 0;

                                for (i = 1; i <= 9; i++)
                                    s = s + parseInt(c[i - 1]) * (11 - i);

                                r = (s * 10) % 11;

                                if ((r == 10) || (r == 11))
                                    r = 0;

                                if (r != parseInt(c[9]))
                                    return false;

                                s = 0;

                                for (i = 1; i <= 10; i++)
                                    s = s + parseInt(c[i - 1]) * (12 - i);

                                r = (s * 10) % 11;

                                if ((r == 10) || (r == 11))
                                    r = 0;

                                if (r != parseInt(c[10]))
                                    return false;

                                return true;
                            }


                            function fMasc(objeto, mascara) {
                                obj = objeto
                                masc = mascara
                                setTimeout("fMascEx()", 1)
                            }

                            function fMascEx() {
                                obj.value = masc(obj.value)
                            }

                            function mCPF(cpf) {
                                cpf = cpf.replace(/\D/g, "")
                                cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
                                cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
                                cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
                                return cpf
                            }

                            cpfCheck = function (el) {

                               document.getElementById('cpfResponse').innerHTML = is_cpf(el.value) ? '<label style="color:green">CPF VÁLIDO</label>' : '<label style="color:red">CPF INVÁLIDO</label>';
                                if (el.value == '')
                                    document.getElementById('cpfResponse').innerHTML = '';
                                var testes;
                                
                                
                                

                               is_cpf(el.value) ? testes = true :  testes = false;
                               
                               
                               
                               if(testes){
                                    
                                    document.getElementById("cpf").classList.remove('is-invalid');
                                    document.getElementById("cpf").classList.add('is-valid');
                                    
                                }else{
                                    document.getElementById("cpf").classList.remove('is-valid');
                                    document.getElementById("cpf").classList.add('is-invalid');
                                }
                               
                                
   
                                if(testes){
                                    
                                    document.getElementById("cadastrar").classList.remove('disabled');
                                     $('#cadastrar').removeAttr('disabled');
                                    
                                }else{
                                    
                                    document.getElementById("cadastrar").classList.add('disabled');
                                    $('#cadastrar').attr('disabled','disabled');
                                }
                                
                                
                                

                            };


        </script>
        <script>
         
    $(document).ready(function(){
        $('#estado').change(function(){
            var oi =(document.getElementById('estado').value);
            $('#cidade').load('listaCidades.php',{estado: $('#estado').val()});
            
            
            
            
        });
    });   
        </script>
         </div>
    </body>
</html>
