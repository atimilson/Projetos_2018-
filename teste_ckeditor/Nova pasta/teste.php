<DOCTYPE html>

<?php

$txtNome    = filter_input(INPUT_POST, 'editor1',FILTER_SANITIZE_SPECIAL_CHARS);


?>


<html>
<head>
    <title>teste</title>
</head>
<body>
    <p>teste</p>
    <p>
dadad    </p>
    
    
    
    
    
    
    <?php
    
    $texto = "{$txtNome}";
    
    printf ($texto);
    
    
    ?>
    
    
</body>



</html>