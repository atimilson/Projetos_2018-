<?php
// Alterar estado:

//The $package variable is what gets sent to the arduino
if ($_POST["status"] == "on")
    {
    $package = "1";
    changeState($package, $host, $port);
    echo '<script language="javascript" type="text/javascript">
                window.history.go(-1) 
                </script>'; //Apenas um link para retornar 
    }
if ($_POST["status"] == "off")
    {
    $package = "0";
    changeState($package, $host, $port);
    
    

    
    echo '<script language="javascript" type="text/javascript">
                window.history.go(-1)
                </script>'; //Apenas um link para retornar 

    }
function changeState ($package, $host, $port)
    {
    //The rest of this code sends the package variable to the arduino
    $timeout =1;

    $socket  = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => $timeout, 'usec' => 0));
    socket_connect($socket, $host, $port);
    $ts = microtime(true);
    socket_send($socket, $package, strLen($package), 0);
    socket_close($socket);

    }
    
