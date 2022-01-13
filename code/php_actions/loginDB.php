<?php 
// Sessão
session_start();
// Conexão DB
require_once './conexao.php';

if(isset($_POST['btnEntrar'])):
    $email = mysqli_escape_string($conn, $_POST['Email']);
    $senha = mysqli_escape_string($conn, $_POST['Senha']);

    if (empty ($email) or empty($senha)):
        $_SESSION['mensagem'] = "Campo Email/Senha precisa ser preenchido";
    else:
        $sql = "SELECT email FROM empresa WHERE Email = '$email'";
        $resultado = mysqli_query($conn, $sql);

        if(mysqli_num_rows($resultado) > 0):
            $sql = "SELECT * FROM empresa WHERE Email = '$email' AND Senha = '$senha'";

            $resultado = mysqli_query($conn, $sql);

            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['idEmpresa'];

                $_SESSION['mensagem'] = "Login efetuado com sucesso!";
                header('Location: ../versefuncionou.php');
                
            else:
                $_SESSION['mensagem'] = "Usuario e Senha não conferem";
                header('Location: ../index.php');
            endif;

        else:
            $_SESSION['mensagem'] = "Usuario não existe no sistema!";
            header('Location: ../index.php');
        endif;
    endif;
endif;