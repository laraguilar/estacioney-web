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
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".clicavel").click(function() {
                    idClicado = $(this).attr('id');
                    //window.alert(idClicado);
                    <?php
                        $_SESSION['estacLogado'] = true;
                        $_SESSION['idEstacSelected'] = "<script>document.write(idClicado)</script>";
                    ?>
                    //window.location.pathname('/home.php');
                    location.reload();
                });
            });
        </script>
</head>
<body>
    <div class="container" style="margin: auto; width: 60%;">
        <div class="row">
            <div class="col center-align">
            <div class="row s12 m6 center-align">
                <div class="col s12 z-depth-1">
                    <h3 class="center"><?php echo var_dump($dadosEstac)?></h3>
                    <!-- Dropdown Trigger -->
                    <a class='dropdown-trigger btn' href='#' data-target='dropdown2'><?php ?></a>

                    <!-- Dropdown Structure -->
                    <?php
                        $_SESSION['idEstacSelected'] = NULL;
                        // mostra a lista de estacionamentos da empresa
                        $sql = "SELECT * FROM estacionamento WHERE idEmpresa = $id";
                        $result = mysqli_query($conn, $sql);
                        // cria a tabela
                        echo "<ul id='dropdown2' class='dropdown-content'>";
                        // faz um while que mstra a informação de todos os estacionamentos da empresa
                        while($dado = mysqli_fetch_array($result)):
                            $idEstac = $dado['idEstac'];
                            echo "<li class='clicavel' id=".$idEstac.">";
                                echo "<a>".$dado['nomEstac']."</a> ";
                            echo "</li>";
                        endwhile;
                        echo "</ul>";
                    ?>

                    <div class="row center">
                        <div class="col s12 m6">
                            <h6>Valor fixo: R$5,00</h6>
                        </div>
                        <div class="col s12 m6">
                            <h5>Disponibilidade: 27/30</h5>
                        </div>
                        <div class="col s12 m6">
                            <h6>Acréscimo/hora: R$1,50</h6>
                        </div>
                        <div class="col s12 left-align">
                            <!-- A partir de agora todas as cols são uma linha do "histórico"-->
                            <div class="row">
                                <div class="divider"></div>
                                <div class="col s12"> <!-- LINHA -->
                                    <div class="row"> <!-- Cria duas colunas para os dados e os botoes ficarem na mesma linha e em sentidos opostos -->
                                        <div class="section">
                                            <div class="col s6">
                                                <h5 >Augusto</h6>
                                                <span>HTM-1353</span>
                                                <span>Hora de Entrada 10:50:45 14/12/2021</span>
                                            </div>
                                            <div class="section">
                                            <div class="col s6 right-align">
                                                <h5><a class="btn-floating btn-medium waves-effect waves-light indigo"><i class="material-icons">edit</i></a>
                                                <a class="btn-floating btn-medium waves-effect waves-light indigo"><i class="material-icons">exit_to_app</i></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="col s12"> <!-- LINHA -->
                                    <div class="divider"></div>
                                    <div class="row">
                                        <div class="section">
                                            <div class="col s6">
                                                <h5>Augusto</h5>
                                                <span>HTM-1353</span>
                                                <span>Hora de Entrada 10:50:45 14/12/2021</span>
                                            </div>
                                            <div class="section">
                                            <div class="col s6 right-align">
                                                <h5><a class="btn-floating btn-medium waves-effect waves-light indigo"><i class="material-icons">edit</i></a>
                                                <a class="btn-floating btn-medium waves-effect waves-light indigo"><i class="material-icons">exit_to_app</i></a></h5>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="fixed-action-btn">
        <a href = "entrada.php"class="btn-floating btn-large waves-effect waves-light indigo right" style="margin-bottom:0px;"><i class="material-icons">add</i></a>

        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="main.js"></script>
    </body>
  </html>