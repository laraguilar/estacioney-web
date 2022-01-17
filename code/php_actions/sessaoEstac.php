<?php
include_once 'php_actions/conexao.php';
require_once 'sessaoLog.php';

$_SESSION['estacLogado'] = $_SESSION['estacLogado'] ?? NULL;

if(!empty($_SESSION['estacLogado'])):
    $idEstacSelected = $_SESSION['idEstacSelected'];
    $sql = "SELECT * FROM estacionamento WHERE idEstac = '$idEstacSelected'";
    $resultado = mysqli_query($conn, $sql);
    $dadosEstac = mysqli_fetch_array($resultado);
    $estacLogado = $_SESSION['estacLogado'];
endif;

// caso algum botao referente à saida do estacionamento seja clicado, o estacionamento é deslogado
if(isset($_GET['sairEstac'])):
    $_SESSION['estacLogado'] = NULL;
    header('Location: ../code/listEstacs.php');
endif;
?>