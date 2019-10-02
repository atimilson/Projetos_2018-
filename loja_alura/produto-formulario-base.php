
<tr>
        <div class="form-group">
            <td>Produto:</td>
            <td><input class="form-control" type="text" name="produto" value="<?=$produto['nome'];?>"></td>
        </div>
        </tr>
        <tr>
        <div class="form-group">
            <td>Preço:</td>
            <td><input class="form-control" type="number" name="preco" value="<?=$produto['preco'];?>"></td>
        </div>
        </tr>
        <tr>
        <div class="form-group">
            <td>Descrição:</td>
            <td><textarea class="form-control" type="text" name="descricao"><?=$produto['descricao'];?></textarea></td>
            
        </div>
        </tr>
        <tr>
            <td>Estado :</td>
            <td><input class="form-control" style="float: left" type="checkbox" <?=$usado?> name="usado" value="true">Usado</td>
        </tr>
        <tr>
            <td>Categoria</td>
            <td>
                <select name="categoria_id" class="form-control">
                <?php foreach ($categorias as $categoria): 
                    $categoriaSelecionada = $produto['categoria_id'] == $categoria['id'];
                    $selecao = $categoriaSelecionada ? "selected='selected'" : "";
                    ?>
                    <option value="<?= $categoria['id']?>" <?=$selecao?>><?= $categoria['nome']?></option>
                <?php endforeach; ?>
                </select>
               
            </td>
        </tr>
        <br>