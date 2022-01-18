<?php 
// Sessão
session_start();
// Conexão DB
include_once './conexao.php';

// verifica se o botao foi clicado
if(isset($_POST['btnCadPessoa'])):
    
    // atribui os valores do formulario
    $cpfCliente = mysqli_escape_string($conn, $_POST['cpfCliente']);
    $placaCarro = mysqli_escape_string($conn, $_POST['placaCarro']);
    $vagaCarro = mysqli_escape_string($conn, $_POST['vagaCarro']);

    
    if(!empty($cpfCliente) && !empty($placaCarro) && !empty($vagaCarro)):

        // Array de erros
        $erros = array();
        
        //Sanitize e Validate

        $cpfCliente = filter_input(INPUT_POST, 'nomCliente', FILTER_SANITIZE_SPECIAL_CHARS);

        $placaCarro = filter_input(INPUT_POST, 'cpfCliente', FILTER_SANITIZE_SPECIAL_CHARS);

        $vagaCarro = filter_input(INPUT_POST, 'vagaCarro', FILTER_SANITIZE_NUMBER_INT);
        if (!filter_var($vagaCarro, FILTER_VALIDATE_INT)) :
            $erros[] = "Vaga precisa ser inteiro";
        endif;


        // exibindo mensagens de erro
        if (!empty($erros)) :
            header('Location: ../cadPessoa.php');
        else :
            // código SQL para inserir os dados
            
            // verifica se o cpf existe no BD
            $cpfs = "SELECT cpfPessoa FROM pessoa WHERE cpfPessoa = $cpfCliente;";
            $query = mysqli_query($conn, $cpfs);
            if(!(mysqli_num_rows($query))>0):
                $erros[] = "Este cpf não está cadastrado";
            endif;

            

            $idPessoa = "SELECT idPessoa from Pessoa WHERE cpfPessoa = $cpfCliente;";
            $query = mysqli_query($conn, $idPessoa);
            $idPessoa = mysqli_fetch_assoc($query);

            $sql = "INSERT INTO aloca (idPessoa, codVaga, hrEntrada, dscPlaca) VALUES ($idPessoa, $vagaCarro, CURRENT_TIMESTAMP, '$placaCarro');";

            if(mysqli_query($conn, $sql)):
                header('Location: ../home.php'); // aqui deve ir para a tela de entrada
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
