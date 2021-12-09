<!DOCTYPE html>
<html lang="pt-br">
<head>
    <Title>Fixação 3</Title>
</head>
<body>
    <p>Desenvolva um programa que lê as duas notas parciais obtidas por um aluno numa disciplina ao longo de um semestre, e calcule a sua média. A atribuição de conceitos obedece à tabela abaixo:
    <br>
    Média de Aproveitamento Conceito<br>
        a. Entre 9.0 e 10.0 A<br>
        b. Entre 7.5 e 9.0 B<br>
        c. Entre 6.0 e 7.5 C<br>
        d. Entre 4.0 e 6.0 D<br>
        e. Entre 4.0 e zero E<br>
    O algoritmo deve mostrar na tela as notas, a média, o conceito correspondente e a mensagem “APROVADO” se o conceito for A, B ou C ou “REPROVADO” se o conceito for D ou E.</p>

    <form action="fixacao3.php" method="post">
        Nota 1
        <input type="double" name="nota1"><br>
        Nota 2
        <input type="double" name="nota2"><br>

        <input type="submit" value="Enviar">
    </form>

    <?php
        $media = ($_POST["nota1"] + $_POST["nota2"])/2;
        $situacao = "REPROVADO";
        $conceito = "E";

        If($media >= 6){
            $situacao = "APROVADO";
            If($media < 7.5){
                $conceito = "C";
            } elseif ($media >= 7.5 and $media < 9){
                $conceito = "B";
            } else{
                $conceito = "A";
            }
        } elseif($media >= 4){
            $conceito = "D";
        } else{
            $conceito = "E";
        }

        echo "Notas: ".$_POST["nota1"], " e ".$_POST["nota2"], "<br>";
        echo "Média: ".$media, "<br>";
        echo "Conceito: ".$conceito;
    ?>
</body>
</html>