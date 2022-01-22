<?php

// conecta ao BD
include_once "conexao.php";
session_start();
// array for JSON response
$response = array();

$response["success"] = 1;

$idEmpresa = $_SESSION['idEmpresa'];
$response["estacs"] = array();


// codigo sql da sua consulta
$query1 = mysqli_query($conn, "SELECT idEstac, nomEstac from estacionamento where idEmpresa='$idEmpresa'");
$estacs = mysqli_fetch_array($query1);
$idEstac = $estacs['idEstac'];
$nomEstac = $estacs['nomEstac'];



$query2 = mysqli_query($conn, "SELECT * from endereco where idEstac = '$idEstac'");
$endereco = mysqli_fetch_array($query2);
$logradouro = $endereco['dscLogradouro'];

$dadosEstac = array();
$dadosEstac['idEstac'] = $idEstac;
$dadosEstac['nomEstac'] = $nomEstac;
$dadosEstac['logr'] = $logradouro;
$dadosEstac['cep'] = $$endereco['cep'];

array_push($response["estacs"], $dadosEstac);

mysqli_close($conn);
echo json_encode($response);
