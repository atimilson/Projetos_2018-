<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if(isset($_SESSION['usuario'])){
}else {
    header("Location: index.php");   
} 
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
width: 100%;
bottom: 0;

}
        </style>
    </head>
    <body style="">
         <div id="page">
        
        <header>

            <div class="cabecalho">
                <img src="http://www.sinfra.mt.gov.br//image/layout_set_logo?img_id=365359&t=1530431912301" height="100" />

            </div>




        </header>

        <div id="topo" class="container" style="margin-top: 30px">
            <div class="row">
                <div id="texto_mapa" class="col-md-6" style="margin-top: 150px">
                   
                    <div id="texto-refe" style=" float: left;clear: left;">
                          <h1>MAPA LOGÍSTICO DE MATO GROSSO</h1>   
                          
                         
                            
                            
                      </div>
                    
                    
                </div>
                <div id="centraliza_mapa"  class="col-md-6" >
                    <img id="img_mapa" src="mapa.png"  width="500" />
                    
                </div>
            </div>
        </div>
        <div id="conteudo" class="container">
            <div class="row">
                <div class="col-md-4">
            
             <div  class="texto-img-72" style="text-align: center; float: left;clear: right;" >
                 <img src="logo-sinfra.png" width="220">
                        <p><b>CONSTRUINDO UM NOVO FUTURO</b></p>
             </div>
            </div>
                <div class="col-md-8">
                    <h3 style="font-family: Nexa-black;color: #133058">PARABÉNS!</h3>
                    <h3 style="font-family: Nexa-black;color: #133058">CADASTRO EFETUADO COM SUCESSO</h3>
                    <h5 style="font-family: Nexa Bold;color: #133058">EM BREVE VOCÊ RECEBERÁ O E-MAIL DE CONFIRMAÇÃO</h5>
                    <h5 style="font-family: Nexa Bold;color: #133058">**VERIFIQUE TAMBÉM OS SPAM'S </h5>
                    
                    
                    
                    
                    
                    
                </div>
                
            
            
            </div>
        </div>
        
        
        <footer style="margin-top: 20px;">
            <div class="container" style="">




            </div>

        </footer>
        
        
        
         </div>
    </body>
</html>