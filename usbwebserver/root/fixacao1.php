<!DOCTYPE html>
<html lang="pt-br">
<head>
    <Title>Fixação 1</Title>
</head>
<body>
    <p>Desenvolva aplicação PHP que leia três números e mostre-os em ordem decrescente. Sem utilizar estrutura de repetição.</p>
    
    <?php
        $maior = 0;
        If($_POST["number1"] > $_POST["number2"] and $_POST["number1"] > $_POST["number3"]){
            $maior = $_POST["number1"];
        } elseif($_POST["number2"] > $_POST["number1"] and $_POST["number2"] > $_POST["number3"]){
            $maior = $_POST["number2"];
        } elseif($_POST["number3"] > $_POST["number1"] and $_POST["number3"] > $_POST["number2"]){
            $maior = $_POST["number3"];
        }

        echo "O maior numero é " . $maior;
    ?>

    <form action="fixacao1.php" method="post">
        <label>Número 1</label>
        <input type="number" name="number1">
        <br>
        <label>Número 2</label>
        <input type="number" name="number2">
        <br>
        <label>Número 3</label>
        <input type="number" name="number3">
        <br>
        <input type="submit" value="Enviar">
    </form>


</body>
</html>