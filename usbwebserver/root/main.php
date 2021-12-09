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
<?php
    If(isset($_REQUEST["user"])){
        echo("Seu usuário é " .$_REQUEST["user"]);
    }
?>
<body>
    <div class="header">
        <nav class="header_toolbar">
            <a href="index.html"><figure class="image_toolbar"><img class="image_toolbar" src="imagem/logo_estacioney50px.png"></figure></a>
            <ul class="ul_toolbar">
                <li><a href="cadastro.html">Cadastro</a></li>
                <li><a href="historico.html">Histórico</a></li>
                <li><a href="sobre.html">Sobre</a></li>
                <li id="sair"><a href="index.html">Sair <img src="imagem/opcao-de-sair.png"></a></li>
            </ul>

        </nav>
    </div>

    <div class="header_content">
        <div class="header_slogan">Sistema de Gerenciamento - Estacioney</div>
    </div>

    <div class="body_content">
        <h1 class="body_title">Login</h1>
            <form action="index.php" id = "form_login">
                <fieldset class="login">
                    <div>
                        <label>Usuário</label>
                        <input type="text" name="user" id="user">
                    </div>
                    <div>
                        <label>Senha</label>
                        <input type="password" name="password" id="password">
                    </div>
                </fieldset>

                <div class="botao_login">
                    <button type="submit" id="confirmar_login">Entrar</button>
                </div>
            </form>
    </div>


    <footer>       
    <p>Copyright © 2021 . Todos os direitos reservados.</p>
    </footer>
</body>
</html>