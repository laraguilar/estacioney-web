<?php 
include_once 'php_actions/conexao.php';
// header
include_once 'includes/headerLog.php';
// sessao 
require_once 'php_actions/sessaoLog.php';

$query2 = "SELECT idEstac FROM estacionamento WHERE idEmpresa = 1 and nomEstac = 'abc';";
$queryy = mysqli_query($conn, $query2);
$resultado = mysqli_fetch_array($queryy);

if($resultado > 0){
    echo "lara linda";
} else{
    echo "lara MARAVILHOSA";
}
?>