<?php 
include_once 'php_actions/conexao.php';
// header
include_once 'includes/headerLog.php';
// sessao 
require_once 'php_actions/sessaoLog.php';


var_dump($vag);

for ($i=1; $i <= sizeof($vag); $i++){
    echo $vag[$i];
}
?>