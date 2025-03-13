<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="2.png" type="image/x-icon">
    <title>Formulário de Sugestão</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = isset($_POST["nome"]) ? htmlspecialchars($_POST["nome"]) : "Não informado";
        $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "Não informado";
        $mensagem = isset($_POST["mensagem"]) ? htmlspecialchars($_POST["mensagem"]) : "Não informado";

        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>Mensagem:</strong> $mensagem</p>";

    } else {
        echo "<p style='color:red;'>Acesso inválido!</p>";
    }
    ?> 
</body>
</html>
