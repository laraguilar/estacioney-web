<?php 

$vagaCarro = 10;


$vag = $_SESSION['vaga'];
if(in_array($vagaCarro, $vag)){
    $arr = array_keys($vag, $vagaCarro);
    $idVagaBD = $arr[0];
    // verifica se a vaga esta desocupada
    $vagaVazia = "SELECT condVaga FROM vaga WHERE idVaga = $idVagaBD";
    $query = mysqli_query($conn, $vagaVazia);
    $result = mysqli_fetch_assoc($query);
}
?>