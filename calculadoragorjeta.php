<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>

<!-- <h1>Exercícios PHP</h1> -->
<img src="https://blog.schoolofnet.com/wp-content/uploads/2019/01/php-leader-1024x524.png" alt="phpLogo">
</header>

    <div class="container">
    <h1>Caculadora de gorjeta</h1>
    <br>
    <br>

    <form action="calculadoragorjeta.php" method="POST">
        <label for="valo">Valor da conta:</label>
        <input type="number" id="Valor" name="valor" step="0.01" required><br><br>
        <label for="porcentage">Porcentagem da gorjeta:</label>
        <input type="number" id="Porcentagem" name="porcentagem" step="0.01" required><br><br>
        <input type="submit" value="Calcular">
        <input type="reset" value="Limpar">
    </form>
    <div class="Resposta">
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['valor']) && isset($_POST['porcentagem'])) {
                $valor = $_POST['valor'];
                $porcentagem = $_POST['porcentagem'];

                $erro = (empty($valor) || empty($porcentagem)) ? "Todos os campos são obrigatórios" : ((!is_numeric($valor) || $valor <= 0 || $porcentagem <= 0) ? "Por favor, insira valores válidos" : "");
                if ($erro) {
                    echo $erro;
                } else {
                    
                    $gorjeta = $valor * ($porcentagem / 100);
                    echo "Sua gorjeta é: $gorjeta<br>";
                }
            } else {
                echo "Formulário não enviado corretamente";
            }
        }
        ?>
    </div>
</div>


</body>


</html>