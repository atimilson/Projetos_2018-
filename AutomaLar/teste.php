<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Endereco do arduino:
$host = '192.168.0.128';
$port = 99;

$package = "9"; // Número ou código definido para checar o estado.

// Função que checa o estado
function checkState2 ($package, $host, $port)
    {
    $timeout =1;

    $socket  = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => $timeout, 'usec' => 0));
    socket_connect($socket, $host, $port);

    $ts = microtime(true);
    socket_send($socket, $package, strLen($package), 0);


    $buf = 'This is my buffer.';
    if (false !== ($bytes = socket_read($socket, 2048))) {
        $estado = $bytes;
    } else {
        echo "socket_recv() failed; reason: " . socket_strerror(socket_last_error($socket)) . "\n";
        }

    return $estado;    


    socket_close($socket);

}



$estado = checkState2 ($package,$host,$port);


if ($estado == 'ON'){ ?>

        <form action='altera.php'  method='post'>
        <input type="hidden" name="status" value="off" />
        <input id='botledoff' type='submit' name='submit' value="Desligar LED" />
        </form>                     
        <?php }
    else if ($estado == 'OFF') { ?>
        <form action='altera.php'  method='post'>
        <input type="hidden" name="status" value="on" />
        <input id='botledoff' type='submit' name='submit' value="Ligar LED" />
        </form>

        <?php
        }
    else {
        echo "Erro no recebimento do estado";
    }

