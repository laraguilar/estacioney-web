<?php 
include_once 'php_actions/conexao.php';
// header
include_once 'includes/headerLog.php';
// sessao 
require_once 'php_actions/sessaoLog.php';

$vag = $_SESSION['vaga'];

$vag = $_SESSION['vaga'];

$vagaCarro = 10;
//verifica se as vagas sao do estacionamento

$arr = array_keys($vag, $vagaCarro);
echo $arr[0];


if(array_key_exists($vagaCarro, $arr)){
    echo "Lara linda";
}


?>