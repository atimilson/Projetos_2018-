<html lang="pt-br">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>
        <?= $produto["nome"]?> </h1>
            
        Preco: <?= $produto["preco"]?> <br>
        <?= auto_typography($produto["descricao"])?><br>
        
        </div>
    </body>
</html>