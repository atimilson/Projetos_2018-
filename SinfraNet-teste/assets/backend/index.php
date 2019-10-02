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



  </body>
  <script>
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace( 'editor1');
  </script>





</html>
