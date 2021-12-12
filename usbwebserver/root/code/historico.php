<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Estacioney</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="shortcut icon" type="imagex/png" href="imagem/logo_estacioney50px.png">
</head>
<body>
    <?php include 'header_logado.html';?> 
    <div class="body_content">
        <h1 class="body_title">Historico</h1>
        <table class="valores">
            <tr>
                <td>
                    <div class="val_fixo">Lucro: </div>
                    <div class="preco_fixo">R$ 51.00</div>
                    <div class="clear"></div>
                </td>

                <td>
                    <button class="gerar_pdf">Gerar PDF</button>
                </td>

            </tr>
            <tr>
                <td>
                    <div class="acres_hr">Rotatividade:</div>
                    <div class="preco_acresc"> 8 carros </div>
                    <div class="clear"></div>
                </td>
            </tr>
        </table>
        <hr></hr>
        <table>
            <tr>
                <td>
                    <div class="num_vaga">1</div>
                </td>
                <td>
                    <div class="nome_estacionado">Giovanni</div>
                    <div class="placa_estacionado">CRN-0021</div>
                    <br></br>
                    <div class="dsc_estacionado">Hora entrada: </div>
                    <div class="horario_entrada">22/04/21 06:11:00</div>
                    <div class="clear"></div>
                </td>
                <td>
                    <div class="editar_vaga">EDITAR</div>
                    <div class="sair_vaga">SAIR</div>
                </td>
            </tr>
        </table>
        <hr></hr>
    </div>
    <div class="add_car">ADICIONAR CARRO</div>
</body>
</html>