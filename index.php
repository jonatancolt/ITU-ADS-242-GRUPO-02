<?php
ob_start(); // Inicia o buffer de saída

$hostname = "localhost";
$bancodedados = "clientes";
$usuario = "root";
$senha = "";

// Conexão com o banco de dados
$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

// Inicializar a variável para mensagens de erro
$erroSenhaLogin = ""; 

// Processar o login do usuário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senhaLogin = $_POST['senha']; // Renomeado para evitar conflito

    // Verificar se o email está registrado
    $stmt = $mysqli->prepare("SELECT senha FROM usuarios WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        // Verificar se a senha está correta
        if (password_verify($senhaLogin, $usuario['senha'])) {
            // Login bem-sucedido, redirecionar para home.php
            header("Location: index.html");
            exit();
        } else {
            $erroSenhaLogin = "Senha incorreta.";
        }
    } else {
        $erroSenhaLogin = "Usuário não encontrado.";
    }
}
ob_end_flush(); // Libera o buffer de saída
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/CSS/EstiloDoLogin.css">
    <style>
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="index.php" method="POST" id="formLogin">
            <input type="hidden" name="acao" value="login">
            <label for="email">Email:</label><br>
            <input type="email" name="email" placeholder="Seu Email cadastrado:" id="emailLogin" required><br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" placeholder="Sua senha de acesso:" id="senhaLogin" required>
            <br>
            <button class="btnEsqueciMinhaSenha" type="button">Esqueci Minha Senha</button>
            <button class="btnCriarConta" type="button" onclick="window.location.href='register.php'">Criar conta</button>
            <!-- Exibe a mensagem de erro aqui -->
            <p class="error"><?php echo $erroSenhaLogin; ?></p> <!-- Usando a classe de erro -->
            <button class="btnLogin" type="submit">Login</button>
        </form>
    </div>

    <script>
        // Validação para o login
        document.getElementById('formLogin').addEventListener('submit', function(event) {
            const senhaLogin = document.getElementById('senhaLogin').value;

            if (!validarSenha(senhaLogin)) {
                event.preventDefault(); // Impede o envio do formulário se a validação falhar
                alert('A senha deve ter no mínimo 8 caracteres, uma letra maiúscula e um caractere especial.'); // Alerta para o usuário
            }
        });

        // Função para validar senha (mínimo de 8 caracteres, uma maiúscula e um caractere especial)
        function validarSenha(senha) {
            const regex = /^(?=.*[A-Z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
            return regex.test(senha);
        }
    </script>
</body>
</html>
