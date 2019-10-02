<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>


<html lang="pt-br">
    <head>
        <title>Meu Projeto</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link rel="stylesheet" href="css/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

        <script>
            $(document).ready(function () {
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('#modal1').modal();

                $('.slider').slider({});
            });

            $(".button-collapse").sideNav();
        </script>
        <script>
            function msg(texto) {
                Materialize.toast(texto, 4000);
            }
        </script>
    </head>
    <body>
        <header >
            <div class="container">
                <div class="row">
                    <nav id="cabecalho">
                        <div class="nav-wrapper">
                            <a href="" class="brand-logo">Meu Projeto</a>
                            <ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li><a href="index.php">Home</a></li>
                                <li><a class="waves-effect waves-light btn" href="#modal1">Login</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <main>
            <section>
                <div id="modal1" class="modal">
                    <div class="row">
                        <div style="text-align: center" class="col s12">
                            <br>
                            <img src="img_avatar2.png" alt="Avatar" class="avatar responsive-img">
                        </div>
                    </div>

                    <div class="modal-content">
                        <form action="valida.php" method="POST">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="login" name="login" type="text" class="validate">
                                    <label for="login">Usuário</label>
                                </div>
                                <div style="" class="input-field col s6">
                                    <input id="senha" name="senha" type="password" class="validate">
                                    <label for="senha">Senha</label>
                                </div>
                            </div>
                            <div class="modal-footer row" style="text-align: center">
                                <div class="col s6">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Entrar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                                <div class="col s6">
                                    <a href="index.php" class="modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
                                    <br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <?php
            
            
            if (isset($_SESSION["danger"])) {

                echo $_SESSION["danger"];
            }
            
            
            unset($_SESSION["danger"]);
            
            ?>

            <section>
                <div class="slider container-fluid" data-indicators="true">
                    <ul class="slides carousel-slider center">
                        <li class="carousel-item blue white-text">   
                            <div class="row"></div>

                            <h2 class="col s12">
                                Olá mundo!
                            </h2>

                        </li>
                        <li style="background-color: #f8f8f8;" class="carousel-item white-text center">
                            <div class="row">
                                <div class="col s6">
                                    <h2 class="blue-text text-darken-2" style="">Um sistema pensado pra você!.</h2>

                                    <p class="blue-text text-darken-2" class="white-text ">This is your third panel</p>

                                    <a class="btn btn-floating btn-large pulse"><i class="small material-icons ">trending_flat</i></a><br>

                                </div>
                                <div class="col s6"> 
                                    <img src="office.jpg">
                                </div>


                            </div>



                        </li>
                    </ul>       
                </div>
            </section>
        </main>
    </body>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#modal1">Login</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2017 Copyright
                <a class="grey-text text-lighten-4 right" href="#!">Mais Links</a>
            </div>
        </div>
    </footer>

</html>