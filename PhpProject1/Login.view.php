<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Michael Lopes">
    <base href="<?php echo BASE_URL ?>">

    <title>Login | PRECF - Sistema de Prestação de Contas FETHAB</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="view/libs/css/animate.css" />
    <link rel="stylesheet" href="view/libs/css/bootstrap.min.css" />
    <link rel="stylesheet" href="view/libs/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="view/libs/css/matrix-login.css" />

    <link href="view/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="view/css/core.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<?php 
   $ref = rand(1, 500); 
?>
<body>
     <img src="http://www.sinfra.mt.gov.br//image/layout_set_logo?img_id=365359&t=1530431912301" alt="Logo" style="width: 300px;top: 50px;left: 50px;position:absolute" />
    <div id="loginbox">
        <div class="control-group normal_text">
            <h3><img src="view/img/logo-nova-cut.png" alt="Logo" style="width: 220px;padding-right: 25px;" /></h3>

        </div>
        <?php if(isset($_GET['status']) && $_GET['status'] == "success") { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Sucesso!</h4>
                Sua solicitação de cadastro foi enviada com sucesso. Em breve entraremos em contato para terminar o processo de casdastro
            </div>
        <?php } ?>
        <form id="loginform" action="login/autUsuario" method="POST" class="form-vertical">
            
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span><input name="usuario" id="usuario" type="text"
                            placeholder="Usuário ou Email" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input name="senha" id="senha" type="password"
                            placeholder="Senha" />
                    </div>
                </div>
            </div>
           <!-- <h1 style="text-align: center;margin:0">
               <div style="width: 304px;margin: auto;" class="g-recaptcha" data-sitekey="6LfPQ0sUAAAAAJ1eoxpbBpGXKJM48TCZ0gaTgE5P"></div>
            </h1>-->
            <h1 style="text-align: center;margin:0">
                <img src="Captcha.php?ref=<?=$ref ?>" alt="Código captcha">
            </h1>
            <div class="control-group">
                <div class="controls">
                    <input type="text" id="captcha1" name="captcha1" style="width: 87%;margin-left: 19px;" required placeholder="Digite o código acima" />
                </div>
            </div>
           
            <div class="form-actions" style="margin-top: 0px">
                <span class="pull-left"><a href="javascript:void(0)" class="flip-link btn btn-info" id="to-recover">Solicitar cadastro</a></span>
                <span class="pull-right"><button type="submit" class="btn btn-success" /> Entrar</button></span>
            </div>
        </form>
        <form id="recoverform" action="login/solicitarUsuario" method="POST" class="form-vertical">
            <p class="normal_text">Preencha os campos abaixo para realizar um pedido de cadastro de usuário.</p>

            <div class="control-group">
                <label class="control-label">Cidade* :</label>
                <div class="controls">
                    <select class="span11" id="cidade-usuario" name="cidade-usuario" required>
                    <option value="">Selecione uma cidade</option>
                    <?php if(isset($this->cidades) && count($this->cidades) > 0) { ?>
                            <?php foreach($this->cidades as $cidade) { ?>
                                <option value="<?=$cidade['CODIGO'] ?>"><?=$cidade['NOME'] ?></option>
                            <?php } ?>
                    <?php } ?>
                </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Nome completo* :</label>
                <div class="controls">
                    <input type="text" id="nome-usuario" name="nome-usuario" class="span11" required placeholder="Digite um nome" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">CPF* :</label>
                <div class="controls">
                    <input type="text" data-rule-cpf="true" id="cpf-usuario" name="cpf-usuario" class="span11 cpf" required placeholder="Digite um CPF" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Telefone* :</label>
                <div class="controls">
                    <input type="text" id="tel-usuario" name="tel-usuario" class="span11 new_celphones" required placeholder="Digite um telefone" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">E-mail corporativo* :</label>
                <div class="controls">
                    <input type="text" id="email-usuario" name="email-usuario" class="span11" required placeholder="Digite um e-mail" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Cargo* :</label>
                <div class="controls">
                    <input type="text" id="cargo-usuario" name="cargo-usuario" class="span11" required placeholder="Digite um cargo" />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Usuário* :</label>
                <div class="controls">
                    <input type="text" id="login-usuario" name="login-usuario" class="span11" required placeholder="Usuário que será usado entrar no sistema" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Tipo de Usuário* :</label>
                <div class="controls">
                    <select class="span11" id="tipo-solicitacao" name="tipo-solicitacao" required>
                        <option value="">Selecione o tipo de usuário</option>
                        <option value="Munícipio">Munícipio</option>
                        <option value="Conselho">Conselho</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Senha* :</label>
                <div class="controls">
                    <input type="password" id="senha-usuario" name="senha-usuario" class="span11" required placeholder="Digite uma senha" />
                </div>
            </div>

             <div class="control-group">
                <label class="control-label">Repita a Senha* :</label>
                <div class="controls">
                    <input type="password" id="resenha-usuario" data-rule-equalTo="#senha-usuario" name="resenha-usuario" class="span11" required placeholder="Repita a senha" />
                </div>
            </div>
            <!--<h1 style="text-align: center;margin:0">
               <div style="width: 304px;margin: auto;" class="g-recaptcha" data-sitekey="6LfPQ0sUAAAAAJ1eoxpbBpGXKJM48TCZ0gaTgE5P"></div>
            </h1>-->
            <h1 style="text-align: center;margin:0">
                <img src="Captcha.php?ref=<?=$ref ?>" alt="Código captcha">
            </h1>
            <div class="control-group">
                <div class="controls">
                    <input type="text" id="captcha2" name="captcha2" class="span11" required placeholder="Digite o código acima" />
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left"><a href="javascript:void(0)" class="flip-link btn btn-success" id="to-login">&laquo; Volta ao login</a></span>
                <span class="pull-right"><button class="btn btn-info" >Solicitar</button></span>
            </div>

        </form>
    </div>


    <script src="view/libs/js/jquery.min.js"></script>
    <script src="view/libs/js/matrix.login.js"></script>
    <script src="view/libs/js/jquery.mask.min.js"></script>
    <script src="view/libs/js/jquery.validate.min.js"></script> 
    <script src="view/libs/js/messages_pt_BR.min.js"></script> 
    <script src="view/js/core.js"></script>
    <script> 
        $("#recoverform").validate();
    </script>
</body>

</html>