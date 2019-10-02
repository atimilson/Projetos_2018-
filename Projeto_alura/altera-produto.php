<?php 
 require_once ("cabecalho.php"); 
 require_once ("conecta.php");
 require_once ("banco-produto.php");
 
 require_once ("./class/produto.php");
 require_once ("./class/categoria.php");
 
?>

<?php


    $produto = new Produto();
    $categoria = new Categoria();
    
    $categoria->id = $_POST["categoria_id"];

    $produto->id = $_POST["id"];
    $produto->nome = $_POST["produto"];
    $produto->preco = $_POST["preco"];
    $produto->descricao =$_POST["descricao"];
    $produto->categoria= $categoria;
    
    if(array_key_exists('usado', $_POST)){
        
        $produto->usado = "1";
    } else {
        $produto->usado = "0";
}
  
  if(alteraProduto($link, $produto)){  ?>
      <p class="text-success">Produto <?=$produto->nome ?>, <?= $produto->preco ?> Alterado com sucessos</p>
      
     
      
  <?php } else {  ?>
      $msg = mysqli_error($link);
      
      
     <p class="text-danger">O produto <?= $produto->nome ?> não foi alterado : <?= $msg ?></p>
  
     
     <?php }
  

   
require_once ("rodape.php"); 



