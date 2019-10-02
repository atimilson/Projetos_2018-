<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
ini_set('display_errors', FALSE);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Administrador</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/') ?>style4.css"/>

        <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/') ?>perfil.css"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/') ?>estilo-usuario.css"/>

        <!--O estilo do ramal e aniversario está no mesmo css - apeanas muda o JS-->
        <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/') ?>estilo-ramal&aniver-adm.css"/>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">

        <script src="<?php echo base_url('assets/backend/js/') ?>aniversario.js"></script>
        <script src="<?php echo base_url('assets/backend/js/') ?>listar-categorias.js"></script>
        <script src="<?php echo base_url('assets/backend/js/') ?>listar-categorias-e-sub.js"></script>
        <script src="<?php echo base_url('assets/backend/js/') ?>listar-duvida.js"></script>
        <script src="<?php echo base_url('assets/backend/js/') ?>listar-acesso.js"></script>
        <script src="<?php echo base_url('assets/backend/js/') ?>listar-servico.js"></script>
        <script src="<?php echo base_url('assets/backend/js/') ?>ramal.js"></script>
        <script src="<?php echo base_url('assets/backend/js/') ?>perfil.js"></script>
        <script src="<?php echo base_url('assets/backend/js/') ?>usuario.js"></script>
         <script src="<?php echo base_url('assets/backend/js/') ?>listar-setor.js"></script>
        <!--Ramal-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<!--        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('ckeditor/') ?>ckeditor.js"></script>
        <script>
            function mostraDialogo(mensagem, tipo, tempo) {

                // se houver outro alert desse sendo exibido, cancela essa requisição
                if ($("#message").is(":visible")) {
                    return false;
                }

                // se não setar o tempo, o padrão é 3 segundos
                if (!tempo) {
                    var tempo = 3000;
                }

                // se não setar o tipo, o padrão é alert-info
                if (!tipo) {
                    var tipo = "info";
                }

                // monta o css da mensagem para que fique flutuando na frente de todos elementos da página
                var cssMessage = "display: block; position: fixed; top: 0; left: 20%; right: 20%; width: 60%; padding-top: 10px; z-index: 9999";
                var cssInner = "margin: 0 auto; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);";

                // monta o html da mensagem com Bootstrap
                var dialogo = "";
                dialogo += '<div id="message" style="' + cssMessage + '">';
                dialogo += '    <div class="alert alert-' + tipo + ' alert-dismissable" style="' + cssInner + '">';
                dialogo += '    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                dialogo += mensagem;
                dialogo += '    </div>';
                dialogo += '</div>';

                // adiciona ao body a mensagem com o efeito de fade
                $("body").append(dialogo);
                $("#message").hide();
                $("#message").fadeIn(200);

                // contador de tempo para a mensagem sumir
                setTimeout(function () {
                    $('#message').fadeOut(300, function () {
                        $(this).remove();
                    });
                }, tempo); // milliseconds

            }
        </script>
    </head>
    <body style="background: #EBEBEB;">
