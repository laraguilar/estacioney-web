<?php
/// conexão BD
include_once 'php_actions/conexao.php';
// sessao
require_once 'php_actions/sessaoEstac.php';
//header
include_once 'includes/headerLog.php';
?>
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
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="container" style="margin: auto; width: 60%;">
        <div class="row">
            <form action="php_actions/entradaDB.php" method="POST" class="col s12 m6" name="cadEmpresa" style="margin-left: 50%; margin-right:50%; transform: translate(-50%, 0%);">
                <h3 style="text-align: center;">Entrada</h3>
                <div class="row center-align">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="cpfCliente" id="cpfCliente" class="validate">
                                <label for="text">CPF</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="placaCarro" id="placaCarro" class="validate">
                                <label for="text">Placa do Carro</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="number" name="vagaCarro" id="vagaCarro" class="validate">
                                <label for="number">Vaga</label>
                            </div>
                        </div>
                        <button href = "home.php" type="submit" name="btnCadCarro" class="waves-effect waves-light btn indigo darken-2">Continuar</button>
                        <p style="text-decoration: none;"> 
                        <a href="cadPessoa.php">Cadastrar Cliente</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
</body>

</html>