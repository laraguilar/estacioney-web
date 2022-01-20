<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// connecting to db

include_once "conexao.php";
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['newLogin']) && isset($_POST['newPassword'])) {
 
	$newLogin = trim($_POST['newLogin']);
	$newPassword = trim($_POST['newPassword']);
	
	$usuario_existe = mysqli_query($conn, "SELECT email FROM empresa WHERE email='$newLogin'");
	// check for empty result
	if (mysqli_num_rows($usuario_existe) > 0) {
		$response["success"] = 0;
		$response["error"] = "usuario ja cadastrado";
	}
	else {
		$senhaCript = password_hash($newPassword, PASSWORD_DEFAULT);
		// mysql inserting a new row
		$result = mysqli_query($conn, "INSERT INTO empresa(email, senha) VALUES('$newLogin', '$senhaCript')");
	 
		if ($result) {
			$response["success"] = 1;
		}
		else {
			$response["success"] = 0;
			$response["error"] = "Error BD: ". mysqli_connect_error($conn);
		}
	}
}
else {
    $response["success"] = 0;
	$response["error"] = "faltam parametros";
}

mysqli_close($conn);
echo json_encode($response);
?>