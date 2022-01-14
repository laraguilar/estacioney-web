<?php
// Sessão
session_start();
// Conexão DB
require_once './conexao.php';

// verifica se o botao foi clicado
if (isset($_POST['btnCadEmpresa'])) :

    // atribui os valores do formulario
    $nomEmpresa = mysqli_escape_string($conn, $_POST['nomEmpresa']);
    $dscCpfCnpj = mysqli_escape_string($conn, $_POST['dscCpfCnpj']);
    $telefone = mysqli_escape_string($conn, $_POST['Telefone']);
    $email = mysqli_escape_string($conn, $_POST['Email']);
    $senha = mysqli_escape_string($conn, $_POST['Senha']);


    if(!empty($nomEmpresa) && !empty($dscCpfCnpj) && !empty($telefone) && !empty($email) && !empty($senha)):

        // Array de erros
        $erros = array();

        //Sanitize e Validate

        $nomEmpresa = filter_input(INPUT_POST, 'nomEmpresa', FILTER_SANITIZE_SPECIAL_CHARS);

        $dscCpfCnpj = filter_input(INPUT_POST, 'dscCpfCnpj', FILTER_SANITIZE_SPECIAL_CHARS);

        // verifica se o cpf ou cnpj ja esta cadastrado
        $validaCpfCnpj = mysqli_query($conn, "select * from empresa where dscCpfCnpj = $dscCpfCnpj;");
        if(mysqli_num_rows($validaCpfCnpj) > 0):
            $erros[] = "CPF/CNPJ já cadastrado";
        endif;


        $email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
            $erros[] = "Email inválido";
        endif;
        
        // verifica se o email ja esta cadastrado
        $validaEmail = mysqli_query($conn, "select * from empresa where Email = $email;");
        if(mysqli_num_rows($validaEmail) > 0):
            $erros[] = "Email já cadastrado";
        endif;

        $telefone = filter_input(INPUT_POST, 'Telefone', FILTER_SANITIZE_SPECIAL_CHARS);

        $senha = filter_input(INPUT_POST, 'Senha', FILTER_SANITIZE_SPECIAL_CHARS);

        // exibindo mensagens de erro
        if (!empty($erros)) :
            header('Location: ../cadEmpresa.php');
            foreach ($erros as $erro):
                $_SESSION['mensagem'] = $erro;
            endforeach;
        else :
            // criptografia de senha
            $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);

            // código SQL para inserir os dados
            $sql = "INSERT INTO empresa (nomEmpresa, dscCpfCnpj, Email, senha, Telefone) VALUES ('$nomEmpresa', '$dscCpfCnpj', '$email', '$senhaCrip', '$telefone')";

            if (mysqli_query($conn, $sql)) :
                header('Location: ../index.php');
                $_SESSION['mensagem'] = "Empresa cadastrada com sucesso!";
            else :
                header('Location: ../cadEmpresa.php');
                $_SESSION['mensagem'] = "Erro ao cadastrar empresa";
            endif;
        endif;
    else:
        header('Location: ../cadEmpresa.php');
        $_SESSION['mensagem'] = "Preencha todos os campos";
    endif;
endif;
