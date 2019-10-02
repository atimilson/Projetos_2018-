<?php
require_once ("cabecalho.php");
require_once ("conecta.php");
require_once ("banco-produto.php");


?>


<table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Descrição</th>
            
        </tr>
    </thead>
    <?php
    $produtos = listaProdutos($link);

    foreach ($produtos as $produto) :
        ?>

        <tr>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= substr($produto['descricao'],0,40) ?></td>
            <td><?= $produto['categoria_nome'] ?></td>
            <td><a class="btn btn-info" href="produto-altera-formulario.php?id=<?= $produto['id']?>">alterar</a></td>
            <td>
                <form action="remove-produto.php" method="POST">
                    <input type="hidden" name="id" value="<?=$produto['id']?>">
                <button class="btn btn-danger" class="text-danger">remover</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach;
?>
</table>
    <?php
    require_once ("rodape.php");
    