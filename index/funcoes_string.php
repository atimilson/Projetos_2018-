<!DOCTYPE html>
<html>
<head>
	<title>trabalho</title>

  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

<?php

$texto = "135.5656.565-453";
$texto2 = str_replace(".", "", $texto);
$texto_final = str_replace("-", "", $texto2);


echo $texto_final. '<br>';

echo substr($texto, 0, 2)."...";
?>
    
    
</body>
</html>


