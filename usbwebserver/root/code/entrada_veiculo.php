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
        <h1 class="body_title">Entrada</h1>
            <div class="timestamp"><p>Hora Atual: <?php 
                $agora = new DateTime();
                print_r($agora->format('d/m/Y H:i:s'));
            ?></p></div>
            <form action="home.php" method="post">
                <fieldset class="formcad">
                    <h2 id="title_cad">Dados do Estacionamento</h2>
                    <div>
                        <label>Vaga</label>
                        <input type="int" name="nVaga" maxlength="3"><br>
                        <label>Placa do Carro</label>
                        <input type="text" name="qtdVagas" maxlength="10"><br>
                        <label>Modelo</label>
                        <input type="text" name="modCarro"  maxlength="15"><br>
                        <label>Cor</label>
                        <input type="text" name="corCarro"  maxlength="10">
                        <br>
                        <input type="submit" value="Dar entrada" id="btn_cad">
                    <div>
                </fieldset>
            </form>
    </div>

    <?php include 'footer.html';?>
</body>
</html>