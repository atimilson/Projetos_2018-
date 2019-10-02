
<!DOCTYPE html>
<html>
<head>
	<title>trabalho</title>

  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta charset="iso-8859-1">
</head>
<body>
<?php

require("conectaBanco.php");




  $pesquisa= filter_input(INPUT_POST, 'pesqui', FILTER_SANITIZE_SPECIAL_CHARS);
  
  





$result_pesquisa = 'select * from usuarios where nome like '."'%".$pesquisa."%'";




 $result = mysqli_query($_SG['link'], $result_pesquisa);

 if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handlingÃ§
}


  echo '<table class="table table-hover">';

     echo "<tr>";
        echo "<th>id</th>";
        echo "<th>nome</th>";
        echo "<th>email</th>";
        echo "<th>curso</th>";
     echo "</tr>";

 while($row_resultado = mysqli_fetch_array($result)){
   
    
     echo "<tr>";
     echo "<td>".$row_resultado['id']."</td>";
     echo "<td>".$row_resultado['nome']."</td>";
      echo "<td>".$row_resultado['email']."</td>";
       echo "<td>".$row_resultado['curso']."</td>";
    echo "</tr>";
    
    



     
 }

 echo "</table>";
?>

 <a href="index.php"><button class="btn btn-info" style="margin:10px;">Voltar</button></a>

 </body>

 <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 </html>