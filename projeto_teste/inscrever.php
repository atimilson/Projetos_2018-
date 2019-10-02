<?php
    require_once ("cabecalho.php");
    ?>
<div class="row" style="margin-top: 80px">
    <form action="registra.php" class="col s12">
        <div class="row">

            <div class=" col s6">
                <label for="nome">Digite seu nome</label>
                <input id="nome" type="text">

            </div>
            <div class=" col s6">
                <label for="login">Digite seu login</label>
                <input id="login" type="text">

            </div>
        </div>
        <div class="row">
            <div class="col s4">
                <label for="email">Digite seu email</label>
                <input id="email" type="email">
            </div>
            <div class="col s4">
                <label for="data">Digite sua data de nascimento</label>
                <input id="data" type="date">
            </div>

            <div class="col s4">
                <label for="senha">Digite sua senha</label>
                <input id="senha" type="password">
            </div>


        </div>

        <div class="col s12 valign-wrapper">
            <div class="row valign">
                <div class="col s2">
                    <button type="submit" class="btn waves-effect waves-light">Registrar</button>
                </div>
            </div>
        </div>


    </form>

</div>


<?php
require_once ("rodape.php");
?>