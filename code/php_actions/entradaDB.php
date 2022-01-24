<?php 
// Sessão
session_start();
// Conexão DB
include_once './conexao.php';

$idEstac = $_SESSION['dadosEstac']['idEstac'];

// verifica se o botao foi clicado
if(isset($_POST['btnCadCarro'])):
    
    // atribui os valores do formulario
    $nomCliente = mysqli_escape_string($conn, $_POST['nomCliente']);
    $cpfCliente = mysqli_escape_string($conn, $_POST['cpfCliente']);
    $placaCarro = mysqli_escape_string($conn, $_POST['placaCarro']);
    $vagaCarro = mysqli_escape_string($conn, $_POST['vagaCarro']);

    
    if(!empty($nomCliente) && !empty($cpfCliente) && !empty($placaCarro) && !empty($vagaCarro)):

        // Array de erros
        $erros = array();
        
        //Sanitize e Validate
        $nomCliente = filter_input(INPUT_POST, 'nomCliente', FILTER_SANITIZE_SPECIAL_CHARS);

        $cpfCliente = filter_input(INPUT_POST, 'cpfCliente', FILTER_SANITIZE_SPECIAL_CHARS);

        $placaCarro = filter_input(INPUT_POST, 'placaCarro', FILTER_SANITIZE_SPECIAL_CHARS);

        $vagaCarro = filter_input(INPUT_POST, 'vagaCarro', FILTER_SANITIZE_NUMBER_INT);
        if (!filter_var($vagaCarro, FILTER_VALIDATE_INT)) :
            $erros[] = "Vaga precisa ser inteiro";
        endif;

        
        $query2 = mysqli_query($conn, "SELECT * FROM vaga where idEstac = '$idEstac'");
        $vagas = mysqli_fetch_array($query2);

        $idVag = $vaga[$vagaCarro];

        //verifica se as vagas sao do estacionamento
        if(in_array($idVag, $vagas)){
            // verifica se a vaga esta desocupada
            $vagaVazia = "SELECT condVaga FROM vaga WHERE codVaga = $idVag";
            $query = mysqli_query($conn, $vagaVazia);
            $result = mysqli_fetch_assoc($query);
        if($result):
            $erros[] = "vaga ocupada";
        endif;
        }

        // exibindo mensagens de erro
        if (!empty($erros)) :
            header('Location: ../entrada.php');
        else :
            // código SQL para inserir os dados
            
            // faz a inserção dos dados
            $sql = "INSERT INTO aloca (idVaga, hrEntrada, dscPlaca, nomCliente, cpfCliente) VALUES ('$idVag', CURRENT_TIMESTAMP, '$placaCarro', '$nomCliente', '$cpfCliente');";
            $sql2 = "UPDATE vaga SET condVaga = 1 WHERE idVaga = '$idVag' and idEstac = '$idEstac';";

            $teste = mysqli_query($conn, $sql);
            $teste2 = mysqli_query($conn, $sql2);

            if($teste && $teste2):
                var_dump($teste);
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
