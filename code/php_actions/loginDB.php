<?php 
// Sessão
session_start();
// Conexão DB
require_once './conexao.php';

if(isset($_POST['btnEntrar'])):
    $email = mysqli_escape_string($conn, $_POST['Email']);
    $senha = mysqli_escape_string($conn, $_POST['Senha']);

    if (empty($email) or empty($senha)):
        header('Location: ../index.php');
        $_SESSION['mensagem'] = "Campo Email/Senha precisa ser preenchido";
    else:
        $sql = "SELECT email FROM empresa WHERE Email = '$email'";
        $resultado = mysqli_query($conn, $sql);



        // verifica se o email esta cadastrado
        if(mysqli_num_rows($resultado) > 0):
            
            // verifica senha criptografada
            $sqlSenha = "SELECT senha FROM empresa WHERE Email = '$email'";
            $query = mysqli_query($conn, $sqlSenha);
            $resultQuery = mysqli_fetch_assoc($query);
            $senhaCripto = $resultQuery['senha'];

            if(password_verify($senha, $senhaCripto)): // se a senha esta correta, roda o codigo
                $sql = "SELECT * FROM empresa WHERE Email = '$email'";
                $resultado = mysqli_query($conn, $sql);

                if(mysqli_num_rows($resultado) == 1):
                    $dados = mysqli_fetch_array($resultado);
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['idEmpresa'];
                    header('Location: ../home.php');
                else:
                    header('Location: ../index.php');
                    $_SESSION['mensagem'] = "Usuário e Senha não conferem";
                endif;
            else:
                $_SESSION['mensagem'] = "Usuário não cadastrado no sistema";
                header('Location: ../index.php');
            endif;
        endif;
    endif;
endif;