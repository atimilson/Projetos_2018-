
<!DOCTYPE html>
<html>
<head>
	<title>Calculadora em PHP</title>

  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta charset="iso-8859-1">
</head>
<body>
    
    <form action="classe/calcular.php" method="post" class="form-inline" style="margin: 20px; padding: 10px;">
        <div class="form-group" style="margin: 10px;">
        <label>
          Primeiro numero:
          <input type="text" name="numero1" class="form-control">
        </label>
        </div>
        
        <div class="form-group" style="margin: 10px;">     
        <label>
          Segundo numero:
          <input type="text" name="numero2" class="form-control">
        </label>
        </div>
        <br>
        <div class="radio" style="margin: 10px;">
            <label>
                <input type="radio" name="operacao" value="somar">
                Somar
            </label>
       
        
        
            <label>
                <input type="radio" name="operacao" value="Subtrair">
                Subtrair
            </label>
       
        
       
            <label>
                <input type="radio" name="operacao" value="Multiplicar">
                Multiplicar
            </label>
        
        
        
            <label>
                <input type="radio" name="operacao" value="Dividir">
                Dividir
            </label>
        </div>
        
        <div class="btn" style="margin-left:500px;">
        <input type="submit" class="btn btn-primary">
        </div>
    </form>
  
<?php
 
?>

 </body>

 <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 </html>