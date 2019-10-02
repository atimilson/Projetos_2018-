<?php require_once ("cabecalho.php"); 
 require_once ("./conecta.php");
 require_once ("./banco-categoria.php");
require_once ("logica-usuario.php");

 
 $produto = array("nome" => "","descricao"=>"","preco"=>"","categoria_id"=>"1");
 $usado = "";
 
 $categorias = listaCategorias($link);

?>
<h1>Formulario de Produtos</h1>

<form class="form" action="adiciona-produto.php" method="POST">
    <table class="table">
        <?php include("produto-formulario-base.php"); ?>
        <tr>
            <td colspan="2"><button type="submit" class="btn btn-primary btn-lg ">Enviar</button></td>
        </tr>
    </table>
</form>
<?php require_once ("rodape.php"); ?>
