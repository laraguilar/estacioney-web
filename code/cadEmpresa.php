<?php 
    include_once "./conexao.php";

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
    <?php include 'headerDeslog.html' ?>
    <div class="container" style="margin: auto; width: 60%;">
        <div class="row">
            <?php
            // RECEBE OS DADOS DO FORMULÁRIO
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            // verifica se o usuário clicou no botão
            if (!empty($dados['cadEmpresa'])) {
                $empty_input = false;

                // retira os espaços em branco 
                $dados = array_map('trim', $dados);
                if (in_array("", $dados)) {
                    $empty_input = true;
                    echo "<p>usuario nao cadastrado</p>";
                } elseif (!filter_var($dados['Email'], FILTER_VALIDATE_EMAIL)) { // validação do email
                    $empty_input = true;
                    echo "<p style='color: red;'>Erro: Necessário preencher com email válido.</p>";
                }
                
                $dados['Senha'] = password_hash(($dados['Senha']), PASSWORD_DEFAULT);

                if (!$empty($dados['cadEmpresa'])) {
                    // o query armazena a String contendo o código mySql para inserir os dados no banco
                    $query_empresa = "INSERT INTO empresa (nomEmpresa, dscCpfCnpj, Email, Senha, Telefone) VALUES (:nomEmpresa, :dscCpfCnpj, :Email, :Senha, :Telefone)";

                    $cad_empresa = $conn->prepare($query_empresa); //prepara a consulta sql e retorna pra variável um identificador de instrução

                    /*
                    $cad_empresa->bindParam(':nomEmpresa', $dados['nomEmpresa'], PDO::PARAM_STR);
                    $cad_empresa->bindParam(':dscCpfCnpj', $dados['dscCpfCnpj'], PDO::PARAM_STR);
                    $cad_empresa->bindParam(':Email', $dados['Email'], PDO::PARAM_STR);
                    $cad_empresa->bindParam(':Telefone', $dados['Telefone'], PDO::PARAM_STR_CHAR);
                    */
                    $cad_empresa->execute();

                    /*if($cad_empresa->rowCount()){
                        echo "<p>Usuário cadastrado</p>";
                    } else{
                        echo "<p style='color: red;'>Usuário NÃO cadastrado</p>";
                    }*/
                }
            }
            ?>
            <form method="post" action="#" class="col s12 m6" name="cadEmpresa" style="margin-left: 50%; margin-right:50%; transform: translate(-50%, 0%);">
                <h2 style="text-align: center;">Cadastro da Empresa</h2>
                <div class="row center-align">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="nomEmpresa" id="nomEmpresa" class="validate" value="<?php if(isset($dados['nomEmpresa'])){echo $dados['nomEmpresa'];} ?>">
                                <label for="text">Nome da Empresa</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="dscCpfCnpj" id="dsccpfcnpj" class="validate"  value="<?php if(isset($dados['dscCpfCnpj'])){echo $dados['dscCpfCnpj'];} ?>">
                                <label for="text">CPF ou CNPJ</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="Telefone" id="telefone" class="validate" value="<?php if(isset($dados['Telefone'])){echo $dados['Telefone'];} ?>">
                                <label for="text">Telefone</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="email" name="Email" id="email" class="validate" value="<?php if(isset($dados['Email'])){echo $dados['Email'];} ?>">
                                <label for="email">Email</label>
                                <span class="helper-text left-align" data-error="Email inválido" data-success="">Digite um email válido</span>
                            </div>
                            <div class="input-field col s12">
                                <input type="password" name="Senha" id="password" class="validate">
                                <label for="password">Senha</label>
                                <span class="helper-text left-align" data-error="Senha inválida" data-success="">Mínimo 8 caracteres</span>
                            </div>
                        </div>
                        <input type="submit" name="btnCadEmpresa" class="waves-effect waves-light btn" value="Continuar">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
</body>

</html>