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

            <form action="cadastro_empresa.php" method="post">
                <fieldset class="formcad">
                    <h2 id="title_cad">Seus dados</h2>
                    <div>
                        <label>Nome</label>
                        <input type="text" name="nome" maxlength="45"><br>
                        <label>E-mail</label>
                        <input type="email" name="email_pessoa"  maxlength="20"><br>
                        <label>CPF</label>
                        <input type="text" name="cpf" maxlength="20"><br>
                        <label>Nascimento</label>
                        <input type="date" name="nasc"  maxlength="45"><br>
                        <input type="submit" value="Continuar" id="btn_cad">
                    <div>
                </fieldset>
            </form>
    </div>

    <?php include 'footer.html';?>
</body>
</html>