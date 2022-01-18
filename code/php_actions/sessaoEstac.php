<?php
include_once 'php_actions/conexao.php';
require_once 'sessaoLog.php';

// inicia sessoes
$_SESSION['estacLogado'] = $_SESSION['estacLogado'] ?? NULL;
$_SESSION['idEstacSelected'] = $_SESSION['idEstacSelected'] ?? NULL;

if($_SESSION['estacLogado'] = 1):
    if(empty($_SESSION['idEstacSelected'])){
        $sql = "SELECT idEstac FROM estacionamento WHERE idEmpresa = '$id'";
        $resultado = mysqli_query($conn, $sql);
        $listEstac = mysqli_fetch_array($resultado);
        $_SESSION['estacLogado'] = true;
        $_SESSION['idEstacSelected'] = $listEstac[0];
        $idEstacio = $_SESSION['idEstacSelected']; 
    }
    $sql = "SELECT * FROM estacionamento WHERE idEstac = '$idEstacio'";
    $resultado = mysqli_query($conn, $sql);
    $dadosEstac = mysqli_fetch_array($resultado);

    $sql = "SELECT * FROM endereco WHERE idEstac = '$idEstacio'";
    $resultado = mysqli_query($conn, $sql);
    $endereco = mysqli_fetch_array($resultado);

endif;

?>