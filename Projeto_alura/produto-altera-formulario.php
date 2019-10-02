<?php require_once ("cabecalho.php"); 
 require_once ("./conecta.php");
 require_once ("./banco-categoria.php");
 require_once ("./banco-produto.php");

 
 
         
 $id = $_GET['id'];
 $produto = buscaProdutos($link,$id);
 $categorias = listaCategorias($link);
$usado = $produto->usado ? "checked='checked'" : "";

?>
<h1>Alterando Produtos</h1>

<form class="form" action="altera-produto.php" method="POST">
    <input type="hidden" name="id" value="<?= $produto->id?>">
    <table class="table">
        <?php        include ("produto-formulario-base.php"); ?>
        <tr>
            <td colspan="2"><button type="submit" class="btn btn-primary btn-lg ">Alterar</button></td>
        </tr>
    </table>
</form>
<?php require_once ("rodape.php"); ?>
