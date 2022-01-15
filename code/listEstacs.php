<?php 
// Log na Sessao
require_once 'php_actions/sessaoLog.php';
// header
include_once 'includes/headerLog.html';

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
                <div class="row s12 m6 center-align">
                    <div class="col s12 z-depth-1"> 
                        <h3 class="center">Lista de Estacionamentos</h3>
                            <a class="waves-effect waves-light btn-small indigo darken-4" href="cadEstac.php">Adicionar estacionamento</a><br>
                        <div class="row center">
                            <table>
                                <style>
                                    tr:hover{background:  #fafafa ;} td a {display:block; color: #424242 ;}
                                </style>
                                <tbody>
                                    <tr>
                                        <td><a href="home.php">Estacionamento 1</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="home.php">Estacionamento 2</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="home.php">Estacionamento 3</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="home.php">Estacionamento 4</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
    </body>
  </html>