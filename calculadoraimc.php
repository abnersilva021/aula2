<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>

<!-- <h1>Exercícios PHP</h1> -->
<img src="https://blog.schoolofnet.com/wp-content/uploads/2019/01/php-leader-1024x524.png" alt="phpLogo">
</header>
    <div class="container">
   <h1>Calculadora imc</h1>
   <br>
   <br>

   <form action = "calculadoraimc.php" method = "POST">
    <label for = "nome">Nome:</label>
    <input type = "text" id = "nome" name = "nome" required>
    <br><br>
    <label for = "peso">Peso(Kg):</label>
    <input type = "number" id = "peso" name = "peso" step = "0.1" required>
    <br><br>
    <label for = "altura">Altura(m):</label>
    <input type = "number" id = "altura" name= "altura" step = "0.01" required> 
    <br><br>
    <label for = "nascimento">Nascimento:</label>
    <input type = "number" id = "nascimento" name= "nascimento"  required> 
    <br><br>
    <input type="submit" value = "Calcular">
    <input type = "reset" value = "limpar">  
    <br><br>  
    
</form>
<div class = "resposta">
    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['nome']) && isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['nascimento']) ){
            $nome = $_POST['nome'];
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $nascimento = $_POST['nascimento'];
            $anoAtual = date("Y");
            $erro = empty($nome) || empty($peso) || empty ($altura) || empty($nascimento)?"todos os campos são obrigações":
            ((!is_numeric($altura) || $peso <= 0||$altura <=0  || $nascimento <= 0)? "Por favor, insira valores vãlidos para, nome, peso, altura e ano de nascimento" : "");
            if($erro){
                echo $erro;
            } else {
                $idade = $anoAtual - $nascimento;
                $imc = $peso / ($altura * $altura);
                $imc = number_format($imc, 2);
                $classificacao = ($imc < 18.5)? "Abaixo do peso" : (($imc<24.9)?"Peso normal":(($imc<29.9)? "Sobre peso" :
                    "obesidade"));
                    echo "Seu nome é : $nome<br>";
                    echo "Seu imc é : $imc<br>";
                    echo "Classificação: $classificacao<br>";
                    echo "Sua idade é : $idade<br>";
                }
            }else{
                    echo "formulario não enviado corretamente";
                    }
                    }
    ?>
    
</div>
</div>
<br>
  
</body>
</html>