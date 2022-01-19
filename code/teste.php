<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Estacioney</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
        <link rel="shortcut icon" type="imagex/png" href="imagem/logo_estacioney50px.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper indigo darken-4">
                    <a href="teste.php" class="brand-logo" style="margin-left:2%;   "><img src="imagem/logo_estacioney50px.png" alt="" width="35" height="35"></a>
                    <a href="#" data-target="mobile-navbar" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul id="navbar-items" class="right hide-on-med-and-down">
                        <li><a href="sass.html">Início</a></li>
                        <li><a href="badges.html">Cadastro</a></li>
                        <li><a href="sobrenos.php">Sobre Nós</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Menu Mobile -->
        <ul id="mobile-navbar" class="sidenav">
            <li><a href="#">Login</a></li>
            <li><a href="#">Cadastro</a></li>
            <li><a href="#sobrenos.php">Sobre Nós</a></li>
        </ul>

        <div class="container" style="margin: auto; width: 60%;">
            <div class="row">
                <form action="" class="col s6" style="margin-left: 50%; margin-right:50%; transform: translate(-50%, 0%);">
                    <h2>Login</h2>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="email" id="email" class="validate">
                                    <label for="email">Email</label>
                                    <span class="helper-text" data-error="wrong" data-success="right">Digite o email cadastrado</span>
                                </div>
                                <div class="input-field col s12">
                                    <input type="password" id="password" class="validate">
                                    <label for="password">Senha</label>
                                </div>
                            </div>
                            <a class="waves-effect waves-light btn">Entrar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="main.js"></script>
    </body>
  </html>