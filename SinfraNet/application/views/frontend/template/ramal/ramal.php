<div class="container" style="padding-bottom: 15px;">

    <div class="btn-input input-space form-row">
        <select id="selecione" class="select-estilo">
            <option>Selecionar Filtro</option>
            <option value="setor">Setor</option>
            <option value="nome">Nome</option>
            <option value="ramal">Ramal</option>
        </select>
        <input type="text" class="form-control" id="filtro" onkeyup="searchSetor()" placeholder="Selecionar Filtro ao lado.">
    </div>

    <table id="myTable">
        <tr class="header">            
            <th colspan="3" class="estilo-tabel">SUBSOLO</th>             
        </tr>

        <?php
        foreach ($ramais_home as $ramal) {
            if ($ramal->andar == "-1") {
                ?>
                <tr>
                    <td class="tamanho-setor" ><?= $ramal->nome_setor ?></td>
                    <td class="tamanho-nome" ><?= $ramal->nome ?></td>
                    <td class="tamanho-ramal"><?= $ramal->ramal ?></td>
                </tr>
                <?php
            }
        }
        ?>
        <tr class="header">            
            <th colspan="3" class="estilo-tabel">TÉRREO</th>                                     
        </tr>
        <?php
        foreach ($ramais_home as $ramal) {
            if ($ramal->andar == "0") {
                ?>
                <tr>
                    <td class="tamanho-setor" ><?= $ramal->nome_setor ?></td>
                    <td class="tamanho-nome" ><?= $ramal->nome ?></td>
                    <td class="tamanho-ramal"><?= $ramal->ramal ?></td>
                </tr>
                <?php
            }
        }
        ?>

        <tr class="header">            
            <th colspan="3" class="estilo-tabel">1º ANDAR</th>                                     
        </tr>

        <?php
        foreach ($ramais_home as $ramal) {
            if ($ramal->andar == "1") {
                ?>
                <tr>
                    <td class="tamanho-setor" ><?= $ramal->nome_setor ?></td>
                    <td class="tamanho-nome" ><?= $ramal->nome ?></td>
                    <td class="tamanho-ramal"><?= $ramal->ramal ?></td>
                </tr>
                <?php
            }
        }
        ?>


        <tr class="header">            
            <th colspan="3" class="estilo-tabel">2º ANDAR</th>                                     
        </tr>

        <?php
        foreach ($ramais_home as $ramal) {
            if ($ramal->andar == "2") {
                ?>
                <tr>
                    <td class="tamanho-setor" ><?= $ramal->nome_setor ?></td>
                    <td class="tamanho-nome" ><?= $ramal->nome ?></td>
                    <td class="tamanho-ramal"><?= $ramal->ramal ?></td>
                </tr>
                <?php
            }
        }
        ?>

        <tr class="header">            
            <th colspan="3" class="estilo-tabel">Outros</th>                                     
        </tr>

        <?php
        foreach ($ramais_home as $ramal) {
            if ($ramal->andar == "-2") {
                ?>
                <tr>
                    <td class="tamanho-setor" ><?= $ramal->nome_setor ?></td>
                    <td class="tamanho-nome" ><?= $ramal->nome ?></td>
                    <td class="tamanho-ramal"><?= $ramal->ramal ?></td>
                </tr>
                <?php
            }
        }
        ?>

    </table>

</div>