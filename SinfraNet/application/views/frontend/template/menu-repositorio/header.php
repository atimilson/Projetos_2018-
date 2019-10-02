


<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>SINFRANET</h3>
            <strong>SN</strong>
        </div>

        <ul class="list-unstyled components" id="corpo_lista">

            <li class="">
                <a href="<?php echo base_url('home') ?>">
                    <strong>INICIO</strong>
                </a>
            </li>

            <li>

                <a href="<?php echo base_url('repositorios') ?>">
                    <strong>Categorias</strong> (todos)
                </a>
            </li>

            <?php foreach ($categorias_todos as $categoria){ ?>
            <li>
                <div class="btn-group dropright" style="width: 100%" id="categoria-<?= $categoria->id ?>">
                   <a style="width: 100%" href="<?= base_url("repositorios/categorias/").$categoria->id."/".$categoria->nome ?>">
                    <?= $categoria->nome ?>
                    </a>
                    <a href="#" data-subcategoria="<?= $categoria->id ?>" id="oi-<?= $categoria->id ?>" class="dropdown-toggle dropdown-toggle-split sub" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropright</span></a>
                    <div class="dropdown-menu" id="<?= $categoria->id ?>">
                    
                    </div>
                </div>
            </li>
            
            <script>
            $(document).ready(function (){
            
           $('#categoria-<?= $categoria->id ?>').on('mouseover','.sub',function(){
                 
            var id = $(this).data('subcategoria');
           
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('repositorio_home/categoria_subcategoria')?>",
                dataType : "JSON",
                data : {id:id },
                beforeSend: function () {
                //Aqui adicionas o loader
                        $("#<?= $categoria->id ?>").html("<img src='<?= base_url('assets/backend/imagens/ajax-loader.gif') ?>' width='100'>");
                        },  
                success: function(data){
                    $("#<?= $categoria->id ?>").html("");
                    
                       var html = '';
                            
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<a href="<?= base_url("repositorio_home/listar_cat_subcat/").$categoria->id ?>/'+data[i].id_subcategoria+'" class="color-sub" >'+ data[i].nome_sub +'</a>';
                               
		            }
                            
                            $('#<?= $categoria->id ?>').append(html);
                           
                          $('#oi-<?= $categoria->id ?>').dropdown(); 
                            
		            
                            
               
                           
               
               
               
                }
                
                
                
                
                
                
                
                    }); 
                    
                    
            return false;
        });
        
        });
           
               
               
               
               
            
            
            </script>


            <?php } ?>
        </ul>


    </nav>

    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light container-alteraçao">

            <div class="container-fluid ">

                <button type="button" id="sidebarCollapse" class="btn btn-info cor-botao">
                    <i class="fas fa-align-justify"></i>
                </button>
                <div class="logo-torto" style="max-height: 75px;">
                    <img src="<?php echo base_url('assets/frontend/imagens/') ?>layout_set_logo.png" height="73">
                </div>

            </div>
        </nav>
