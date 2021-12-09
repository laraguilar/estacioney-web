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
        <h1 class="body_title">Esqueci Minha Senha</h1>
            <form action="alterar_senha.php" method="post" id = "form_esqueci_senha">
                <fieldset class="esqueci_senha">
                    <div>
                        <h3>Digite o código enviado por email</h3>
                        <label>Código</label><br>
                        <input type="int" name="codEmail"><br>
                    </div>
                </fieldset>
                <div>
                    <button type="submit" id="confirmar_email">Continuar</button>
                </div>
            </form>
    </div>

    <?php include 'footer.html';?>
</body>
</html>