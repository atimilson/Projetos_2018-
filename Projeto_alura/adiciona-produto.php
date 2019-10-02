<?php
require_once ("cabecalho.php");
require_once ("conecta.php");
require_once ("banco-produto.php");
require_once ("logica-usuario.php");
require_once ("class/produto.php");
require_once ("class/categoria.php");
verificaUsuario();
?>

<?php
$produto = new Produto();
$categoria = new Categoria();

$categoria = $_POST["categoria_id"];
$produto->nome = $_POST["produto"];
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"];


if (array_key_exists('usado', $_POST)) {
    $produto->usado = "true";
} else {
    $produto->usado = "false";
}
$produto->categoria = $categoria;
if (insereProduto($link, $produto)) {
    ?>
    <p class="text-success">Produto <?= $produto->nome ?>, <?= $produto->preco ?> adicionado com sucessos</p> 
<?php
} else {
    $msg = mysqli_error($link);
    ?>

    <p class="text-danger">O produto <?= $produto->nome ?> não foi adicionado : <?= $msg ?></p>
    <?php
}





require_once ("rodape.php");



