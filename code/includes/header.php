<?php

function header(){
    if($_SESSION['logado']):
        include_once 'headerLog.php';
    else:
        include_once 'headerDeslog.php';
    endif;
}

?>