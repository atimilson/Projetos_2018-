<?php

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>



<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
                <link rel="icon" href="Graphicloads-100-Flat-Home.ico" type="image/x-icon">
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
		<script>
			$(document).ready(function () {
                $('#btn_login').click( function () {
                    var campo_vazio =false;

                    if( $('#campo_usuario').val() == '') {
                        $('#campo1').addClass("has-error");
                        campo_vazio =true
                    }else{
                        $('#campo1').removeClass("has-error");
                    }

                    if( $('#campo_senha').val() == ''){
                        $('#campo2').addClass("has-error");
                        campo_vazio =true;
                    }else {
                        $('#campo2').removeClass("has-error");
                    }

                    if (campo_vazio) return false;

                })
            })						
		</script>

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
	            <li><a href="inscrevase.php">Cadastrar</a></li>
	            <li class="<?= $erro == 1 ? 'open' : '' ?>">
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<h3>Faça login </h3>
				    		<br />
							<form method="post" action="public_html/validar_acesso.php" id="formLogin">
								<div class="form-group" id="campo1">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>
								
								<div class="form-group" id="campo2">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

								<br /><br />

                                <?php
                                    if ($erro == 1){
                                        echo '<p id="error">Usuario ou senha inválidos(s)</p>';
                                    }

                                ?>
								
							</form>
						</form>
                        </div>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
              <div class="jumbotron" style="text-align: center">
                  <img style="margin: 0 auto" src="home-1110868_960_720.png" width="100px">
	        <h1>Bem vindo!</h1>
	        <p>Com este projeto pretendemos automatizar algumas funções básicas de uma
residência, como: ligar/desligar uma lâmpada e verificar a
temperatura do ambiente.</p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>