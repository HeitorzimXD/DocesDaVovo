<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    if (!empty($nome) && !empty($email) && !empty($mensagem)) {
        echo "<h2>Dados enviados com sucesso!</h2>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>Mensagem:</strong> $mensagem</p>";

        echo "<pre>";
        print_r($_POST);
        echo "<pre>"
    } else {
        echo "<p style='color:red;'>Erro: Todos os campos são obrigatórios!</p>";
    }
} else {
    echo "<p style='color:red;'>Acesso inválido!</p>";
}
?>