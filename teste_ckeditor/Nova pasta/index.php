<html>
  <HEAD>
    <title>Teste</title>

    <script src="ckeditor/ckeditor.js"></script>
  </head>
  <body>
    <form action="teste.php" method="post">
    <textarea class="ckeditor" name="editor1"></textarea>
        <button type="submit" value="cadastrar">CAdastrar</button>
</form>

      <?php 
    $objDateTime = new DateTime('NOW');
    $time = microtime();
    echo $objDateTime->format('YmdHis').''.substr($time,2,9).'<br/>'; // ISO8601 formated datetime
    phpinfo();
      
      ?>

  </body>
  <script>
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace( 'editor1');
  </script>




</html>
