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
        <?php include 'headerDeslog.html' ?>

        <div class="container" style="margin: auto; width: 60%;">
            <div class="row">
                <form method="post" class="col s12 m6" style="margin-left: 50%; margin-right:50%; transform: translate(-50%, 0%);">
                    <h2 style="text-align: center;">Cadastro da Empresa</h2>
                    <div class="row center-align">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="nomeEmpresa" class="validate">
                                    <label for="text">Nome da Empresa</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" id="cpfcnpj" class="validate">
                                    <label for="text">CPF ou CNPJ</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" id="numEmpresa" class="validate">
                                    <label for="text">Telefone</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="email" id="email" class="validate">
                                    <label for="email">Email</label>
                                    <span class="helper-text left-align" data-error="Email inválido" data-success="">Digite um email válido</span>
                                </div>
                                <div class="input-field col s12">
                                    <input type="password" id="password" class="validate">
                                    <label for="password">Senha</label>
                                    <span class="helper-text left-align" data-error="Senha inválida" data-success="">Mínimo 8 caracteres</span>
                                </div>
                            </div>
                            <a href="cadEstac.php" class="waves-effect waves-light btn">Continuar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="main.js"></script>
    </body>
  </html>