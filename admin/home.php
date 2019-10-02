<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['id_usuario']) && isset($_SESSION["nome"])) {
    $user = $_SESSION["nome"];
} else {
    header("Location: index.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrador Mapa Rodoviario</title>
        <meta name="viewport" content="width=device-width, initial-scale=0.5"> 
        <link rel="shortcut icon" href="favicon.png" />  

        <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/estilo.css"/>

    </head>
    <body>
        <div id="conteudo" class="container"> 



            <div class="row">
                <div class="col-10 text-right">
                    <p style="font-family: Nexa-xbold;color: #133058;">Usuario :<?php echo " " . $user; ?></p> 

                </div>
                <div class="col-2 text-left">
                    <a href="logoff.php" class="alert alert-danger">Sair </a>
                </div>
            </div>


            <div class="row">




                <div class="col-12" style="">
                    <label >Tipo de Pesquisa:</label>


                    <select class="form-control" name="tp_pes" id="tp_pes" required="required">
                        <option disabled selected hidden>Selecionar</option>
                        <option value="1">Download realizado</option>
                        <option value="2">Somente preencheu o cadastro</option>
                        <option value="3">Todos</option>
                    </select>

                </div>





            </div>
            <div class="row">
                <div class="col-4" style="">
                    <label >Data:</label>
                    <input type="date" class="form-control" name="dt_ini" id="dt_ini"> 


                </div>
                <div class="col-4" style="">
                    <label> até </label>

                    <input type="date" class="form-control " name="dt_fim" id="dt_fim"> 
                </div>

                <div id="col-pesquisar" class="col-2" style="">

                    <button id="pesquisar" type="button" class="btn btn-primary" onclick="getDatados();">Pesquisar </button>
                </div>

                <div class="col-2" id="col-exportar">


                    <a id="btnExport" class="btn btn-success" download="Lista.xls" href="#" onclick="return ExcellentExport.excel(this, 'tabela', 'MapaRodoviario');">
                        Exportar
                    </a>

                </div>

            </div>



            <div id="dvData">
                <table id="tabela" class="table table-hover table-responsive-lg">

                    <thead>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col" style="padding-right: 53px;padding-left: 53px;">Cpf</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Profissão</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>


                    </thead>
                    <tbody id="tb_conteudo">



                    </tbody>





                </table>
            </div>



        </div>

    </body>


    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="excellentexport.js"></script>
    <script src="date.js"></script>
  <!--  <script src="require.js"></script>
<script>
    require(['excellentexport'], function(ee) {
        window.ExcellentExport = ee;
    });
</script> -->


    <!-- Bootstrap Js CDN -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <script>



                        function getDatados() {
                            var dt_i = (document.getElementById('dt_ini').value);
                            // var dt_f = (document.getElementById('dt_fim').value);
                            var tip_pesq = (document.getElementById('tp_pes').value);
                            var data_c = "";
                            var time = (document.getElementById('dt_fim').value);
                            if (time != ""){
                            
                            var dias = 1;
                            var data = Date.parse(time).add(dias).days();
                            var dia = data.getDate();
                            var mes = (data.getMonth() + 1)
                            var ano = data.getFullYear();

                            data_c = (ano + "-" + mes + "-" + dia);
                        }

                            console.log(data_c);

                            var cont = 0;
                            $('#tb_conteudo').empty(); //Limpando a tabela
                            $.ajax({

                                data: {data_inic: dt_i, data_f: data_c, tipo_p: tip_pesq}, // ou "id=1 Ai no PHP você faz $_POST[‘id’];"
                                type: 'post', //Definimos o método HTTP usado
                                dataType: 'json', //Definimos o tipo de retorno
                                url: 'lista_pesquisa.php', //Definindo o arquivo onde serão buscados os dados
                                success: function (dados) {
                                    for (var i = 0; dados.length > i; i++) {
                                        cont++;
                                        //Adicionando registros retornados na tabela
                                        $('#tb_conteudo').append('<tr><td>' + cont + '</td><td>' + dados[i].nome + '</td> <td>' + dados[i].cpf + '</td><td>' + dados[i].email + '</td><td>' + dados[i].profissao + '</td><td>' + dados[i].data_cadastro + '</td><td>' + dados[i].estado + '</td><td>' + dados[i].cidades + '</td></tr>');
                                    }
                                }
                            });

                        }





                        /*
                         $("#btnExport").click(function (e) {
                         window.open('data:application/vnd.ms-excel,' + $('#dvData').html());
                         e.preventDefault();
                         }); 
                         
                         
                         $("#btnExport").click(function (){
                         $ ( "table" ). tableExport().reset();
                         })
                         
                         */

    </script>

    <script>
        /*function Excel(tabela,form)
         {
         
         $("#Tabela_Excel").val( $("<div>").append( $("#" + tabela).eq(0).clone()).html());
         $("#" + form).submit();
         
         } */


    </script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
</html>
