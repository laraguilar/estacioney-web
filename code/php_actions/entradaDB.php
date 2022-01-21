<?php 
// Sessão
session_start();
// Conexão DB
include_once './conexao.php';

// verifica se o botao foi clicado
if(isset($_POST['btnCadCarro'])):
    
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

        // verifica se o cpf existe no BD
        $cpfs = "SELECT cpfPessoa FROM pessoa WHERE cpfPessoa = $cpfCliente;";
        $query = mysqli_query($conn, $cpfs);
        if(!(mysqli_num_rows($query))>0):
            $erros[] = "Este cpf não está cadastrado";
        endif;


        //verifica se as vagas sao do estacionamento
        if(in_array($vagaCarro, $vagas)){
            // verifica se a vaga esta desocupada
            $vagaVazia = "SELECT condVaga FROM vaga WHERE codVaga = $vagaCarro";
            $query = mysqli_query($conn, $vagaVazia);
        if(mysqli_fetch_assoc($query)):
            $erros[] = "vaga ocupada";
        endif;
        }


        // exibindo mensagens de erro
        if (!empty($erros)) :
            header('Location: ../entrada.php');
        else :
            // código SQL para inserir os dados

            // pega o id da pessoa
            $idPessoa = "SELECT idPessoa from Pessoa WHERE cpfPessoa = $cpfCliente;";
            $query = mysqli_query($conn, $idPessoa);
            $idPessoa = mysqli_fetch_assoc($query);

            // faz a inserção dos dados
            $sql = "INSERT INTO aloca (idPessoa, idVaga, hrEntrada, dscPlaca) VALUES ($idPessoa, '$vagaCarro', CURRENT_TIMESTAMP, '$placaCarro'; 
                UPDATE vaga SET condVaga = 1 WHERE codVaga = '$vagaCarro' and idEstac = '$idEstacio';";

            if(mysqli_query($conn, $sql)):
                header('Location: ../home.php'); // aqui deve ir para a tela home
                //$_SESSION['mensagem'] = "";
            else:
                header('Location: ../entrada.php');
                //$_SESSION['mensagem'] = "Erro ao cadastrar cliente.";
            endif;
        endif;
    else:
        header('Location: ../entrada.php');
        $_SESSION['mensagem'] = "Preencha todos os campos";
    endif;

endif;
