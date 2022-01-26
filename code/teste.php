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
while($idWeb = current($vag)){
    if($idWeb = $vagaCarro){
        $idVaga = key($vag);

        echo $idVaga;
        if($result['condVaga']):
            $erros[] = "vaga ocupada";
        endif;
    }
}


?>