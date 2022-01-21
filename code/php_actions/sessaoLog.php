<?php
include_once 'php_actions/conexao.php';
session_start();

$_SESSION['estacLogado'] = $_SESSION['estacLogado'] ?? NULL;

(!empty($_SESSION['logado'])) or die (header('Location: ../code/index.php'));

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM empresa WHERE idEmpresa = '$id'";
$resultado = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($resultado);
$logado = $_SESSION['logado'];

if(isset($_GET['sair'])):
    $_SESSION['logado'] = NULL;
    $_SESSION['estacLogado'] = NULL;
    header('Location: ../code/index.php');
endif;


$sql = "SELECT * FROM estacionamento WHERE idEmpresa = '$id'";
$query = mysqli_query($conn, $sql);
$dadosEstac = mysqli_fetch_array($query);

$idEstac = $dadosEstac['idEstac'];
$nomEstac = $dadosEstac['nomEstac'];
$valFixo = $dadosEstac['valFixo'];
$valAcresc = $dadosEstac['valAcresc'];
$qtdVagas = $dadosEstac['qtdVagas'];

?>