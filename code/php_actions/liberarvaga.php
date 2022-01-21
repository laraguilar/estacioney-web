<?php
require_once './sessaoLog.php';

// verifica se o botao foi clicado
if (isset($_POST['btnLiberar'])) :

    // atribui os valores do formulario
    $vaga = mysqli_escape_string($conn, $_POST['idVaga']);

    $vaga = filter_input(INPUT_POST, 'idVaga', FILTER_SANITIZE_NUMBER_INT);

    // código SQL para editar os dados
    $query = mysqli_query($conn, "select now();");
    $hoje = mysqli_fetch_assoc($query);

    $query2 = mysqli_query($conn, "SELECT hrEntrada FROM aloca WHERE idVaga = '$idVaga';");
    $hrEntrada = mysqli_fetch_assoc($query2);
    echo $hrEntrada;

    $tempoEstac = $hoje - $hrEntrada;
    //Adicionar horário de saida na tabela aloca e o valor da estadia
    // setar a vaga como desocupada

    $tempoEstac = $tempoEstac - 1;
    $custo = $valFixo + ($valAcresc * $tempoEstac);

    echo $custo;
endif;
