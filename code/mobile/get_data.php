<?php

// conecta ao BD
include_once "conexao.php";
 
// array for JSON response
$response = array();

if(mysqli_connect_error()):
    echo "Falha na conexão: ". mysqli_connect_error();
endif;
$username = NULL;
$password = NULL;

$isAuth = false;

// Método para mod_php (Apache)
if(isset( $_SERVER['PHP_AUTH_USER'])) {
    $username = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];
} // Método para demais servers
elseif(isset( $_SERVER['HTTP_AUTHORIZATION'])) {
    if(preg_match( '/^basic/i', $_SERVER['HTTP_AUTHORIZATION']))
		list($username, $password) = explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));
}

// Se a autenticação não foi enviada
if(!is_null($username)){
    $query = mysqli_query($conn, "SELECT senha FROM empresa WHERE email='$username'");

	if(mysqli_num_rows($query) > 0){
		$row = mysqli_fetch_array($query);
		if(password_verify($password, $row['senha'])){
			$isAuth = true;
		}
	}
}
 
if($isAuth) {
	$response["success"] = 1;
	
	// codigo sql da sua consulta
	$testando = "SELECT nomEstac FROM estacionamento" and "SELECT (dscLogradouro, numero, bairro, cidade, estado) FROM endereço ";
    $resultado = mysqli_query($conn, $testando);
    $testeFinal = mysqli_fetch_array($resultado);
	$response["data"] = $testeFinal;
}
else {
	$response["success"] = 0;
	$response["error"] = "falha de autenticação";
}
mysqli_close($conn);
echo json_encode($response);
?>