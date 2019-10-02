<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cadastro de </title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
        
</style>
</head>
<body>

<div id="container">
    <h1> Cadastro de Produto </h1>
     <a href="/Codeigniter-Novo/index.php/produto/voltar"> Voltar </a>
     
</div>
<form class="form-horizontal">
<fieldset>

<!-- Form Nome -->
<legend>Cadastro Produtos</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cod_user">Código Usuário</label>  
  <div class="col-md-4">
  <input id="cod_user" name="cod_user" type="text" placeholder="codUser" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="senha">Categoria</label>
  <div class="col-md-4">
    <input id="senha" name="senha" type="password" placeholder="senha" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="perfil">Marca</label>
  <div class="col-md-4">
    <select id="perfil" name="perfil" class="form-control">
      <option value="1"></option>
      <option value="2"></option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cancelar"></label>
  <div class="col-md-4">
    <button id="cancelar" name="cancelar" class="btn btn-primary">Cancelar</button>
  </div>
  
  <label class="col-md-4 control-label" for="pesquisar"></label>
  <div >
    <button id="pesquisar" name="pesquisar" class="btn btn-primary">Pesquisar</button>
  </div>
</div>

</fieldset>
</form>

</body>
</html>