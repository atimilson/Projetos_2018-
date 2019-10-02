<html lang="pt-br">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            
              <?php if($this->session->flashdata("danger")) :?>
            <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
             <?php endif ?>

            <?php if($this->session->flashdata("sucess")) :?>
            <p class="alert alert-success"><?= $this->session->flashdata("sucess") ?></p>
            <?php endif ?>
            
            
          
            
            
            <h1>Produtos</h1>
            <table class="table">
                <?php foreach ($produtos as $produto) : ?>

                    <tr>

                        <td> 
                        <?= anchor("produtos/mostra?id={$produto['id']}",$produto["nome"]) ?>
                        </td>
                        <td> <?= $produto["descricao"] ?> </td>
                        <td> <?= numeroEmReais($produto["preco"]) ?> </td>
                    </tr>
                <?php endforeach; ?>


            </table>

            <?php if ($this->session->userdata("usuario_logado")) : ?>

                <?= anchor('produtos/formulario', 'Novo produto', array("class" => "btn btn-primary")); ?>

                <?= anchor('login/logout', 'Logout', array("class" => "btn btn-primary")); ?>




            <?php else : ?>


                <h1>
                    Login
                </h1>
                <?php
                echo form_open("login/autenticar");

                echo form_label("Email", "e-mail");
                echo form_input(array(
                    "name" => "e-mail",
                    "id" => "e-mail",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_label("Senha", "s-enha");
                echo form_password(array(
                    "name" => "s-enha",
                    "id" => "s-enha",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));


                echo form_button(array(
                    "class" => "btn btn-primary",
                    "content" => "Login",
                    "type" => "submit"
                ));

                echo form_close();
                ?>



                <h1>Cadastro</h1>
                <?php
                echo form_open("usuarios/novo");

                echo form_label("Nome", "nome");
                echo form_input(array(
                    "name" => "nome",
                    "id" => "nome",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));


                echo form_label("Email", "email");
                echo form_input(array(
                    "name" => "email",
                    "id" => "email",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_label("Senha", "senha");
                echo form_password(array(
                    "name" => "senha",
                    "id" => "senha",
                    "class" => "form-control",
                    "maxlength" => "255"
                ));

                echo form_button(array(
                    "class" => "btn btn-primary",
                    "content" => "Cadastrar",
                    "type" => "submit"
                ));

                echo form_close();
                ?>

            <?php endif ?>


        </div>

    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</html>