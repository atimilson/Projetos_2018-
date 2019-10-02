<?php

$acao = $_GET["led"];
echo $acao;



$conexaoArduino = fopen("COM3","C");
sleep(1);

switch ($_REQUEST["led"]){
                case "Apagar": $acao = "0"; break;
                case "Acender" : $acao = "1"; break;
}

echo $acao;
fwrite($conexaoArduino, $acao);
fclose($conexaoArduino);

