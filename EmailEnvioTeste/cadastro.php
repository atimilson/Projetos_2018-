<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Mapa Rodoviario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
                background: #e3e3e3;
                overflow-x: hidden;
                
            }
            
            
            
            
            
        </style>
    </head>
    <body>
        
        
        <header>
       
            <div class="cabecalho">
                <img src="layout_set_logo.png" height="100" />
                
            </div>
            
            
            
       
        </header>
        
        <div id="topo" class="container">
            <div class="conteudo" style="text-align: center;">
                <h1>Mapa rodoviário 2017 de 70 anos</h1>
            </div>
            
        </div>
        
        
        

        <div id="formulario" class="container">
           
            <form style="padding: 50px 136px;" action="enviaremail.php" method="post">
                <div class="row abaixo">
                    <div class="col-md-6">
                        <label class="label label-danger"> NOME *</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="label label-danger"> E-MAIL *</label>
                        <input type="email" name="" class="form-control" placeholder="email@exemplo.com">
                    </div>
                </div>                
                <div class="row abaixo" >
                    <div class="col-md-6" >
                        <label class="label label-danger"> ESTADO *</label>
                        <select class="form-control">
                            <option>Selecionar</option>
                            <option>Acre</option>
                            <option>Alagoas</option>
                            <option>Amapá</option>
                            <option>Amazonas</option>
                            <option>Bahia</option>
                            <option>Ceará</option>
                            <option>Distrito Federal</option>
                            <option>Espírito Santo</option>
                            <option>Goiás</option>
                            <option>Maranhão</option>
                            <option>Mato Grosso</option>
                            <option>Mato Grosso do Sul</option>
                            <option>Minas Gerais</option>
                            <option>Pará</option>
                            <option>Paraíba</option>
                            <option>Paraná</option>
                            <option>Pernambuco</option>
                            <option>Piauí</option>
                            <option>Rio de janeiro</option>
                            <option>Rio Grande do Norte</option>
                            <option>Rio Grande do Sul</option>
                            <option>Rondônia</option>
                            <option>Roraima</option>
                            <option>Santa Catarina</option>
                            <option>São Paulo</option>
                            <option>Sergipe</option>
                            <option>Tocantins</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="label label-danger"> MUNIC�?PIO *</label>
                        
                        <select required class="form-control">
                            <option disabled selected hidden>Selecionar</option>
                            <option>Acorizal</option>
                            <option>Agua Boa</option>
                            <option>Alta Floresta</option>
                            <option>Alto Araguaia</option>
                            <option>Alto Boa Vista</option>
                            <option>Alto Garcas</option>
                            <option>Alto Paraguai</option>
                            <option>Alto Taquari</option>
                            <option>Apiacas</option>
                            <option>Araguaiana</option>
                            <option>Araguainha</option>
                            <option>Araputanga</option>
                            <option>Arenapolis</option>
                            <option>Aripuana</option>
                            <option>Barao de Melgaco</option>
                            <option>Barra do Bugres</option>
                            <option>Barra do Garcas</option>
                            <option>Brasnorte</option>
                            <option>Caceres</option>
                            <option>Campinapolis</option>
                            <option>Campo Novo do Parecis</option>
                            <option>Campo Verde</option>
                            <option>Campos de Julio</option>
                            <option>Cana Brava do Norte</option>
                            <option>Canarana</option>
                            <option>Carlinda</option>
                            <option>Castanheira</option>
                            <option>Chapada dos Guimaraes</option>
                            <option>Claudia</option>
                            <option>Cocalinho</option>
                            <option>Colider</option>
                            <option>Comodoro</option>
                            <option>Confresa</option>
                            <option>Cotriguacu</option>
                            <option>Cuiaba</option>
                            <option>Denise</option>
                            <option>Diamantino</option>
                            <option>Dom Aquino</option>
                            <option>Feliz Natal</option>
                            <option>Figueiropolis d'Oeste</option>
                            <option>Gaucha do Norte</option>
                            <option>General Carneiro</option>
                            <option>Gloria d'Oeste</option>
                            <option>Guaranta do Norte</option>
                            <option>Guiratinga</option>
                            <option>Indiavai</option>
                            <option>Itauba</option>
                            <option>Itiquira</option>
                            <option>Jaciara</option>
                            <option>Jangada</option>
                            <option>Jauru</option>
                            <option>Juara</option>
                            <option>Juina</option>
                            <option>Juruena</option>
                            <option>Juscimeira</option>
                            <option>Lambari d'Oeste</option>
                            <option>Lucas do Rio Verde</option>
                            <option>Luciara</option>
                            <option>Marcelandia</option>
                            <option>Matupa</option>
                            <option>Mirassol d'Oeste</option>
                            <option>Nobres</option>
                            <option>Nortelandia</option>
                            <option>Nossa Senhora do Livramento</option>
                            <option>Nova Bandeirantes</option>
                            <option>Nova Brasilandia</option>
                            <option>Nova Canaa do Norte</option>
                            <option>Nova Guarita</option>
                            <option>Nova Lacerda</option>
                            <option>Nova Marilandia</option>
                            <option>Nova Maringa</option>
                            <option>Nova Monte Verde</option>
                            <option>Nova Mutum</option>
                            <option>Nova Olimpia</option>
                            <option>Nova Ubirata</option>
                            <option>Nova Xavantina</option>
                            <option>Novo Horizonte do Norte</option>
                            <option>Novo Mundo</option>
                            <option>Novo Sao Joaquim</option>
                            <option>Paranaita</option>
                            <option>Paranatinga</option>
                            <option>Pedra Preta</option>
                            <option>Peixoto de Azevedo</option>
                            <option>Planalto da Serra</option>
                            <option>Pocone</option>
                            <option>Pontal do Araguaia</option>
                            <option>Ponte Branca</option>
                            <option>Pontes e Lacerda</option>
                            <option>Porto Alegre do Norte</option>
                            <option>Porto Esperidiao</option>
                            <option>Porto Estrela</option>
                            <option>Porto dos Gauchos</option>
                            <option>Poxoreo</option>
                            <option>Primavera do Leste</option>
                            <option>Querencia</option>
                            <option>Reserva do Cabacal</option>
                            <option>Ribeirao Cascalheira</option>
                            <option>Ribeiraozinho</option>
                            <option>Rio Branco</option>
                            <option>Rondonopolis</option>
                            <option>Rosario Oeste</option>
                            <option>Salto do Ceu</option>
                            <option>Santa Carmem</option>
                            <option>Santa Terezinha</option>
                            <option>Santo Afonso</option>
                            <option>Santo Antonio do Leverger</option>
                            <option>Sao Felix do Araguaia</option>
                            <option>Sao Jose do Povo</option>
                            <option>Sao Jose do Rio Claro</option>
                            <option>Sao Jose do Xingu</option>
                            <option>Sao Jose dos Quatro Marcos</option>
                            <option>Sao Pedro da Cipa</option>
                            <option>Sapezal</option>
                            <option>Sinop</option>
                            <option>Sorriso</option>
                            <option>Tabapora</option>
                            <option>Tangara da Serra</option>
                            <option>Tapurah</option>
                            <option>Terra Nova do Norte</option>
                            <option>Tesouro</option>
                            <option>Torixoreu</option>
                            <option>Uniao do Sul</option>
                            <option>Varzea Grande</option>
                            <option>Vera</option>
                            <option>Vila Bela da Santissima Trindade</option>
                            <option>Vila Rica</option>
                        </select>
                    </div>
                </div>
               <div class="row abaixo">
                   
                  
                   
                    <div class="col-md-12">
                        <label class="label label-danger"> PROFISSÃO *</label>
                        <input type="text" name="" class="form-control">
                    </div>
                   
                      
                </div>
                
                <div class="row abaixo">
                   
                  
                   
                    <div class="col-md-12" style="text-align: center;">
                        <input class="btn btn-success btn-lg btn-block" type="submit" value="Cadastrar-se">
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

    </body>
</html>
