<?php 
include_once 'php_actions/conexao.php';
// header
include_once 'includes/headerLog.php';
// sessao 
require_once 'php_actions/sessaoLog.php';

$vag = $_SESSION['vaga'];
var_dump($vag);

$vag = $_SESSION['vaga'];

$vagaCarro = 10;
//verifica se as vagas sao do estacionamento
while($idWeb = current($vag)){
    if($idWeb = $vagaCarro){
        $idVaga = key($vag);
        $vagaVazia = "SELECT condVaga FROM vaga WHERE idVaga = $idVaga";
        $query = mysqli_query($conn, $vagaVazia);
        $result = mysqli_fetch_assoc($query);

        if($result['condVaga']):
            $erros[] = "vaga ocupada";
        endif;
    }
}


?>