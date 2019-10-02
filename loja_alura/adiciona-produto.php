<?php require_once ("cabecalho.php"); 
 require_once ("conecta.php");
 require_once ("banco-produto.php");
 require_once ("logica-usuario.php");

 verificaUsuario();
?>

<?php




    $nome = $_POST["produto"];
    $preco = $_POST["preco"];
    $descricao =$_POST["descricao"];
    $categoria_id= $_POST["categoria_id"];
    
    if(array_key_exists('usado', $_POST)){
    $usado = "true";
    } else {
        $usado = "FALSE";
}
  
  if(insereProduto($link, $nome, $preco, $descricao, $categoria_id, $usado)){ ?>
     <p class="text-success">Produto <?php echo $nome ?>, <?php echo $preco ?> adicionado com sucessos</p> 
  <?php } else { 
      $msg = mysqli_error($link);
      ?>
     
     <p class="text-danger">O produto <?php echo $nome ?> não foi adicionado : <?= $msg ?></p>
  <?php 
  }
  



    
require_once ("rodape.php"); 



