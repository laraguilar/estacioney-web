<?php
require_once 'php_actions/conexao.php';
session_start();

// verifica se a sessao ja esta logada
if($_SESSION['logado']):
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM empresa WHERE idEmpresa = '$id'";
    $resultado = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_array($resultado);
else:
    $_SESSION['logado'] = false;
endif;


if(isset($_GET['sair'])):
    $_SESSION['logado'] = false;
endif;

?>