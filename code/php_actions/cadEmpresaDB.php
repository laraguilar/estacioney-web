<?php 
// Sessão
session_start();
// Conexão DB
require_once './conexao.php';

if(isset($_POST['btnCadEmpresa'])):
    // atribui os valores do formulario
    $nomEmpresa = mysqli_escape_string($conn, $_POST['nomEmpresa']);
    $dscCpfCnpj = mysqli_escape_string($conn, $_POST['dscCpfCnpj']);
    $telefone = mysqli_escape_string($conn, $_POST['Telefone']);
    $email = mysqli_escape_string($conn, $_POST['Email']);
    $senha = mysqli_escape_string($conn, $_POST['Senha']);

    // código SQL para inserir os dados
    $sql = "INSERT INTO empresa (nomEmpresa, dscCpfCnpj, Email, senha, Telefone) VALUES ('$nomEmpresa', '$dscCpfCnpj', '$email', '$senha', '$telefone')";

    if(mysqli_query($conn, $sql)):
        $_SESSION['mensagem'] = "Empresa cadastrada com sucesso!";
        header('Location: ../cadEstac.php');
    else:
        header('Location: ../cadEmpresa.php');
        $_SESSION['mensagem'] = "Erro ao cadastrar empresa";
    endif;

endif;