<?php
// Conexão DB
require_once 'conexao.php';
require_once 'sessaoLog.php';

// verifica se o botao foi clicado
if (isset($_POST['btnCadEstac'])) :
// atribui os valores do formulario
    $nomEstac = mysqli_escape_string($conn, $_POST['nomEstac']);
    $qtdVagas = mysqli_escape_string($conn, $_POST['qtdVagas']);
    $valFixo = mysqli_escape_string($conn, $_POST['valFixo']);
    $valAcresc = mysqli_escape_string($conn, $_POST['valAcresc']);
    $cep = mysqli_escape_string($conn, $_POST['cep']);
    $rua = mysqli_escape_string($conn, $_POST['rua']);
    $bairro = mysqli_escape_string($conn, $_POST['bairro']);
    $cidade = mysqli_escape_string($conn, $_POST['cidade']);
    $estado = mysqli_escape_string($conn, $_POST['estado']);
    $num = mysqli_escape_string($conn, $_POST['num']);


    if(!empty($nomEstac) && !empty($qtdVagas) && !empty($valFixo) && !empty($valAcresc) && !empty($cep) && !empty($rua) && !empty($num)):
        // Array de erros
        $erros = array();

        //Sanitize e Validate
        $nomEstac = filter_input(INPUT_POST, 'nomEstac', FILTER_SANITIZE_SPECIAL_CHARS);

        // verifica se ja tem um estacionamento com esse nome cadastrado pela empresa
        $estac = "select '$nomEstac' from estacionamento where idEmpresa = '$id';";
        $query = mysqli_query($conn, $estac);
        if(mysqli_num_rows($query)>0):
            $erros[] = "Este nome já está sendo utilizado.";
        endif;

        $qtdVagas = filter_input(INPUT_POST, 'qtdVagas', FILTER_SANITIZE_NUMBER_INT);
        if (!filter_var($qtdVagas, FILTER_VALIDATE_INT)) :
            $erros[] = "Quantidade de vagas precisa ser inteiro";
        endif;

        $valFixo = filter_input(INPUT_POST, 'valFixo', FILTER_SANITIZE_NUMBER_FLOAT);
        if (!filter_var($valFixo, FILTER_VALIDATE_FLOAT)) :
            $erros[] = "Valor fixo deve ser float";
        endif;

        $valAcresc = filter_input(INPUT_POST, 'valAcresc', FILTER_SANITIZE_NUMBER_FLOAT);
        if (!filter_var($valAcresc, FILTER_VALIDATE_FLOAT)) :
            $erros[] = "Acréscimo/hora deve ser float";
        endif;

        $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);

        $num = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_NUMBER_INT);
        if (!filter_var($num, FILTER_VALIDATE_INT)) :
            $erros[] = "Número deve conter apenas numeros";
        endif;

        $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
        $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
        $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);


        // exibindo mensagens de erro
        if (!empty($erros)) :
            header('Location: ../cadEstac.php');
            foreach ($erros as $erro) :
                echo $erro;
            endforeach;

        else :
            // código SQL para inserir os dados
            // codigo de cadastro do estacionamento
            $sql = "INSERT INTO estacionamento (nomEstac, qtdVagas, valFixo, valAcresc, idEmpresa) VALUES ('$nomEstac', '$qtdVagas', '$valFixo', '$valAcresc', '$id');";
            // verifica se o insert retorna true
            if(mysqli_query($conn, $sql)):
                // pega o id do estacionamento cadastrado
                $sqlIdEmp = "SELECT idEstac from Estacionamento WHERE idEmpresa = '$id');";
                $query = mysqli_query($conn, $sqlIdEmp);
                $resultQuery = mysqli_fetch_assoc($query);
                $sqlIdEmp = $resultQuery['idEstac'] + 0;

                // cadastro do endereço
                $sqlCadEnd = "INSERT INTO endereco (dscLogradouro, numero, cep, idEstac) VALUES ('$rua', '$num', '$cep', '$sqlIdEmp')";

                // verifica se o cadastro foi realizado com sucesso
                if(mysqli_query($conn, $sqlCadEnd)):
                    header('Location: ../listEstac.php');
                    echo "Estacionamento e endereço cadastrados com sucesso!";
                else:
                    header('Location: ../cadEstac.php');
                    echo "Erro ao cadastrar endereço";
                endif;
            else:
                header('Location: ../cadEstac.php');
                echo "Erro ao cadastrar estacionamento";
            endif;
        endif;
    else:
        header('Location: ../cadEstac.php');
        echo "Preencha todos os campos";
    endif;
endif;