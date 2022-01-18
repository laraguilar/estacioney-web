<?php 
// Sessão
session_start();
// Conexão DB
include_once './conexao.php';

// verifica se o botao foi clicado
if(isset($_POST['btnCadPessoa'])):
    
    // atribui os valores do formulario
    $nomCliente = mysqli_escape_string($conn, $_POST['nomCliente']);
    $cpfCliente = mysqli_escape_string($conn, $_POST['cpfCliente']);
    $datNasc = mysqli_escape_string($conn, $_POST['datNasc']);
    $sexo = mysqli_escape_string($conn, $_POST['sexo']);
    
    if(!empty($nomCliente) && !empty($cpfCliente) && !empty($datNasc) && !empty($sexo)):

        // Array de erros
        $erros = array();
        
        //Sanitize e Validate

        $nomCliente = filter_input(INPUT_POST, 'nomCliente', FILTER_SANITIZE_SPECIAL_CHARS);

        $cpfCliente = filter_input(INPUT_POST, 'cpfCliente', FILTER_SANITIZE_SPECIAL_CHARS);

        // verifica se o cpf existe no BD
        $cpfs = "SELECT cpfPessoa FROM pessoa WHERE cpfPessoa = $cpfCliente;";
        $query = mysqli_query($conn, $cpfs);
        if((mysqli_num_rows($query))>0):
            $erros[] = "Este cpf já está cadastrado";
        endif;

        // exibindo mensagens de erro
        if (!empty($erros)) :
            header('Location: ../cadPessoa.php');
        else :
            // código SQL para inserir os dados

            

            $sql = "INSERT INTO pessoa (nomPessoa, cpfPessoa, datNasc, sexPessoa) VALUES ('$nomCliente', '$cpfCliente', '$datNasc', '$sexo')";

            if(mysqli_query($conn, $sql)):
                header('Location: ../entrada.php'); // aqui deve ir para a tela de entrada
                //$_SESSION['mensagem'] = "Cliente cadastrado com sucesso!";
            else:
                header('Location: ../cadPessoa.php');
                //$_SESSION['mensagem'] = "Erro ao cadastrar cliente.";
            endif;
        endif;
    else:
        header('Location: ../cadPessoa.php');
        $_SESSION['mensagem'] = "Preencha todos os campos";
    endif;

endif;
