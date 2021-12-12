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
        <h1 class="body_title">Dados da Empresa</h1>
        <div class="image_user_profile"><figure><img src="imagem/user_black.png"></figure></div>
        <div class="edit_profile_icon"><figure><img src="imagem/pencil.png"></figure></div>

        <table class="dados_veiculo">
            <tr>
                <td>
                    <div class="nome_empresa">Nome da Empresa</div>
                    <div class="var_nome_empresa">Vix Park</div>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="email">E-MAIL</div>
                    <div class="var_email">vixpark@email.com</div>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="cpf">CPF/CNPJ</div>
                    <div class="var_cpf">123.456.789-00</div>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="tele">Telefone</div>
                    <div class="var_tele">(27)1234-5678</div>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="alterar_senha">Alterar Senha</button>
                    <button class="add_estac">Adicionar Estacionamento</button>
                </td>
            </tr>