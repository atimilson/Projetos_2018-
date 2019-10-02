<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Hello!</title>
</head>

<body>

<?php
    if( $_SESSION['captcha'] == $_POST['captcha']) {
        echo "<h1>Ok - Codigo Correto</h1>";
    } else {
        echo "<h1>Erro - Codigo digitado errado</h1>";
    }
?>

</body>

</html>
