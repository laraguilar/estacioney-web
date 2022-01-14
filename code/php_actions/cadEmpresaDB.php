<?php 
// Sessão
session_start();
// Conexão DB
require_once './conexao.php';

if(isset($_POST['btnCadEmpresa'])):

    //var_dump($_POST);
    // atribui os valores do formulario
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $nomEmpresa = mysqli_escape_string($conn, $_POST['nomEmpresa']);
    $dscCpfCnpj = mysqli_escape_string($conn, $_POST['dscCpfCnpj']);
    $telefone = mysqli_escape_string($conn, $_POST['Telefone']);
    $email = mysqli_escape_string($conn, $_POST['Email']);
    $senha = mysqli_escape_string($conn, $_POST['Senha']);
    
    
    $erros = array();
    
    //Sanitize e Validate

    $nomEmpresa = filter_input(INPUT_POST, 'nomEmpresa', FILTER_SANITIZE_SPECIAL_CHARS);

    $dscCpfCnpj = filter_input(INPUT_POST, 'dscCpfCnpj', FILTER_SANITIZE_SPECIAL_CHARS);

    $email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
        $erros[] = "Email inválido";   
    endif;

    $telefone = filter_input(INPUT_POST, 'Telefone', FILTER_SANITIZE_SPECIAL_CHARS);

    $senha = filter_input(INPUT_POST, 'Senha', FILTER_SANITIZE_SPECIAL_CHARS);


    // exibindo mensagens de erro
    if (!empty($erros)):
        foreach($erros as $erro):
            echo $erro;
        endforeach;
    else:
        echo "Seus dados estao corretos.";
    endif;

    // criptografia de senha
    $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);

    // código SQL para inserir os dados
    $sql = "INSERT INTO empresa (nomEmpresa, dscCpfCnpj, Email, senha, Telefone) VALUES ('$nomEmpresa', '$dscCpfCnpj', '$email', '$senhaCrip', '$telefone')";

    if(mysqli_query($conn, $sql)):
        header('Location: ../index.php');
        $_SESSION['mensagem'] = "Empresa cadastrada com sucesso!";
    else:
        header('Location: ../cadEmpresa.php');
        $_SESSION['mensagem'] = "Erro ao cadastrar empresa";
    endif;
    
    

endif;