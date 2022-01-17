<?php 
// Log na Sessao
require_once 'php_actions/sessaoLog.php';
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
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">
            var idClicado = null;
            jQuery(document).ready(function($) {
                $(".clicavel").click(function() {
                    idClicado = $(this).attr('id');
                    //window.alert(idClicado);
                    <?php
                        $_SESSION['estacLogado'] = true;
                        $_SESSION['idEstacSelected'] = "<script>document.write(idClicado)</script>";
                        header('Location: home.php');
                    ?>
                    $("table").unbind();
                    //window.location.pathname('/home.php');
                });
            });
        </script>
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
                                <style>
                                    tr:hover{background:  #e0e0e0 ; display: block; cursor: pointer;}
                                    .estacList{display: block;text-decoration: none;}
                                </style>
                                <?php
                                    $_SESSION['idEstacSelected'] = NULL;
                                    // mostra a lista de estacionamentos da empresa
                                    $sql = "SELECT * FROM estacionamento WHERE idEmpresa = $id";
                                    $result = mysqli_query($conn, $sql);
                                    // cria a tabela
                                    echo "<table>";

                                    // faz um while que mstra a informação de todos os estacionamentos da empresa
                                    while($dado = mysqli_fetch_array($result)):
                                        $idEstac = $dado['idEstac'];
                                        $end = "SELECT * FROM endereco WHERE idEstac = $idEstac"; // pega os dados de endereço
                                        $query = mysqli_query($conn, $end);
                                        $end = mysqli_fetch_assoc($query);

                                        echo "<tr  class='clicavel' id='$idEstac'>";
                                            echo "<td>";
                                                echo "<b>".$dado['nomEstac']."</b> ";
                                            echo "</td>";
                                        echo "</tr>";
                                    endwhile;
                                    echo "</table>";
                                ?>                
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