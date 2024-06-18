<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


   <h1>Calculadora imc</h1>
   <form action = "calculadora.php" method = "POST">
    <label for = "peso">Peso(Kg):</label>
    <input type = "number" id = "peso" name = "peso"
    step = "0.1" requered>
    <br><br>
    <label for = "altura">Altura(m):</label>
    <input type = "number" id = "altura" name= "altura"
    step = "0.01" required> 
    
    <br><br>
    <input type="submit" value = "Calcular IMC">
    <input type = "Reset" value = "limpar">    
</form>
<div class = "resposta">
    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['peso']) && isset($_POST['altura'])){
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $erro = empty($peso) || empty ($altura)?"todos os campos são obrigações":
            ((!is_numeric($altura) || $peso <= 0||$altura <= 0)? "Por favor, insira valores vãlidos para peso e altura" : "");
            if($erro){
                echo $erro;
            } else {
                $imc = $peso / ($altura * $altura);
                $imc = number_format($imc, 2);
                $classificacao = ($imc < 18.5)? "Abaixo do peso" : (($imc<24.9)?"Peso normal":(($imc<29.9)? "Sobre peso" :
                    "obesidade"));
                    echo "Seu imc é : $imc<br>";
                    echo "Classificação: $classificacao";
                }
            }else{
                    echo "formulario não enviado corretamente";
                    }
                    }
    ?>

</div>



</body>
</html>