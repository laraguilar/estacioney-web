<?php 
include_once 'php_actions/conexao.php';
// header
include_once 'includes/headerLog.php';
// sessao 
require_once 'php_actions/sessaoLog.php';

$query = mysqli_query($conn, "SELECT idVaga FROM vaga WHERE idEstac = '$idEstac'");

$vaga = array();

$id = 1;
while($resultado = mysqli_fetch_array($query)){
    $idVaga = $resultado['idVaga'];
    $vaga[$id] = $idVaga;
    $id ++;
}
?>