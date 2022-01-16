<?php 
// Log na Sessao
require_once 'php_actions/sessaoLog.php';
// verifica se o user ta logado
$_SESSION['logado'] = $_SESSION['logado'] ?? NULL;
if (!$_SESSION['logado']) die(header('Location: index.php'));
// header
include_once 'includes/headerLog.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Estacioney</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">   
        <link rel="shortcut icon" type="imagex/png" href="imagem/logo_estacioney50px.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <div class="container" style="margin: auto; width: 60%;">
        <div class="row center-align">
            <div class="col center-align">
                <div class="row center-align">
                    <div class="col s12 z-depth-1"> 
                        <h3 class="center">Lista de Estacionamentos</h3>
                            <a class="waves-effect waves-light btn-small indigo darken-4" href="cadEstac.php">Adicionar estacionamento</a><br>
                        <div class="row center" style="margin-top: 2%;">
                            <table>
                                <style>
                                    tr:hover{background:  #fafafa ;} td a {display:block; color: #424242 ;}
                                    tr:hover{background:  #e0e0e0 ;} td a {display:block; color: #424242 ;}
                                </style>
                                <tbody>
                                    <?php
                                        // mostra a lista de estacionamentos da empresa
                                        $sql = "SELECT * FROM estacionamento WHERE idEmpresa = $id";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        // faz um while que mstra a informação de todos os estacionamentos da empresa
                                        while($dado = mysqli_fetch_array($result)):
                                            $idEstac = $dado['idEstac'];
                                            $end = "SELECT * FROM endereco WHERE idEstac = $idEstac"; // pega os dados de endereço
                                            $query = mysqli_query($conn, $end);
                                            $end = mysqli_fetch_assoc($query);
                                    ?>
                                    <tr>
                                        <td>
                                            <p style="font-weight: bold;"><a href="php_actions/estacLog.php"><?php echo $dado['nomEstac'];?></a></p>
                                            <a href="php_actions/estacLog.php"><p><?php if(!empty($end)): echo $end['dscLogradouro']. ", " .$end['numero']. " - " .$end['cep']; endif;?></p>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile;?>
                                </tbody>
                            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="$_GET">
        <input type="submit" value="Sair" name="sair" class="btn" method="GET">
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
    </body>
  </html>