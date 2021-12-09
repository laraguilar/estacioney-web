<!DOCTYPE html>
<html lang="pt-br">
<head>
    <Title>Fixação 3</Title>
</head>
<body>
    <p>Um posto está vendendo combustíveis com a seguinte tabela de descontos:<br>

    Álcool:<br>
        a. até 20 litros, desconto de 3% por litro<br>
        b. acima de 20 litros, desconto de 5% por litro<br>
    Gasolina:<br>
    a. até 20 litros, desconto de 4% por litro<br>

        b. acima de 20 litros, desconto de 6% por litro Escreva um algoritmo que leia o número de litros vendidos, o tipo de combustível (codificado da seguinte forma: A-álcool, G-gasolina), calcule e imprima o valor a ser pago pelo cliente sabendo-se que o preço do litro da gasolina  será informado pelo vendedor.</p>

    <form action="fixacao4.php" method="post">
        Combustível
        <select name="combustivel">
            <option value="gasolina" selected>G</option>
            <option value="Álcool">A</option>
        </select><br>
        Litros
        <input type="double" name="litros"><br>
        Preço/l
        <input type="double" name="preco"><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        $desconto = 0;

        If($_POST["combustivel"] == "gasolina"){
            If($_POST["litros"] > 20){
                $desconto = 6;
            }
        } elseif($_POST["litros"] <= 20){
            $desconto = 3;
        } elseif($_POST["litros"] > 20){
            $desconto = 5;
        }

        $total = $_POST["preco"]*$_POST["litros"] - ($_POST["preco"]*$_POST["litros"]*($desconto/100));

        echo "Total R$".$total;
    ?>

</body>
</html>