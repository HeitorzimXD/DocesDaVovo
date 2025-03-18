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
// **1. Conectar ao banco de dados**
$host = "localhost";     // Endereço do servidor MySQL (localhost para ambiente local)
$dbname = "doces_vovo";  // Nome do banco de dados
$username = "root";      // Nome de usuário do banco de dados
$password = "";          // Senha do banco de dados

try {
    // **Criando a conexão usando PDO**
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // **Definindo o modo de erro do PDO para exceções**
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // **Se houver erro na conexão, o script é interrompido e exibe a mensagem de erro**
    die("<p class='erro'>Erro de conexão: " . $e->getMessage() . "</p>");
}

// **2. Verificar se o formulário foi enviado**
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // Verifica se a requisição veio via POST
    // **Sanitização dos dados recebidos**
    $nome = htmlspecialchars(trim($_POST['nome']));  // Remove espaços extras e escapa caracteres especiais
    $email = htmlspecialchars(trim($_POST['email']));
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

    // **3. Inserir os dados na tabela 'sugestoes' do banco de dados**
    $stmt = $pdo->prepare("INSERT INTO sugestoes (nome, email, mensagem) VALUES (:nome, :email, :mensagem)"); //prepare() Serve para proteger contra SQL malicioso
    
    // **Vinculação segura dos parâmetros para evitar SQL Injection**
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mensagem', $mensagem);
    
    // **Executa a inserção no banco**
    $stmt->execute();
}

// **4. Buscar todas as sugestões armazenadas no banco de dados**
$query = $pdo->query("SELECT nome, mensagem, data_envio FROM sugestoes ORDER BY data_envio DESC");

// **Recupera todas as sugestões e as armazena no array $sugestoes**
$sugestoes = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- **5. Exibição das Sugestões** -->
<h2>Lista de Sugestões</h2>

<?php if (!empty($sugestoes)): ?>  
    <?php foreach ($sugestoes as $sugestao): ?>  <!-- Percorre todas as sugestões -->
        <div class="sugestao">
            <!-- **6. Proteção contra XSS ao exibir os dados** -->
            <strong><?= htmlspecialchars($sugestao['nome']) ?></strong>  
            (<?= $sugestao['data_envio'] ?>) <br>
            <?= nl2br(htmlspecialchars($sugestao['mensagem'])) ?>  <!-- Converte quebras de linha para <br> -->
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhuma sugestão cadastrada ainda.</p>
<?php endif; ?>
</body>
</html>