<?php
// sessao 
require_once 'php_actions/sessaoLog.php';
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
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="container" style="margin: auto; width: 60%;">
        <div class="row">
            <form action="php_actions/cadEstacDB.php" method="POST" class="col s6" style="margin-left: 50%; margin-right:50%; transform: translate(-50%, 0%);">
                <h3 style="text-align: center;">Cadastro do Estacionamento</h3>
                <div class="row center-align">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="nomEstac" type="text" id="nomeEstac" class="validate" autofocus>
                                <label for="text">Nome do Estacionamento</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="qtdVagas" type="number" step="1" min="1" id="qtdVagas" class="validate">
                                <label for="text">Quantidade de vagas</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="valFixo" type="number" min="0,1" step="0.5" id="valFixo" class="validate">
                                <label for="text">Valor Fixo</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="valAcresc" type="number" min="0" step="0.5" id="valAcresc" class="validate">
                                <label for="text">Acréscimo/hora</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="cep" type="number" id="cep" class="validate">
                                <label for="text">CEP</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="rua" type="text" id="rua" class="validate">
                                <label for="text">Rua</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="num" type="number" id="num" class="validate">
                                <label for="text">Número</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="bairro" type="text" id="bairro" class="validate">
                                <label for="text">Bairro</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="cidade" type="text" id="cidade" class="validate">
                                <label for="text">Cidade</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="estado" type="text" id="estado" class="validate">
                                <label for="text">Estado</label>
                            </div>
                            <button type="submit" name="btnCadEstac" class="waves-effect waves-light btn indigo darken-2">Cadastrar</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
</body>

</html>