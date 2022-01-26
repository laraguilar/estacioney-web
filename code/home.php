<?php 
include_once 'php_actions/conexao.php';
// header
include_once 'includes/headerLog.php';
// sessao 
require_once 'php_actions/sessaoLog.php';

// atribui uma vaga a um item 
$query = mysqli_query($conn, "SELECT idVaga FROM vaga WHERE idEstac = '$idEstac'");
$vaga = array();
$id = 1;
while($resultado = mysqli_fetch_array($query)){
    $idVaga = $resultado['idVaga'];
    $vaga[$id] = $idVaga;
    $id ++;
}
$_SESSION['vaga'] = $vaga;

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
        <style>
            .botao-lista{
                display: block;
                top:50%; 
            }
        </style>
</head>
<body>
    <div class="container" style="margin: auto; width: 60%;">
        <div class="row">
            <div class="col center-align">
            <div class="row s12 m6 center-align">
                <div class="col s12 z-depth-1">
                    <h4 class="center"><?php echo $nomEstac?></h4>
                    <!-- Dropdown Trigger
                    <a class='dropdown-trigger btn' href='#' data-target='dropdown2'>DROPDOWN??<?php //echo $dadosEstac['nomEstac']?><i class="material-icons right">arrow_drop_down</i> </a>

                    Dropdown Structure -->
                    <?php
                        /*$_SESSION['idEstacSelected'] = NULL;
                        // mostra a lista de estacionamentos da empresa
                        $sql = "SELECT * FROM estacionamento WHERE idEmpresa = $id";
                        $result = mysqli_query($conn, $sql);
                        // cria a tabela
                        echo "<form action='php_actions/teste.php' method='POST'> <ol id='dropdown2' class='dropdown-content'>";
                        // faz um while que mstra a informação de todos os estacionamentos da empresa
                        while($dado = mysqli_fetch_array($result)):
                            $idEstac = $dado['idEstac'];

                            if(!($dadosEstac['idEstac'] == $idEstac)){
                                echo "<button type='submit' id=".$idEstac." name='entrarEstac'>";
                                echo $dado['nomEstac'];
                                echo "</button>";
                            }  
                        endwhile;
                        echo "</ol></form>";*/
                    ?>

                    <div class="row center">
                        <div class="col s12 m6">
                            <h6><b>Valor fixo:</b> R$<?php echo number_format($valFixo, 2);?></h6>
                        </div>
                        <div class="col s12 m6">
                            <?php 
                                // calcula a quantidade de vagas ocupadas
                                $sql3 = "SELECT count(*) as 'vagasOcup' from vaga where condVaga = 1 and idEstac ='$idEstac'";
                                $query3 = mysqli_query($conn, $sql3);
                                $resulta = mysqli_fetch_assoc($query3);
                                $vagasOcup = $resulta['vagasOcup'];

                                // quantidade de vagas disponíveis
                                $vagasDisp = $qtdVagas - $vagasOcup;
                            ?>
                            <h6><b>Disponibilidade:</b> <?php echo $vagasDisp."/".$qtdVagas ?></h6>
                        </div>
                        <div class="col s12 m6">
                            <h6><b>Acréscimo/hora:</b> R$<?php echo number_format($valAcresc, 2);?></h6>
                        </div>
                        <div class="col s12 m6">
                            <a href="entrada.php" class="btn indigo darken-4">entrada veiculo</a>
                        </div>
                        <div class="col s12 left-align">
                            <br>
                            <div class="row">
                            <div class='divider'></div>
                            <div class="col s12">
                                <?php
                                    // pega dados da vaga
                                    $sql = "SELECT * FROM vaga WHERE idEstac = '$idEstac';";
                                    $query = mysqli_query($conn, $sql);

                                    
                                    // percorre as vagas do estacionamento
                                    while($vaga = mysqli_fetch_array($query)):     

                                        // verifica se a vaga está ocupada
                                        $idVaga = $vaga['idVaga'];
                                        $condVaga = $vaga['condVaga'];

                                        // pega os dados da vaga alocada
                                        $sql2 = "SELECT * FROM aloca WHERE idVaga = '$idVaga' and hrSaida IS NULL;";
                                        $query2 = mysqli_query($conn, $sql2);

                                        // percorre e printa os carros alocados no momento
                                        while($aloca = mysqli_fetch_array($query2)):
                                            $nomCliente = $aloca['nomCliente'];

                                            $idVaga = $vaga['idVaga'];

                                            // dados do cliente que alocou a vaga
                                            $hrEntrada = $aloca['hrEntrada'];
                                            echo "<div class='row'>";
                                                echo "<div class='section'>";
                                                    echo "<div class='col s8'>";
                                                        echo "<h5>".$nomCliente."</h5><span>Hora de Entrada: ".$hrEntrada."</span><br><span>Placa: ".$aloca['dscPlaca']."</span>";
                                                        ?>
                                                    </div>
                                                    <div class='section'>
                                                        <div class='col s4'>
                                                            <div class='botao-lista right-align'>
                                                                    <a href='#modal<?php echo $idVaga ?>' class='btn-flat orange modal-trigger'>liberar vaga</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal Structure -->
                                                    <div id="modal<?php echo $idVaga ?>" class="modal" style="height:auto">
                                                        <div class="modal-content">
                                                        <h4>Liberar vaga</h4>
                                                        <p>Tem certeza que deseja liberar a vaga?</p>
                                                        </div>
                                                        <div class="modal-footer">

                                                        <form action="php_actions/liberarvaga.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $idVaga ?>">
                                                            <input type="hidden" name="idEstac" value="<?php echo $idEstac ?>">
                                                            <button type="submit" name="btnLiberar" class="btn-flat orange">Liberar Vaga</button>
                                                        </form>
                                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='divider'></div>
                                            <?php                                       
                                        endwhile;
                                    endwhile;

                                
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="main.js"></script>

        <?php 
        include_once 'includes/footer.php';?>

    </body>

  </html>