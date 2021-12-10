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
        <h1 class="body_title">Login</h1>
            <form action="home.php" method="post" id = "form_login">
                <fieldset class="login">
                    <div>
                        <label>E-mail</label>
                        <input type="email" name="email"><br>
                        <label>Senha</label>
                        <input type="password" name="password"><br>
                        <a href="tela_esqueci_senha.php">Esqueci minha senha</a>
                    </div>
                </fieldset>
                <div class="botao_login">
                    <button type="submit" id="confirmar_login">Entrar</button>
                </div>
            </form>
    </div>

    <?php include 'footer.html';?>
</body>
</html>