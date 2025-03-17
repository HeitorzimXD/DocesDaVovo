<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="2.png" type="image/x-icon">
    <title>Lista de Sugestões</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .erro { color: red; }
        .sugestao { border-bottom: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>
<?php
// Conectar ao banco de dados
$host = "localhost";
$dbname = "doces_vovo";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("<p class='erro'>Erro de conexão: " . $e->getMessage() . "</p>");
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

        $stmt = $pdo->prepare("INSERT INTO sugestoes (nome, email, mensagem) VALUES (:nome, :email, :mensagem)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mensagem', $mensagem);
        $stmt->execute();
    }

// Buscar todas as sugestões do banco
$query = $pdo->query("SELECT nome, mensagem, data_envio FROM sugestoes ORDER BY data_envio DESC");
$sugestoes = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Lista de Sugestões</h2>
<?php if (!empty($sugestoes)): ?>
    <?php foreach ($sugestoes as $sugestao): ?>
        <div class="sugestao">
            <strong><?= htmlspecialchars($sugestao['nome']) ?></strong> 
            (<?= $sugestao['data_envio'] ?>) <br>
            <?= nl2br(htmlspecialchars($sugestao['mensagem'])) ?>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhuma sugestão cadastrada ainda.</p>
<?php endif; ?>
</body>
</html>