<?php 
// Log na Sessao
require_once 'php_actions/sessaoEstac.php';
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
    <div class="container">
    <div class="row">


    <a class='dropdown-trigger btn' href='#' data-target='dropdown2'><?php echo $dadosEstac['nomEstac']?><i class="material-icons right">arrow_drop_down</i> </a>

    <ul id='dropdown2' class='dropdown-content'>
        <option value="abc">ABC</option>
        <option value="def">DEF</option>
    </ul>
    
    <!-- Dropdown Structure -->
    <?php
        echo $variav;
        $_SESSION['idEstacSelected'] = NULL;
        // mostra a lista de estacionamentos da empresa
        $sql = "SELECT * FROM estacionamento WHERE idEmpresa = $id";
        $result = mysqli_query($conn, $sql);
        // cria a tabela
        echo "<select id='dropdown5' class='dropdown-content'>";
        // faz um while que mstra a informação de todos os estacionamentos da empresa
        while($dado = mysqli_fetch_array($result)):
            $idEstac = $dado['idEstac'];

            if(!($dadosEstac['idEstac'] == $idEstac)){
                echo "<option value=".$idEstac.">".$dado['nomEstac']."</option> ";
            }
            
        endwhile;
        echo "</select>";
    ?>

        <div class="input-field col s12">
            <select>
            <option value="" disabled selected>Choose your option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
            </select>
            <label>Materialize Select</label>
        </div>
    </div>

    </div>
    

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="main.js"></script>
</body>
  </html>