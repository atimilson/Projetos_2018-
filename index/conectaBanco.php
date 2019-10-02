<?php
	$_SG['servidor'] = 'localhost';
	$_SG['usuario'] = 'root';
	$_SG['senha'] = '';
	$_SG['banco'] = 'usuario';
	
	
	
	$_SG['tabela'] = 'usuarios';
	
	
		$_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha'],$_SG['banco']) or die ("mysql: nao foi possivel connectar-se com o servidor[".$_SG['servidor']."].");
		
		


	