<?php
include_once './conexao.php';

    $_SESSION['idVagaSelect'] = $_POST['id'];

    /* atribui os valores do formulario
    $idVaga = $_POST['vaga'];

    echo $idVaga;
    //$idVaga = filter_input(INPUT_POST, 'idVaga', FILTER_SANITIZE_NUMBER_INT);

    // código SQL para editar os dados
    $query = mysqli_query($conn, "select now() as 'agora';");
    $hoje = mysqli_fetch_assoc($query);
    $agora = $hoje['agora'];

    $query2 = mysqli_query($conn, "SELECT hrEntrada FROM aloca WHERE idVaga = '$idVaga'");
    $hrEntrada = mysqli_fetch_assoc($query2);
    var_dump($hrEntrada);

    //$tempoEstac = $agora - $hrEntrada;
    //Adicionar horário de saida na tabela aloca e o valor da estadia
    // setar a vaga como desocupada

    //$tempoEstac = $tempoEstac - 1;
    //$custo = $valFixo + ($valAcresc * $tempoEstac);

    //echo $custo;*/

?>