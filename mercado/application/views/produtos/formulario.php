<html lang="pt-br">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Cadastro de Novo Produto</h1>
            <?php
            echo form_open("produtos/novo");

            echo form_label("Nome", "nome");
            echo form_input(array(
                "name" => "nome",
                "class" => "form-control",
                "id" => "nome",
                "maxlength" => "255"
            ));

            echo form_label("Preco", "preco");
            echo form_input(array(
                "name" => "preco",
                "class" => "form-control",
                "id" => "nome",
                "maxlength" => "255",
                "type" => "number"
            ));

            echo form_label("Descrição", "descricao");
            echo form_textarea(array(
                "name" => "descricao",
                "class" => "form-control",
                "id" => "descricao"
            ));

            echo form_button(array(
                "class" => "btn btn-primary",
                "content" => "Cadastrar",
                "type" => "submit"
            ));

            echo form_close();
            ?>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</html>