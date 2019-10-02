<?php require_once ("cabecalho.php"); 
 require_once ("conecta.php");
 require_once ("banco-produto.php");
 require_once ("logica-usuario.php");

 verificaUsuario();
 
?>

<?php



    $id = $_POST["id"];
    $nome = $_POST["produto"];
    $preco = $_POST["preco"];
    $descricao =$_POST["descricao"];
    $categoria_id= $_POST["categoria_id"];
    
    if(array_key_exists('usado', $_POST)){
    $usado = "true";
    } else {
        $usado = "FALSE";
}
  
  if(alteraProduto($link, $nome, $preco, $descricao, $categoria_id, $usado,$id)){
      $_SESSION["success"] = "<p class='text-success'>Produto $nome ,  $preco Alterado com sucessos</p>";
      header("Location: produto-lista.php");
      ?>
      
  <?php } else { 
      $msg = mysqli_error($link);
      ?>
     
     <p class="text-danger">O produto <?php echo $nome ?> não foi alterado : <?= $msg ?></p>
  <?php 
  }
  



    
require_once ("rodape.php"); 



