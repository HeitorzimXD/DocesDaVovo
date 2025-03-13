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
    function sanitize_input($data) {
        $data = trim($data); // Remove espaços extras
        $data = stripslashes($data); // Remove barras invertidas
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Protege contra XSS
        return $data;
    }

    $nome = isset($_POST["nome"]) ? sanitize_input($_POST["nome"]) : "Não informado";
    $email = isset($_POST["email"]) ? sanitize_input($_POST["email"]) : "Não informado";
    $mensagem = isset($_POST["mensagem"]) ? sanitize_input($_POST["mensagem"]) : "Não informado";

    // Validação do e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("E-mail inválido.");
    }

    echo "<h3 style='color:black;'>Dados enviados com segurança:</h3>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>E-mail:</strong> $email</p>";
    echo "<p><strong>Mensagem:</strong> $mensagem</p>";

} else {
    echo "<p style='color:red;'>Acesso inválido!</p>";
}
?>
</body>
</html>
