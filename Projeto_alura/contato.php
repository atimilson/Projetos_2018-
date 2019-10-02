<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ("cabecalho.php");
 ?>
<form action="envia-contato.php" method="post">

<table class="table">
    <tr>
        <td>Nome</td>
        <td><input type="text" name="nome" class="form-control"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="email" name="email" class="form-control"></td>
    </tr>
    <tr>
        <td>Mensagem</td>
        <td><textarea name="mensagem" class="form-control"></textarea></td>
    </tr>
    <tr>
        
        <td colspan="2"><button class="btn btn-info">Enviar</button></td>
    </tr>
    
    
</table>
</form>

<?php require_once ("rodape.php"); ?>