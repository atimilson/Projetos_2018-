<div class="container">
           <?php if (isset($_SESSION['err'])) { ?>
        <script>
            var mensagem = "<strong>Existem usuários cadastrados com este Perfil</strong>";
            mostraDialogo(mensagem, "danger", 4500);
        </script>
        <?php
        unset($_SESSION['err']);
    }
    ?>

    <h2>Categorias Cadastradas</h2>

    <div class="btn-input input-space form-row">
<!--        <select id="selecione" class="select-estilo">
            <option value="categoria">Categoria</option>
        </select>-->
        <input type="text" id="filtro-aniver" onkeyup="search_cat()" placeholder="Pesquisar Categoria">
    </div>

    <table class="table table-responsive" id="tableCat-sub" style="border-collapse: separate;
           border-spacing: 0 10px; margin: 0 0 0 0;">
        <thead class="titulos-tabela">
            <tr>
                <th class="centro">ID</th>

                <th class="centro">CATEGORIA</th>

                <th class="centro">AÇÕES</th>


            </tr>
        </thead>
        <tbody id="corpo">
            <!-- tabela categoria -->


        </tbody>
    </table>






    <form>
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Alterar Categoria</h4>
                    </div>
                    <div class="modal-body">
                        <div id="error_edit">

                        </div>

                        <div class="form-group">
                            <label class="label-modal" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome_categoria_edit" name="nome_categoria_edit" value="" placeholder="Nome Categoria"/>
                        </div>


                        <input type="hidden" name="id_edit" id="id_edit" class="form-control">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="save_edit" type="submit" class="btn btn-success salve">Salvar</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <!-- Modal editar  -->

    <!-- Modal excluir  -->
    <form>
        <div class="modal fade" id="Modalexcluir" tabindex="-1" role="dialog" aria-labelledby="Modal_excluir" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Excluir Categoria</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Deseja Excluir a categoria ?</h4>
                        <p>Após Excluido,não ficara mais disponível no Sistema.</p>
                        <p>A categoria será excluido permanetemente.</p>
                    </div>
                    <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" type="submit" id="btn_delete" class="btn btn-danger">Apagar</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <!-- fim Modal excluir  -->







<div class="modal fade" id="mymodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title">SUBCATEGORIA</h4>
            </div>
            <div class="" id="errror_cadastrar"></div>
            <div class="modal-body">
                <form class="form-inline">
                <div class="form-group mb-2">

                    <input type="text" class="form-control" id="subCategoria" name="subCategoria" placeholder="Nome SubCategoria" maxlength="30">
                    <input type="hidden" id="id-subCategoria" name="id-subCategoria">
                  </div>

                    <button type="submit" class="btn btn-success" id="cadastrar_subcategoria">


                         Adicionar
                    </button>
              </form>

                <table class="table table-responsive table-condensed">
                    <thead>
                    <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Acões</th>
                    </tr>
                    </thead>
                    <tbody id="corpo_sub">


                    </tbody>


                </table>




            </div>
            <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn btn-danger">Fechar</a>
<!--                <a href="#" class="btn btn-primary">Outro botão a ser implementado</a>-->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title">Editar Sub-Categoria</h4>
            </div>


            <form class="form">
            <div class="modal-body">

                    <input type="text" class="form-control" name="edit-nome-cate-sub" id="edit-nome-cate-sub">
                    <input type="hidden" name="edit-id-cate-sub" id="edit-id-cate-sub">
                    <input type="hidden" name="edit-id-categoria" id="edit-id-categoria">


            </div>
            <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn btn-danger">Fechar</a>
              <button type="submit" id="salvar-edit-sub-cate" class="btn btn-success">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title">Editar Sub-Categoria</h4>
            </div>

                 <div class="modal-body">
                        <h4>Deseja Excluir a Sub-categoria ?</h4>
                        <p>Após Excluido,não ficara mais disponível no Sistema.</p>
                        <p>A categoria será excluido permanetemente.</p>
                    </div>
                    <input type="hidden" name="id_delete_sub_cate" id="id_delete_sub_cate" class="form-control">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" type="submit" id="btn_delete_subcategoria" class="btn btn-danger">Apagar</button>
                    </div>
        </div>
    </div>
</div>




    <div id="mybutton">

        <a  data-toggle="modal" data-target="#basicModal" class="btn-adicionar" href="#">

            <i class="material-icons" id="btn-addi">
                add
            </i>


        </a>

    </div>




    <!--MODAL CADASTRAR CATEGORIA -->
    <form>
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Cadastrar Categoria</h4>
                    </div>
                    <div class="modal-body">
                        <div id="error_cadastrar"></div>


                        <div class="form-group">
                            <label class="label-modal" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Categoria" value="" maxlength="50" required="required"/>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="btn_save" type="submit"  class="btn btn-success salve">Salvar</button>
                    </div>

                </div>
            </div>
        </div>
    </form>



















    <!--FIM DO MODAL-->

        <script>
                $(document).ready(function () {
            $('#abrir').click(function () {
                $('#myModal').modal({
                    show: true
                })
            });
                $(document).on('show.bs.modal', '.modal', function (event) {
                    var zIndex = 1040 + (10 * $('.modal:visible').length);
                    $(this).css('z-index', zIndex);
                    setTimeout(function() {
                        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                    }, 0);
                });
            });
            </script>

             <script>

                $(document).ready(function () {
                    listar_categorias();



            		function listar_categorias(){
		    $.ajax({
		        type  : 'ajax',
		        url   : '<?php echo base_url('admin/categoria/listar_categorias')?>',

		        dataType : 'json',
		        success : function(data){
		            var html = '';

		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr class="corpo-tabela">'+
		                  	'<td>'+data[i].id+'</td>'+
		                        '<td>'+data[i].nome+'</td>'+

		                        '<td style="text-align:right;display:flex;">'+

                                    '<a href="javascript:void(0);" class="btn-preview btn-sm item_categoria" data-id="'+data[i].id+'" data-nome="'+data[i].nome+'" style="margin-right:4px;">'+
                                    ' <i class="material-icons centro-icon" style="font-size:26px;">add_circle</i>'+'\
                                    </a>'+' '+

                                    '<a href="javascript:void(0);" class="btn-editar-not btn-sm item_edit" data-id="'+data[i].id+'" data-nome="'+data[i].nome+'" style="margin-right:4px;">'+
                                    ' <i class="material-icons centro-icon">edit</i>'+'\
                                    </a>'+' '+

                                    '<a href="javascript:void(0);" class="btn-excluir-not btn-sm item_delete" data-id="'+data[i].id+'"><i class="material-icons centro-icon">delete_forever</i></a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#corpo').html(html);


		        }

		    });
		}

                       //Save product
        $('#btn_save').on('click',function(){
            var nome = $('#nome').val();

            $.ajax({
                async : true,
                type : "POST",
                url  : "<?php echo base_url ('admin/categoria/salvar')?>",
                dataType : "JSON",
                data : {nome:nome},

                success: function(data){
//                   $('[name="nome"]').val("");
//
//                    $('#basicModal').modal('hide');
//                    listar_categorias();

                    if(data == true){
                    $('[name="nome"]').val("");
                    $('.form-group').removeClass('has-error').removeClass('has-success');
                    $('.alert-danger').remove();

                    $('#basicModal').modal('hide');
                    var mensagem = "<strong>Informações cadastradas com sucesso!</strong><br>Suas informações foram cadastradas.";
                    mostraDialogo(mensagem, "success", 2500);

                    listar_categorias();
                }else if(data.messages){
                    $.each(data.messages, function(key, value) {
                                                var element = $('#' + key);

		element.closest('div.form-group').removeClass('has-error').addClass(value.length > 0 ? 'has-error' : 'has-success').find('.alert-danger').remove();
//		$('#error_cadastrar').append('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">X</span></button><strong>'+value+'</strong></div>');
//



                 element.after(value);

                    });

                }

                }
            });
            return false;
        });


            $('#corpo').on('click','.item_edit',function(){
            var nome = $(this).data('nome');
            var id = $(this).data('id');


            $('#ModalEdit').modal('show');
            $('[name="nome_categoria_edit"]').val(nome);
            $('[name="id_edit"]').val(id);

        });

        //update record to database
         $('#save_edit').on('click',function(){
            var nome = $('#nome_categoria_edit').val();
            var id = $('#id_edit').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/categoria/alterar')?>",
                dataType : "JSON",
                data : {nome:nome , id:id},
                success: function(data){


                    if(data == true){
                    $('[name="nome_categoria_edit"]').val("");
                    $('[name="id_edit"]').val("");
                    $('.form-group').removeClass('has-error').removeClass('has-success');
                    $('.alert-danger').remove();

                    $('#ModalEdit').modal('hide');
                    var mensagem = "<strong>Informações Alteradas com sucesso!</strong><br>Suas informações foram Alteradas.";
                    mostraDialogo(mensagem, "success", 2500);

                    listar_categorias();
                }else if(data.messages){
                    $.each(data.messages, function(key, value) {
                                                var element = $('#' + key);

		element.closest('div.form-group').removeClass('has-error').addClass(value.length > 0 ? 'has-error' : 'has-success').find('.alert-danger').remove();
//		$('#error_cadastrar').append('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">X</span></button><strong>'+value+'</strong></div>');
//



                 element.after(value);



                    });

                }

                }
                    });
            return false;
        });


          //get data for delete record
        $('#corpo').on('click','.item_delete',function(){
            var id = $(this).data('id');

            $('#Modalexcluir').modal('show');
            $('[name="id_delete"]').val(id);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            var id_delete = $('#id_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/categoria/excluir')?>",
                dataType : "JSON",
                data : {id:id_delete},
                success: function(data){


                if(data == true){

                     $('[name="id_delete"]').val("");
                    $('#Modalexcluir').modal('hide');
                    var mensagem = "<strong>Existem Documentos cadastrados nesta Categoria!</strong>";
                    mostraDialogo(mensagem, "danger", 4500);
                    console.log(data);
                    listar_categorias();

                }
//
//                beforeSend: function () {
//        //Aqui adicionas o loader
//        $("#divCorpo").html("<img src='imagem_gif_carregando.gif'>");
//    },


                    if(data.success === true){
                    $('[name="id_delete"]').val("");
                    $('#Modalexcluir').modal('hide');
                    var mensagem = "<strong>Categoria excluida com sucesso!</strong>";
                    mostraDialogo(mensagem, "danger", 2500);
                    console.log(data);
                    listar_categorias();
                }

                    if(data.messages === true){
                    $('[name="id_delete"]').val("");
                    $('#Modalexcluir').modal('hide');
                    var mensagem = "<strong>Ocorreu um erro ao apagar !</strong>";
                    mostraDialogo(mensagem, "success", 4500);
                    console.log(data);
                    listar_categorias();

                }



                },//beforeSend
            error: function (responseData, textStatus, errorThrown) {
                    $('[name="id_delete"]').val("");
                    $('#Modalexcluir').modal('hide');
                    var mensagem = "<strong>Existem Documentos cadastrados nesta Categoria!</strong>";
                    mostraDialogo(mensagem, "warning", 4500);
                    console.log(data);
                    listar_categorias();
        }
            });
            return false;
        });


          $('#corpo').on('click','.item_categoria',function(){
            var nome = $(this).data('nome');
            var id = $(this).data('id');




            $('#mymodal').modal('show');
//            $('[name="nome_categoria_edit"]').val(nome);
            $('[name="id-subCategoria"]').val(id);
                console.log(id);






            listar_categorias_sub();

        });



          $('#cadastrar_subcategoria').on('click',function(){
            var nome = $('#subCategoria').val();
            var id = $('#id-subCategoria').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/categoria/cadastrar_sub')?>",
                dataType : "JSON",
                data : {nome:nome , id:id},
                success: function(data){


                    if(data == true){
                    $('[name="subCategoria"]').val("");

                    $('.form-group').removeClass('has-error').removeClass('has-success');
                    $('.alert-danger').remove();


                    var mensagem = "<strong>Informações Alteradas com sucesso!</strong><br>Suas informações foram Alteradas.";
                    mostraDialogo(mensagem, "success", 2500);

                    listar_categorias_sub();
                }else if(data.messages){
                    $.each(data.messages, function(key, value) {
//                                                var element = $('#' + key);


//                alert(value);
//		element.closest('div.form-group').removeClass('has-error').addClass(value.length > 0 ? 'has-error' : 'has-success').find('.alert-danger').remove();
		$('#errror_cadastrar').append(value);
//



//                 element.after(value);



                    });

                }

                }
                    });
            return false;
        });







        function listar_categorias_sub(){


                   var id = $('#id-subCategoria').val();


                $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/categoria/listar_sub')?>",
                dataType : "JSON",
                cache: false,
                data : {id:id},
                success: function(data){

                            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr class="corpo-tabela-sub">'+
		                  	'<td>'+data[i].id_subcategoria+'</td>'+
		                        '<td>'+data[i].nome_sub+'</td>'+

		                        '<td style="text-align:right;display:flex;">'+


                                    '<a href="javascript:void(0);" class="btn-editar-not btn-sm item_edit" data-id="'+data[i].id_subcategoria+'" data-nome="'+data[i].nome_sub+'" data-id-categoria ="'+data[i].id_categoria+'"  style="margin-right:4px;">'+
                                    ' <i class="material-icons centro-icon">edit</i>'+'\
                                    </a>'+' '+

                                    '<a href="javascript:void(0);" class="btn-excluir-not btn-sm item_delete" data-id="'+data[i].id_subcategoria+'"><i class="material-icons centro-icon">delete_forever</i></a>'+
                                '</td>'+
		                        '</tr>';
		            }
		            $('#corpo_sub').html(html);


		        }


                    });
		}









        $('#corpo_sub').on('click','.item_edit',function(){
            var nome = $(this).data('nome');
            var id = $(this).data('id');
            var categoria = $(this).data('id-categoria');



            $('#myModal2').modal('show');
            $('[name="edit-nome-cate-sub"]').val(nome);
            $('[name="edit-id-cate-sub"]').val(id);
            $('[name="edit-id-categoria"]').val(categoria);
        });

           $('#salvar-edit-sub-cate').on('click',function(){
            var nome = $('#edit-nome-cate-sub').val();
            var id_cate_sub = $('#edit-id-cate-sub').val();
            var id_categoria = $('#edit-id-categoria').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/categoria/alterar_sub')?>",
                dataType : "JSON",
                data : {nome:nome , id_sub_cate:id_cate_sub, id_categoria:id_categoria},
                success: function(data){


                    if(data == true){
                     $('[name="edit-nome-cate-sub"]').val("");
                     $('[name="edit-id-cate-sub"]').val("");
                     $('[name="edit-id-categoria"]').val("");
                    $('.form-group').removeClass('has-error').removeClass('has-success');
                    $('.alert-danger').remove();

                    $('#myModal2').modal('hide');
                    var mensagem = "<strong>Informações Alteradas com sucesso!</strong><br>Suas informações foram Alteradas.";
                    mostraDialogo(mensagem, "success", 2500);

                    listar_categorias_sub();
                }else if(data.messages){
                    $.each(data.messages, function(key, value) {
                                                var element = $('#' + key);

		element.closest('div.form-group').removeClass('has-error').addClass(value.length > 0 ? 'has-error' : 'has-success').find('.alert-danger').remove();
//		$('#error_cadastrar').append('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">X</span></button><strong>'+value+'</strong></div>');
//



                 element.after(value);



                    });

                }

                }
                    });
            return false;
        });




        $('#corpo_sub').on('click','.item_delete',function(){
            var id = $(this).data('id');

            $('#myModal3').modal('show');
            $('[name="id_delete_sub_cate"]').val(id);
        });



           $('#btn_delete_subcategoria').on('click',function(){
            var id_delete = $('#id_delete_sub_cate').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/categoria/excluir_subcategoria')?>",
                dataType : "JSON",
                data : {id:id_delete},
                //


                success: function(data){


                if(data == true){

                     $('[name="id_delete_sub_cate"]').val("");
                    $('#myModal3').modal('hide');
                    var mensagem = "<strong>Existem Documentos cadastrados nesta Categoria!</strong>";
                    mostraDialogo(mensagem, "danger", 4500);
                    console.log(data);
                    listar_categorias_sub();

                }


                    if(data.success === true){
                    $('[name="id_delete_sub_cate"]').val("");
                    $('#myModal3').modal('hide');
                    var mensagem = "<strong>Categoria excluida com sucesso!</strong>";
                    mostraDialogo(mensagem, "danger", 2500);
                    console.log(data);
                    listar_categorias_sub();
                }

                    if(data.messages === true){
                    $('[name="id_delete_sub_cate"]').val("");
                    $('#myModal3').modal('hide');
                    var mensagem = "<strong>Ocorreu um erro ao apagar !</strong>";
                    mostraDialogo(mensagem, "success", 4500);
                    console.log(data);
                    listar_categorias_sub();

                }



                },//beforeSend
            error: function (responseData, textStatus, errorThrown) {
                    $('[name="id_delete_sub_cate"]').val("");
                    $('#myModal3').modal('hide');
                    var mensagem = "<strong>Existem Documentos cadastrados nesta Categoria!</strong>";
                    mostraDialogo(mensagem, "warning", 4500);
                    console.log(data);
                    listar_categorias_sub();
        }
            });
            return false;
        });



            });



            </script>




</div>
