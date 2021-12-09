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
    <?php include 'header_deslogado.html';?>
    
    <div class="body_content">
        <h1 class="body_title">Cadastro</h1>

            <form action="home.php" method="post">
                <fieldset class="formcad">
                    <h2 id="title_cad">Dados do Estacionamento</h2>
                    <div>
                        <label>Nome do Estac</label>
                        <input type="text" name="nome" maxlength="45"><br>
                        <label>Qtd de Vagas</label>
                        <input type="integer" name="qtdVagas" maxlength="20"><br>
                        <label>Valor Fixo</label>
                        <input type="double" name="valFixo"  maxlength="45"><br>
                        <label>Valor Excedente</label>
                        <input type="double" name="valExced"  maxlength="20">
                        <br>
                        <input type="submit" value="Cadastrar" id="btn_cad">
                    <div>
                </fieldset>
            </form>
    </div>

    <?php include 'footer.html';?>
</body>
</html>