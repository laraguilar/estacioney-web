<?php include_once './conexao.php' ?>

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
    <?php include 'headerDeslog.html' ?>
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($dados['cadEstac'])) {
        $empty_input = false;
        

        $dados = array_map('trim', $dados);

        if (in_array("", $dados)) {
            $empty_input = true;
        } elseif (!filter_var($dados['qtdVagas'], FILTER_VALIDATE_INT)) { // validação do email
            $empty_input = true;
            echo "<p style='color: red;'>Erro: Quantidade de vagas com valor inválido.</p>";
        } elseif (!filter_var($dados['valFixo'], FILTER_VALIDATE_FLOAT)) { // validação do email
            $empty_input = true;
            echo "<p style='color: red;'>Erro: Valor fixo inválido.</p>";
        } elseif (!filter_var($dados['valAcresc'], FILTER_VALIDATE_FLOAT)) { // validação do email
            $empty_input = true;
            echo "<p style='color: red;'>Erro: Acréscimo/hora inválido.</p>";
        }


        if (!$empty_input) {
            $query_estacionamento = "INSERT INTO estacionamento (nomEstac, qtdVagas, valFixo, valAcresc) values (:nomEstac,:qtdVagas,
                    :valFixo, :valAcresc) ";

            $cad_estacionamento = $conn->prepare($query_estacionamento);
            $cad_estacionamento->bindParam(':nomEstac', $dados['nomEstac'], PDO::PARAM_STR);
            $cad_estacionamento->bindParam(':qtdVagas', $dados['qtdVagas'], PDO::PARAM_INT);
            $cad_estacionamento->bindParam(':valFixo', $dados['valFixo'], PDO::PARAM_STR);
            $cad_estacionamento->bindParam(':valAcresc', $dados['valAcresc'], PDO::PARAM_STR);
            $cad_estacionamento->execute();
        }
    }
    ?>

    <div class="container" style="margin: auto; width: 60%;">
        <div class="row">
            <form name="cad-Estac" method="POST" action="home.php" class="col s6" style="margin-left: 50%; margin-right:50%; transform: translate(-50%, 0%);">
                <h2 style="text-align: center;">Cadastro do Estacionamento</h2>
                <div class="row center-align">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="nomEstac" type="text" id="nomeEstac" class="validate">
                                <label for="text">Nome do Estacionamento</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="qtdVagas" type="number" min="1" id="qtdVagas" class="validate">
                                <label for="text">Quantidade de vagas</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="valFixo" type="number" min="0.1" step="any" id="valFixo" class="validate">
                                <label for="text">Valor Fixo</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="valAcresc" type="number" min="0.1" step="any" id="valAcresc" class="validate">
                                <label for="text">Acréscimo/hora</label>
                            </div>
                            <input type="submit" name="cadEstac" value="Cadastrar" class="waves-effect waves-light btn">
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
</body>

</html>