<!DOCTYPE html>
<html>
<head>
	<title>trabalho</title>

  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

<?php
require("conectaBanco.php");


$nome= filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email= filter_input(INPUT_POST,'email', FILTER_SANITIZE_SPECIAL_CHARS);
$curso=  filter_input(INPUT_POST,'curso', FILTER_SANITIZE_SPECIAL_CHARS);


$result_usuario = "INSERT INTO usuarios(nome, email, curso) VALUES ('$nome','$email','$curso')";
$resultado_usuario = mysqli_query($_SG['link'], $result_usuario);
 

?>

<a href="index.php"><button class="btn btn-info" style="margin:10px;">Voltar</button></a>

 </body>

 <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 </html>