<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(isset($_SESSION['user'])){
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
            
            html, body {
            height: 100%;
            }
            
            #page {
            min-height: 105%;
            position: relative;
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

            .topo{
                text-align: center;
            }
            
            .st0{
                margin-top: 5px;
                background : #FBBA00;
                background : rgba(251, 186, 0, 1);
                border-radius : 6px;
                -moz-border-radius : 6px;
                -webkit-border-radius : 6px; font-family : Nexa Black;
                font-size : 14px;padding: 10px;
                color : #1D1D1B;
                text-decoration:none;
                word-spacing: 4px;
                letter-spacing: initial;
            }
            
            a{
                text-decoration: none;
            }
            
            a:link{
                text-decoration: none;
            }
            footer {
                margin-top: 95px;
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

        <div id="topo" class="container" style="margin-top: 50px; text-align: center">
            <div class="row">
                
                <div class="col-md-12" >
                    <img  src="mapa.png" style="" width="500" />
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" >
                   
                    <div id="texto-refe" style="max-width: 470px;text-align: left;margin-top: -24px">
                          <h1>MAPA LOGÍSTICO DE MATO GROSSO</h1>   
                        
                          <a class="st0" style="" href="Mapa_Rodoviario.pdf" download><b>CLIQUE AQUI E FAÇA DOWNLOAD</b> </a>       
                      </div>
                    
                    
                </div>
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  
             <div  class="texto-img-72" style="text-align: center;clear: right;" >
                 <img src="logo-sinfra.png" width="240">
                        <p><b>CONSTRUINDO UM NOVO FUTURO</b></p>
             </div>
            </div>
               
                
            
            
            </div>
        </div>
        
        
            <footer >
                <div class="container">
                    
                    
                </div>
        </footer>
        
        
        
       </div> 
    </body>
</html>




