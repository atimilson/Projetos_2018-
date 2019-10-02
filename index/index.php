


<!DOCTYPE html>
<html>
<head>
	<title>trabalho</title>

  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<div class="col-sm-6">
<form class="form " method="POST" action="receber-form.php">
	<div class="form-group">
    <label>Nome</label>
    <input type="text" name="nome">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email">
  </div>
    <div class="form-group">
    <label>curso</label>
    <input type="text" name="curso">
  </div>
   <input class="btn btn-primary" type="submit" value="Cadastrar">
  </div>

 

</form>
<div  class="col-sm-6">
<form class="form" method="POST" action="receber-pesquisa.php">
	<div class="form-group">
    
    <input type="text" name="pesqui" placeholder="Digite a pesquisa">
  </div>
    <input class="btn btn-default" type="submit" value="pesquisar">

</form>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>