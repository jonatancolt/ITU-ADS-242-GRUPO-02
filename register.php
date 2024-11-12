<?php
$hostname = "localhost";
$bancodedados = "clientes";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

// Inicializar mensagens
$mensagem = "";

// Processar o registro do usuário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar se o email já está cadastrado
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $mensagem = "Email já cadastrado.";
    } else {
        // Hash da senha e inserir novo usuário
        $senha_hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
        $stmt->bind_param('ss', $email, $senha_hashed);

        if ($stmt->execute()) {
            $mensagem = "Usuário registrado com sucesso.";
            header("Location: index.php"); // Redirecionar para a página de login após o registro
            exit();
        } else {
            $mensagem = "Erro ao registrar usuário: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="./assets/CSS/EstiloDoRegistro.css">
</head>
<body>
    <div class="container">
        <form action="register.php" id="forms" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" name="email" placeholder="Seu Email" required><br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="password" placeholder="Sua senha" required><br>
            <button type="submit">Registrar</button>
            <p class="mensagem"><?php echo $mensagem; ?></p>
        </form>
        <button type="button" id="voltarLogin" onclick="window.location.href='index.php'">Voltar para Login</button>
    </div>
</body>
</html>
